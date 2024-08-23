<?php
	try
		{
			include("connect_bdd.php");
			$connexion->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
				$select=$connexion->prepare('DELETE FROM chaussures WHERE id=:id');
                $select->execute(array("id"=>$_GET["id"]));
                header("location:chaussures_saved.php");
				}			
		catch(PDOException $e)
		{
			echo 'Echec : '.$e->getMessage();
		}

 ?>