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
  <title>À Propos de notre Société - Vente de chaussures en ligne</title>
  <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
</head>
<body>
  <style>
    footer{
        margin-top: 10px;
    }
</style>
    <?php include("nav_user.php"); ?>

<div class="container mt-5">
  <div class="col-lg-12">
    <h2>À propos de Shoes Market</h2>
    <p>Notre société vous procure des chaussures à bon prix et vous fait une livraison gratuite de partout ou vous etes !</p>

  </div>

  <h3 style="text-align: center;">Notre Équipe</h3>
  <div class="row">

    <div class="col-md-4 mb-4">
      <div class="card">
        <img src="images/p2.JPG" class="card-img-top" alt="Membre de l'Équipe 2">
        <div class="card-body">
          <h5 class="card-title">Waridi Musavuli</h5>
          <p class="card-text">PDG,Chef des projets / Data analyst et programmeuse</p>
        </div>
      </div>
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
