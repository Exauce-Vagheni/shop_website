 
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
<?php include("nav_admin.php"); ?>

<div class="container mt-5">
  <h2>Liste des produits ajoutés au panier</h2>
  <table class="table">
    <thead>
      <tr>
        <th>Image</th>
        <th>Nom</th>
        <th>Prix</th>
        <th>Catégorie</th>
      </tr>
    </thead>
    <tbody>
  <h2> <?php
	try
		{
			include("connect_bdd.php");
            $tableau_achat=array();
			$connexion->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
				$select=$connexion->query("SELECT * FROM achats WHERE  statut='achete' ORDER BY id DESC");
					while($result=$select->fetch()){
                        $select2=$connexion->prepare('SELECT * FROM  chaussures WHERE id=:id_article ');
                        $select2->execute(array("id_article"=>$result["id_article"]));
                        while($result2=$select2->fetch()){
                            array_push($tableau_achat,$result2["id"]);
                        ?>
          <tr>
            <td><img src="images/<?php echo $result2["photo"];?>" style="max-width: 200px;max-height:100px;" class="img-thumbnail" alt="chaussures 1"></td>
            <td><?php echo $result2["nom"];?></td>
            <td><?php echo $result2["prix"];?></td>
            <td><?php echo $result2["categorie"];?></td> 
            <td><?php if($result["livraison"]=="yes"){echo"Déjà livré";}else{?><a href="liste_achats.php?id=<?php echo $result['id']; ?>" class="btn btn-warning">Livraison</a> <?php }?></td>  
          </tr>
                        <?php
                    }
				}	
    }		
		catch(PDOException $e)
		{
			echo 'Echec : '.$e->getMessage();
		}
 ?>
   </tbody>
  </table>
<?php include("valider_livraison.php"); ?>

</div>


<footer class="bg-dark text-white py-4" style="margin-top:100px;">
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
