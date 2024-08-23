<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Ajout de chaussures - Vente de chaussures en ligne</title>
  <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
</head>
<body>
<style>
    footer{
        margin-top: 10px;
    }
</style>
<?php include("nav_admin.php"); ?>

<div class="container mt-5">
  <div class="row">
    <div class="col-md-6 mx-auto">
      <h2>Ajouter une categorie</h2>
      <form action="" method="POST" enctype="multipart/form-data">
        <div class="mb-3">
        <?php
 if (isset($_POST['designation']) AND isset($_POST['description'])){
  try
  {
  include("connect_bdd.php");
  $connexion->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
if (isset($_FILES['image']) AND !empty($_FILES['image']['name'])) {
  $tailleMax=10097152;
  $extensionsValides= array('jpg','jpeg','gif','png');
  $designation=htmlspecialchars($_POST['designation']);
  $nom_photo=sha1($designation);
  $description=htmlspecialchars($_POST['description']);

  if ($_FILES['image']['size']<=$tailleMax) {
    $extensionUpload=strtolower(substr(strrchr($_FILES['image']['name'], '.'), 1));				
      if (in_array($extensionUpload,$extensionsValides)) {
      
      $chemin = 'images/'.$nom_photo.'.'.$extensionUpload;
      $resultat=move_uploaded_file($_FILES['image']['tmp_name'],$chemin);
      if($resultat)
      {
        $insert_code=$connexion->prepare('INSERT INTO categories(designation,description,photo) VALUES (:designation,:description,:photo)');
        $insert_code->execute(array(
          "designation"=>$designation, 
          "description"=>$description,
          "photo"=>$nom_photo.'.'.$extensionUpload
        ));
        header("location:liste_categories.php");
      }
      else
      {
        $msg='erreur durant l\'enregistrement';
        echo $msg;
      }
    }
    else
    {
      $msg='Votre photo doit etre au format jpg , jpeg , png , gif';
      echo $msg;
    }
  }
  else{
    
    $msg='votre photo de profil ne doit pas depasser 10mb';
    echo $msg;
  }

}
}
catch(PDOException $e)
{
  echo 'Echec : '.$e->getMessage();
}
}

		?>
          <label for="designation" class="form-label">Designation de la categorie</label>
          <input type="text" class="form-control" name="designation" required>
        </div>
        <div class="mb-3">
          <label for="description" class="form-label">Description </label>
          <textarea class="form-control" name="description" required></textarea>
        </div>
        <div class="mb-3">
          <label for="image" class="form-label">Image de la categorie </label>
          <input type="file" class="form-control" id="image" name="image" required>
        </div>
        <input type="submit" class="btn btn-danger" value="Enregistrer"/>
      </form>
    </div>
  </div>
</div>


<footer class="bg-dark text-white py-4">
  <div class="container">
  <p>Shoes Market, fait par Waridi</p>
  </div>
  <div><a href="page_login.php">Se connecter en tant qu'admin</a></div>
</footer>


<script src="bootstrap/js/bootstrap.bundle.min.js">


</script>

</body>
</html>
