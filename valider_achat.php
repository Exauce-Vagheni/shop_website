<?php
    if(isset($_GET["tableau"])){
	try
		{
			include("connect_bdd.php");
			$connexion->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
            for($i=0;$i<count($tableau_achat);$i++){
            $select=$connexion->prepare('UPDATE achats SET statut=:statut WHERE telephone=:telephone AND id=:id');
            $select->execute(array(
                 "statut"=>"achete",
                "telephone"=>$_SESSION["telephone"],
                "id"=>$tableau_achat[$i]
               
        ));
            }
            echo "Achats effectués avec succès, nous allons vous contacter dans un instant 
            pour la livraison et le paiement se fait à la livraison ";
		}			
		catch(PDOException $e)
		{
			echo 'Echec : '.$e->getMessage();
		}
    }
 ?>