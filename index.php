<?php
header('Content-Type: text/html; charset=UTF-8');
?>
<!DOCTYPE html>
<html>
<head>
<title>W3.CSS Template</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway">
<style>
body,h1,h5 {font-family: "Raleway", sans-serif}
body, html {height: 100%}
.bgimg {
  background-image: url('https://www.route-biere.com/wp-content/uploads/2022/07/claude-piche-EHbtjmz7hvw-unsplash.jpg');
  min-height: 100%;
  background-position: center;
  background-size: cover;
}
.logo {
  display: block;
  margin: 0 auto;
  width: 150px; /* Ajuste la taille selon ton besoin */
  height: auto;
}
</style>
</head>
<body>

<div class="bgimg w3-display-container w3-text-white">
  <div class="w3-display-middle w3-jumbo w3-center">
    <img src="brasserie_logo.png" alt="Logo Brasserie" class="logo">
    <p>Bienvenue à notre brasserie</p>
  </div>
  <div class="w3-display-topleft w3-container w3-xlarge">
    <p><button onclick="document.getElementById('menu').style.display='block'" class="w3-button w3-black">Menu</button></p>
    <p><button onclick="document.getElementById('contact').style.display='block'" class="w3-button w3-black">Contact</button></p>
  </div>
  <div class="w3-display-bottomleft w3-container">
    <p class="w3-xlarge">Savourez nos spécialités artisanales</p>
    <p class="w3-large">2 rue Alphonse Colas, Pl. du Concert, 59000 Lille</p>
    <p>powered by <a href="https://www.w3schools.com/w3css/default.asp" target="_blank">w3.css</a></p>
  </div>
</div>

<!-- Menu Modal -->
<div id="menu" class="w3-modal">
  <div class="w3-modal-content w3-animate-zoom">
    <div class="w3-container w3-black w3-display-container">
      <span onclick="document.getElementById('menu').style.display='none'" class="w3-button w3-display-topright w3-large">x</span>
      <h1>Menu de la Brasserie</h1>
    </div>
    <div class="w3-container">
      <?php
      $menu = [
        "Biere Blonde" => ["prix" => "5.50€", "image" => "produits-01.png"],
        "Biere Brune " => ["prix" => "4.50€", "image" => "produits-02.png"],
        "Indian Pale Ale" => ["prix" => "5.00€", "image" => "produits-03.png"],
        "Gin" => ["prix" => "6.00€", "image" => "produits-04.png"],
        "Whiskey" => ["prix" => "4.50€", "image" => "produits-05.png"],
      ];
      foreach ($menu as $item => $details) {
        echo "<div class='w3-row w3-padding-16'>";
        echo "<div class='w3-col s3'><img src='{$details['image']}' class='w3-image' style='width:100px; height:auto;'></div>";
        echo "<div class='w3-col s9'><h5>$item <b>{$details['prix']}</b></h5></div>";
        echo "</div>";
      }    
      ?>
    </div>
  </div>
</div>

<!-- Contact Modal -->
<div id="contact" class="w3-modal">
  <div class="w3-modal-content w3-animate-zoom">
    <div class="w3-container w3-black">
      <span onclick="document.getElementById('contact').style.display='none'" class="w3-button w3-display-topright w3-large">x</span>
      <h1>Contact</h1>
    </div>
    <div class="w3-container">
      <p>N'hésitez pas à nous contacter pour plus de détails :</p>
      <form action="contact.php" method="POST">
        <p><input class="w3-input w3-padding-16 w3-border" type="text" placeholder="Nom" required name="nom"></p>
        <p><input class="w3-input w3-padding-16 w3-border" type="text" placeholder="Prénom" required name="prenom"></p>
        <p><input class="w3-input w3-padding-16 w3-border" type="email" placeholder="Adresse Mail" required name="email"></p>
        <p><input class="w3-input w3-padding-16 w3-border" type="tel" placeholder="Téléphone" required name="telephone"></p>
        <p><input class="w3-input w3-padding-16 w3-border" type="text" placeholder="Message / Demande Spéciale" required name="message"></p>
        <p><button class="w3-button w3-green" type="submit">ENVOYER UN MESSAGE</button></p>
      </form>
    </div>
  </div>
</div>

<!-- Confirmation Page -->
<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    echo '<div class="w3-container w3-center w3-padding-32">';
    echo '<div class="w3-card w3-padding-32 w3-round w3-light-grey">';
    echo '<h2>Merci pour votre connexion !</h2>';
    echo '<p>Vos informations ont été enregistrées avec succès.</p>';
    echo '<a href="index.php" class="w3-button w3-black w3-round">Retour au site</a>';
    echo '</div>';
    echo '</div>';
}
?>

</body>
</html>
