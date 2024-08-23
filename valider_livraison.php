<?php
    if(isset($_GET["id"])){
        $id=htmlspecialchars($_GET["id"]);
	try
		{
			include("connect_bdd.php");
			$connexion->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
            for($i=0;$i<count($tableau_achat);$i++){
            $select=$connexion->prepare('UPDATE achats SET livraison=:livraison WHERE id=:id');
            $select->execute(array(
                 "livraison"=>"yes",
                "id"=>$id
               
        ));
            }
		}			
		catch(PDOException $e)
		{
			echo 'Echec : '.$e->getMessage();
		}
    }
 ?>