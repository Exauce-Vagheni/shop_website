<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>chaussures à vendre - Vente de chaussures en ligne</title>
  <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
  
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
<?php include("nav_user.php"); ?>

<div class="container mt-5">
  <h2> <?php
  if($_GET["id"]){
	try
		{
			include("connect_bdd.php");
			$connexion->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
				$select=$connexion->prepare('SELECT * FROM categories WHERE id=:id');
        $select->execute(array("id"=>$_GET["id"]));
					while($result=$select->fetch()){
				echo $result["designation"];
				}	
    }		
		catch(PDOException $e)
		{
			echo 'Echec : '.$e->getMessage();
		}
  } 
 ?></h2>
  <div class="row">
  <?php
  if(isset($_GET["id"])){

	try
		{
			include("connect_bdd.php");
			$connexion->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
				$select=$connexion->prepare('SELECT * FROM chaussures WHERE categorie=:categorie');
        $select->execute(array(
            "categorie"=>$_GET["id"]
        ));
					while($result=$select->fetch()){
					?>
     <div class="col-md-4">
      <div class="card mb-4">
        <img src="images/<?php echo $result['photo']; ?>" class="card-img-top" alt="chaussures Populaire 1">
        <div class="card-body">
          <h5 class="card-title"><?php echo $result['nom']; ?></h5>
          <p class="card-text"><?php echo $result['prix']; ?>$</p>
          <p class="card-text"><?php echo $result['description']; ?></p>
          <a href="details.php?id=<?php echo $result['id']; ?>" class="btn btn-danger">Détails</a>
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

  </div>
</div>


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
