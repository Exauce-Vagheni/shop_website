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
      <h2>Ajouter une chaussure</h2>
      <form action="" method="POST" enctype="multipart/form-data">
        <div class="mb-3">
        <?php
 if (isset($_POST['nom']) AND isset($_POST['description']) AND isset($_POST['categorie']) AND isset($_POST['prix'])){
  try
  {
  include("connect_bdd.php");
  $connexion->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
if (isset($_FILES['image']) AND !empty($_FILES['image']['name'])) {
  $tailleMax=10097152;
  $extensionsValides= array('jpg','jpeg','gif','png');
  $nom=htmlspecialchars($_POST['nom']);
  $prix=htmlspecialchars($_POST['prix']);
  $categorie=htmlspecialchars($_POST['categorie']);


  $nom_photo=sha1($nom);
  $description=htmlspecialchars($_POST['description']);

  if ($_FILES['image']['size']<=$tailleMax) {
    $extensionUpload=strtolower(substr(strrchr($_FILES['image']['name'], '.'), 1));				
      if (in_array($extensionUpload,$extensionsValides)) {
      
      $chemin = 'images/'.$nom_photo.'.'.$extensionUpload;
      $resultat=move_uploaded_file($_FILES['image']['tmp_name'],$chemin);
      if($resultat)
      {
        $insert_code=$connexion->prepare('INSERT INTO chaussures(nom,description,categorie,photo,prix) VALUES (:nom,:description,:categorie,:photo,:prix)');
        $insert_code->execute(array(
          "nom"=>$nom, 
          "description"=>$description,
          "categorie"=>$categorie,
          "photo"=>$nom_photo.'.'.$extensionUpload,
          "prix"=>$prix,
        ));
        header("location:chaussures_saved.php");
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
          <label for="nom" class="form-label">Nom de la chaussure</label>
          <input type="text" class="form-control" name="nom" required>
        </div>
        <div class="mb-3">
          <label for="description" class="form-label">Description</label>
          <textarea class="form-control" name="description" required></textarea>
        </div>
        <div class="mb-3">
          <label for="image" class="form-label">Image de la chaussure</label>
          <input type="file" class="form-control" name="image" accept="image/*" required>
        </div>
        <div class="mb-3">
          <label for="prix" class="form-label">Prix</label>
          <input type="number" class="form-control" name="prix" required>
        </div>
        <div class="mb-3">
          <label for="categorie" class="form-label">Catégorie</label>
          <select class="form-control" name="categorie">
          <?php
	try
		{
			include("connect_bdd.php");
			$connexion->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
				$select=$connexion->query('SELECT * FROM categories');
					while($result=$select->fetch()){
					?>
              <option value="<?php echo $result['id'] ?>"><?php echo $result['designation'] ?></option>
					<?php
				}

				}			
		catch(PDOException $e)
		{
			echo 'Echec : '.$e->getMessage();
		}

 ?>
          </select>
        </div>
        <button type="submit" class="btn btn-danger">Ajouter la chaussure</button>
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


<script src="bootstrap/js/bootstrap.bundle.min.js"></script>

</body>
</html>
