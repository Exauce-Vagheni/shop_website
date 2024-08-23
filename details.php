<?php
session_start();
if(!isset($_SESSION["telephone"])){
  header("location:index.php");
}
    ?> 
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Détails de la chaussures - Vente de chaussures en ligne</title>
  <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
  
</head>
<body>
  <style>
    footer{
        margin-top: 10px;
    }
</style>

<?php
  include("nav_user.php");

?>


<div class="container mt-5">
  <div class="row">
    
    <?php
    if(isset($_GET["id"])){

	try
		{
			include("connect_bdd.php");
			$connexion->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
				$select=$connexion->prepare('SELECT * FROM chaussures WHERE id=:id');
        $select->execute(array(
          "id"=>htmlspecialchars($_GET["id"])
        ));
					while($result=$select->fetch()){
					?>
      <div class="col-md-6">
      <img src="images/<?php echo $result['photo']; ?>" class="img-fluid" style="max-height:600px;" alt="chaussure">
    </div>
       <div class="col-md-6">
      <h2><?php echo $result['nom']; ?></h2>
      <h4>Description: <?php echo $result['description']; ?></h4>
      <h4>Prix: <?php echo $result['prix']; ?>$</h4>
      <a href="save_panier.php?id_article=<?php echo $result['id']; ?>" class="btn btn-danger">Ajouter au panier</a>
    </div>
  </div>
</div>
					<?php
				}

				}			
		catch(PDOException $e)
		{
			echo 'Echec : '.$e->getMessage();
		}
}

 ?>
    


<footer class="bg-dark text-white py-4">
  <div class="container">
  <p>Shoes Market, fait par Waridi</p>
  </div>
  <div><a href="page_login.php">Se connecter en tant qu'admin</a></div>
</footer>


<script src="bootstrap/js/bootstrap.bundle.min.js"></script>
<script>
  
</script>
</body>
</html>
