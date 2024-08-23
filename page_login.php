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
      <h2>Connexion administrateur</h2>
      <form action="" method="post">
        <div class="mb-3">
        <?php  
if (isset($_POST['username']) AND isset($_POST['password'])) {
	$username=htmlspecialchars($_POST['username']);
	$password=htmlspecialchars($_POST['password']);
	try
		{
			include("connect_bdd.php");
			$connexion->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
			$select1=$connexion->prepare('SELECT * FROM identifiants WHERE username=:username AND password=:password');
		$select1->execute(array(
			'username'=>$username,
			'password'=>$password
		));
		$select2=$connexion->prepare('SELECT * FROM identifiants WHERE username=:username AND password=:password');
		$select2->execute(array(
			'username'=>$username,
			'password'=>$password
		));
			if ($select1->fetch()) {
				while ($result=$select2->fetch()) {
			
				$_SESSION['id_user']=$result['id_user'];
							header("location:form_ajout.php");
					}
			}
			else{
				echo "Mauvais identifiants";
			}
					
				
			
		}
		catch(PDOException $e)
		{
			echo 'Echec : '.$e->getMessage();
		}

			}

 ?>
          <label for="username" class="form-label">Identifiant</label>
          <input type="text" placeholder="Waridi" class="form-control" id="username" name="username" required>
        </div>
        <div class="mb-3">
          <label for="password" class="form-label">Mot de passe</label>
          <input type="password" class="form-control" id="password" name="password" required>
        </div>
        <button type="submit" class="btn btn-danger">Se connecter</button>
      </form>
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
<script>
</script>
</body>
</html>
