<?php
session_start();
	try
		{
			include("connect_bdd.php");
			$connexion->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
				$select=$connexion->prepare('INSERT INTO achats(id_article,telephone,statut) VALUES(:id_article,:telephone,:statut)');
                $select->execute(array(
                    "id_article"=>$_GET["id_article"],
                    "telephone"=>$_SESSION["telephone"],
                    "statut"=>"panier"
            ));
            header("location:panier.php");
		}			
		catch(PDOException $e)
		{
			echo 'Echec : '.$e->getMessage();
		}

 ?>