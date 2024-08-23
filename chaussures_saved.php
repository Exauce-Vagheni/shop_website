<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Liste des chaussures - Vente de chaussures en ligne</title>
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
  <h2>Liste des chaussures enregistrés</h2>
  <table class="table">
    <thead>
      <tr>
        <th>Image</th>
        <th>Nom</th>
        <th>Description</th>
        <th>Prix</th>
        <th>Catégorie</th>
      </tr>
    </thead>
    <tbody>
    <?php
	try
		{
			include("connect_bdd.php");
			$connexion->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
				$select=$connexion->query('SELECT * FROM chaussures');
					while($result=$select->fetch()){
					?>
      <tr>
        <td><img src="images/<?php echo $result["photo"];?>" style="max-width: 200px;max-height:100px;" class="img-thumbnail" alt="chaussures 1"></td>
        <td><?php echo $result["nom"];?></td>
        <td><?php echo $result["description"];?></td>
        <td><?php echo $result["prix"];?></td>
        <td><?php echo $result["categorie"];?></td>
        <td><a href="delete_chaussure.php?id=<?php echo $result['id']; ?>" class="btn btn-warning">Supprimer</a></td>

      </tr>
					<?php
				}

				}			
		catch(PDOException $e)
		{
			echo 'Echec : '.$e->getMessage();
		}

 ?>
     
    </tbody>
  </table>
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
