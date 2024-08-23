<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Achat de chaussures - Vente de chaussures en ligne</title>
  <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
</head>
<body>
  <style>
    footer{
        margin-top: 10px;
    }
</style>

<nav class="navbar navbar-expand-lg navbar-dark bg-danger">
    <div class="container">
      <a class="navbar-brand" href="index.html"><strong>Shoes Market</strong> </a>
      <a class="navbar-brand" href="liste_chaussures.html">chaussures disponibles</a>
      <a class="navbar-brand" href="form_achat.html">Passer une commande</a>
      <a class="navbar-brand" href="apropos.html">A propos</a>
    </div>
    
  </nav>


<div class="container mt-5">
  <div class="row">
    <div class="col-md-6" id="photo_chaussures">
      
    </div>
    <div class="col-md-6">
      <h2>Formulaire d'Achat</h2>
      <form>
        <div class="mb-3">
          <label for="fullName" class="form-label">Nom Complet</label>
          <input type="text" class="form-control" id="fullName" name="fullName" required>
        </div>
        <div class="mb-3">
          <label for="email" class="form-label">Adresse Email</label>
          <input type="email" class="form-control" id="email" name="email" required>
        </div>
        <div class="mb-3">
          <label for="phone" class="form-label">Numéro de Téléphone</label>
          <input type="tel" class="form-control" id="phone" name="phone" required>
        </div>
        <div class="mb-3">
            <label for="email" class="form-label">Nom de la chaussures</label>
            <select name="" id="chaussures">
                <option value="amg">Mercedes AMG</option>
                <option value="prado">Prado TX</option>
                <option value="surf">Surf AG</option>
                <option value="limo">Limousine A188</option>
                <option value="benz">Mercedes Benz</option>
                <option value="bmw">BMW X200</option>
            </select>
          </div>
          <button type="button" class="btn btn-danger" onclick="gestion_form()">Evaluer</button>
          <div class="mb-3">
            <label for="prix" class="form-label">Prix de la chaussures</label>
            <input type="text" class="form-control" id="prix" name="prix" required>
          </div>
        <div class="mb-3">
          <label for="address" class="form-label">Adresse de Livraison</label>
          <textarea class="form-control" id="address" name="address" required></textarea>
        </div>
        <div class="mb-3">
          <label for="paymentMethod" class="form-label">Méthode de Paiement</label>
          <select class="form-select" id="paymentMethod" name="paymentMethod" required>
            <option value="" disabled selected>Choisissez une option</option>
            <option value="creditCard">Carte de Crédit</option>
            <option value="paypal">PayPal</option>
            <option value="VISA">VISA</option>
            <option value="bankTransfer">Virement Bancaire</option>
          </select>
        </div>
        <button type="submit" class="btn btn-danger">Acheter Maintenant</button>
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
    function gestion_form(){
        var chaussures=document.getElementById("chaussures").value;
        if(chaussures=="amg"){
            document.getElementById("prix").value="100000$";
            document.getElementById("photo_chaussures").innerhtml='<img src="images/amg.jpg" class="img-fluid" id="" alt="chaussures à vendre">';
        }else if(chaussures=="benz"){
            document.getElementById("prix").value="420000$";
            document.getElementById("photo_chaussures").innerhtml='<img src="images/benz.jpg" class="img-fluid" id="" alt="chaussures à vendre">';
        }
        else if(chaussures=="prado"){
            document.getElementById("prix").value="200000$";
            document.getElementById("photo_chaussures").innerhtml='<img src="images/prado.jpg" class="img-fluid" id="" alt="chaussures à vendre">';
        }
        else if(chaussures=="surf"){
            document.getElementById("prix").value="400000$";
            document.getElementById("photo_chaussures").innerhtml='<img src="images/surf.webp" class="img-fluid" id="" alt="chaussures à vendre">';
        }
        else if(chaussures=="limo"){
            document.getElementById("prix").value="400000$";
            document.getElementById("photo_chaussures").innerhtml='<img src="images/limo.jpg" class="img-fluid" id="" alt="chaussures à vendre">';
        }
        else if(chaussures=="hummer"){
            document.getElementById("prix").value="400000$";
            document.getElementById("photo_chaussures").innerhtml='<img src="images/hummer.jpg" class="img-fluid" id="" alt="chaussures à vendre">';
        }
    }
</script>
</body>
</html>
