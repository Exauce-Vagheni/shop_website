<?php
session_start();
      if(isset($_POST["tel"])){
        $_SESSION["telephone"]=htmlspecialchars($_POST["tel"]);
        header("location:home.php");
    }
?> 
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Connexion administrateur - Vente de chaussures en ligne</title>
  <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
  <style>
   
  </style>
</head>
<body>
  <style>
    footer{
        margin-top: 10px;
    }
</style>
  <nav class="navbar navbar-expand-lg navbar-dark bg-danger">
    <div class="container">
      <h1 href="index.html" style="color:white;"><strong>Shoes Market</strong> </h1>
    </div>
    
  </nav>

<div class="container mt-5">
  <div class="row">
    <div class="col-md-6 mx-auto">
        <h1 class="text-danger"><strong>Bienvenu sur Shoes Market</strong></h1>
      <p>Veuillez indiquer votre numero de telephone pour que nous puissions vous identifier</p>
      <form action="" method="post">
        <div class="mb-3">
          <label for="username" class="form-label">Numero de telephone</label>
          <input type="text" placeholder="087556554" class="form-control" id="tel" name="tel" required>
        </div>
        <button type="submit" class="btn btn-danger">Continuer</button>
      </form>
    </div>
  </div>
</div>

<footer class="bg-dark text-white py-4" style="margin-top:150px;">
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
