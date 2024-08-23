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
  <title>Vente de chaussures en ligne- Accueil</title>
  <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="engine1/style.css" />
	<script type="text/javascript" src="engine1/jquery.js"></script>
</head>
<body>
    <style>
        .card-img-top{
                min-height: 300px;
                max-height:300px ;
        }
  footer{
      margin-top: 10px;
  }
</style>

<?php
  include("nav_user.php");

?>



<section class="py-5">
  <div class="container">
    <h2 class="text-center mb-4" style="font-weight:bold;">Parcourir les catégories</h2>
    <div class="row">
    <?php
	try
		{
			include("connect_bdd.php");
			$connexion->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
				$select=$connexion->query('SELECT * FROM categories');
					while($result=$select->fetch()){
					?>
       <div class="col-md-4">
        <div class="card mb-4">
          <img src="images/<?php echo $result['photo']; ?>" class="card-img-top" alt="chaussures de Luxe">
          <div class="card-body">
            <h5 class="card-title"><?php echo $result['designation']; ?></h5>
            <p class="card-text"><?php echo $result['description']; ?></p>
            <a href="liste_chaussures.php?id=<?php echo $result['id']; ?>" class="btn btn-danger">Consulter</a>
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

 ?>
      
    </div>
  </div>
</section>


<section class="py-5 bg-light">
  <div class="container">
    <h2 class="text-center mb-4" style="font-weight:bold;">Nouvelles chaussures</h2>
    <div class="row">
      
    <?php
	try
		{
			include("connect_bdd.php");
			$connexion->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
				$select=$connexion->query('SELECT * FROM chaussures LIMIT 0,6');
					while($result=$select->fetch()){
					?>
       <div class="col-md-4">
        <div class="card mb-4">
          <img src="images/<?php echo $result['photo']; ?>" class="card-img-top" alt="chaussures Populaire 1">
          <div class="card-body">
            <h5 class="card-title"><?php echo $result['nom']; ?></h5>
            <p class="card-text"><?php echo $result['prix']; ?>$</p>
            <a href="details.php?id=<?php echo $result['id']; ?>" class="btn btn-danger">Voir plus</a>
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

 ?>
    </div>
  </div>
</section>



<footer class="bg-dark text-white py-4">
  <div class="container">
  <p>Shoes Market, fait par Waridi</p>
  </div>
  <div><a href="page_login.php">Se connecter en tant qu'admin
  
  </a></div>
</footer>
<script src="bootstrap/js/bootstrap.min.js"></script>


</body>
</html>
