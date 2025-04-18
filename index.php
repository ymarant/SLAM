<?php
session_start();

$servername = "sql208.infinityfree.com";
$username = "if0_38342249"; 
$password = "8p8SMDlMUOmSd"; 
$dbname = "if0_38342249_brasserie";


?>



<!DOCTYPE html>
<html>
<head>
<title>Brasserie</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Inconsolata">
<style>
body, html {
  height: 100%;
  font-family: "Inconsolata", sans-serif;
}

.bgimg {
  background-position: center;
  background-size: cover;
  background-image: url("https://www.maison-michard.fr/wp-content/uploads/2022/11/MICHARD-photo-158A5184.jpg");
  min-height: 75%;
}

.menu {
  display: none;
}

.logo {
  width: 300px; 
  height: auto;
  margin-top: 20px; 
  display: block;
  margin-left: auto;
  margin-right: auto;
}

.product-image {
      width: 100%;
      height: auto;
      border-radius: 8px;
      cursor: pointer;
    }


    .popup {
      display: none; 
      position: fixed;
      left: 50%;
      top: 50%;
      transform: translate(-50%, -50%);
      background-color: white;
      padding: 20px;
      border-radius: 8px;
      box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.2);
      width: 500px;
      text-align: center;
    }


    .popup-overlay {
      display: none; 
      position: fixed;
      top: 0;
      left: 0;
      width: 100%;
      height: 100%;
      background-color: rgba(0, 0, 0, 0.5);
    }


    .close-btn {
      background-color: red;
      color: white;
      padding: 5px 10px;
      border: none;
      border-radius: 5px;
      cursor: pointer;
    }



</style>
</head>
<body>


<div class="w3-top">
  <div class="w3-row w3-padding w3-black">
    <div class="w3-col s2">
      <a href="#" class="w3-button w3-block w3-black">ACCUEIL</a>
    </div>
    <div class="w3-col s2">
      <a href="#about" class="w3-button w3-block w3-black">A PROPOS</a>
    </div>
    <div class="w3-col s2">
      <a href="#produits" class="w3-button w3-block w3-black">PRODUITS</a>
    </div>
    <div class="w3-col s2">
      <a href="#contact" class="w3-button w3-block w3-black">CONTACT</a>
    </div>

    <?php
      if (isset($_SESSION['id_user']) and isset($_SESSION['role'])) {
        $role = $_SESSION['role'];
        $id_user = $_SESSION['id_user'];  
       
          echo '<div class="w3-col s2">
                  <a href="' . $role .'.php" class="w3-button w3-block w3-black">' . strtoupper($role) .'</a>
                </div>
                
                <div class="w3-col s2">
                   <a href="deconnexion.php" class="w3-button w3-block w3-black">DECONNEXION</a>
                </div>';
        }else {
            echo '<div class="w3-col s2">
                    <a href="connexion.php" class="w3-button w3-block w3-black">CONNEXION</a>
                </div>';
        }
    ?>
  </div>
</div>


<header class="bgimg w3-display-container w3-grayscale-min" id="home">

  <div class="w3-display-bottomleft w3-center w3-padding-large w3-hide-small">
    <span class="w3-tag">Ouvert 8h-17h 7j/7</span>
  </div>

  <div class="w3-display-middle w3-center">
    <span class="w3-tag" style="font-size:70px">Brasserie Terroir Saveur</span>
    
    <?php
      if (isset($_GET["message"])) {
         $message = htmlspecialchars($_GET["message"]); 
         echo '<div class="w3-margin-top">
                 <span class="w3-tag" style="font-size:40px">' . $message . '</span>
               </div>';
      }
    ?>
  </div>

  <div class="w3-display-bottomright w3-center w3-padding-large">
    <span class="w3-tag">2 rue Alphonse Colas, Pl. du Concert, 59000 Lille</span>
  </div>

</header>



<div class="w3-sand w3- w3-large">


<div class="w3-container" id="about">
  <div class="w3-content" style="max-width:700px">
  <img src="brasserie_logo.png" alt="Logo Brasserie" class="logo">
    <h5 class="w3-center w3-padding-64"><span class="w3-tag w3-wide">A PROPOS</span></h5>
    <p>Nichée au cœur du nord de la France, la Brasserie Terroir & Saveurs incarne la passion
        du brassage artisanal et la richesse des produits du terroir. Fondée par des amoureux de
        la bière et des spiritueux, notre brasserie associe tradition et innovation pour offrir des
        créations uniques, empreintes d’authenticité et de caractère.
        Grâce à une sélection rigoureuse des matières premières, nous élaborons des bières aux
        arômes subtils et équilibrés, ainsi que des spiritueux d’exception, distillés avec patience et
        savoir-faire. Chaque recette est pensée pour révéler la pureté des ingrédients et sublimer
        l’identité de notre région.
        Que vous soyez amateur de bières légères et rafraîchissantes, de saveurs intenses et
        torréfiées ou encore d’expériences gustatives audacieuses, la Brasserie Terroir & Saveurs
        vous invite à découvrir un univers où la passion du goût rencontre l’excellence artisanale.
        Rejoignez-nous dans cette aventure et laissez-vous séduire par des produits conçus avec
        respect, authenticité et un brin de créativité.
        </p>
    

  
    <p><strong>Horaire:</strong> 8h-17h 7j/7 </p>
    <p><strong>Addresse:</strong> 2 rue Alphonse Colas, Pl. du Concert, 59000 Lille</p><br>
    <img src="chaine_production.png" alt="Description de l'image" style="width:100%; height:auto; margin-top:20px; border-radius:8px; border: 4px solid #eab676;"> 
    <br><br><br>
    
  </div>
</div>

 
<div class="w3-container" id="produits">
  <h5 class="w3-center w3-padding-48"><span class="w3-tag w3-wide">NOS PRODUITS</span></h5>

  <div class="w3-content" style="max-width:700px">
    <div class="w3-row-padding w3-center">

     
        <div class="w3-col s12 m6">
            <img src="produits-01.png" alt="Bière Blonde" style="width:100%; height:auto; border-radius:8px;" onclick="showPopup('popupBlonde')">
            <h5><strong>Bière Blonde</strong></h5>
            <p class="w3-text-grey">5.50€</p>
        </div>

        <div class="popup-overlay" id="overlayBlonde" onclick="closePopup('popupBlonde')"></div>
        <div class="popup" id="popupBlonde">
            <h3>Bière Blonde</h3>
            <p>Prix: 5.50€</p>
            <p>Légère et rafraîchissante, la bière blonde de la Brasserie Terroir & Saveurs séduit par son
                équilibre parfait entre douceur et amertume. Brassée avec des malts soigneusement
                sélectionnés et des houblons aromatiques, elle offre des notes subtiles de céréales et une
                touche florale. Sa robe dorée limpide et sa mousse onctueuse en font un classique
                incontournable, idéal pour accompagner des moments conviviaux.
            </p>
            <button class="close-btn" onclick="closePopup('popupBlonde')">Fermer</button>
        </div>

   
        <div class="w3-col s12 m6">
            <img src="produits-02.png" alt="Bière Ambrée" style="width:100%; height:auto; border-radius:8px;" onclick="showPopup('popupAmbree')">
            <h5><strong>Bière Ambrée</strong></h5>
            <p class="w3-text-grey">4.50€</p>
        </div>

        <div class="popup-overlay" id="overlayAmbree" onclick="closePopup('popupAmbree')"></div>
        <div class="popup" id="popupAmbree">
            <h3>Bière Ambrée</h3>
            <p>Prix: 4.50€</p>
            <p>Riche et intense, la bière brune de la Brasserie Terroir & Saveurs dévoile une palette de
              saveurs profondes. Ses malts torréfiés révèlent des arômes de chocolat noir, de caramel
              et une légère pointe de café. Sa texture ronde et son caractère généreux en font une bière
              réconfortante, parfaite pour les amateurs de saveurs puissantes et complexes.
            </p>
            <button class="close-btn" onclick="closePopup('popupAmbree')">Fermer</button>
        </div>


        <div class="w3-col s12 m6">
            <img src="produits-03.png" alt="Indian Pale Ale" style="width:100%; height:auto; border-radius:8px;" onclick="showPopup('popupIPA')">
            <h5><strong>Indian Pale Ale</strong></h5>
            <p class="w3-text-grey">5.00€</p>
        </div>

        <div class="popup-overlay" id="overlayIPA" onclick="closePopup('popupIPA')"></div>
        <div class="popup" id="popupIPA">
            <h3>Indian Pale Ale</h3>
            <p>Prix: 5.00€</p>
            <p>
            Audacieuse et aromatique, la bière IPA (India Pale Ale) de la Brasserie Terroir & Saveurs
            se distingue par ses houblons expressifs et son amertume affirmée. Elle libère des
            arômes intenses d’agrumes, de fruits tropicaux et de résine de pin. Avec son profil vibrant
            et sa finale sèche, cette IPA est un choix parfait pour les amateurs de bières modernes et
            audacieuses.
            </p>
            <button class="close-btn" onclick="closePopup('popupIPA')">Fermer</button>
        </div>

       
        <div class="w3-col s12 m6">
            <img src="produits-04.png" alt="Gin" style="width:100%; height:auto; border-radius:8px;" onclick="showPopup('popupGin')">
            <h5><strong>Gin</strong></h5>
            <p class="w3-text-grey">6.00€</p>
        </div>

        <div class="popup-overlay" id="overlayGin" onclick="closePopup('popupGin')"></div>
        <div class="popup" id="popupGin">
            <h3>Gin</h3>
            <p>Prix: 6.00€</p>
            <p>
            Ce gin artisanal signé Brasserie Terroir & Saveurs est une véritable ode à la nature.
            Élaboré à partir de plantes aromatiques locales et d’épices soigneusement sélectionnées,
            il combine des notes fraîches de genièvre, des zestes d’agrumes et des touches
            herbacées. Sa complexité et sa pureté en font un spiritueux raffiné, idéal pour des
            cocktails sophistiqués ou une dégustation pure.
            </p>
            <button class="close-btn" onclick="closePopup('popupGin')">Fermer</button>
        </div>

    
        <div class="w3-col s12 m6">
            <img src="produits-05.png" alt="Whiskey" style="width:100%; height:auto; border-radius:8px;" onclick="showPopup('popupWhiskey')">
            <h5><strong>Whiskey</strong></h5>
            <p class="w3-text-grey">4.50€</p>
        </div>

        <div class="popup-overlay" id="overlayWhiskey" onclick="closePopup('popupWhiskey')"></div>
        <div class="popup" id="popupWhiskey">
            <h3>Whiskey</h3>
            <p>Prix: 4.50€</p>
            <p>
            Le whisky de la Brasserie Terroir & Saveurs est un hommage à l’artisanat et au terroir.
            Distillé avec soin et vieilli en fûts de chêne, il révèle une richesse aromatique
            exceptionnelle : des notes de vanille, d’épices douces, de fruits secs et une pointe de
            tourbe. Ronde et élégante, cette eau-de-vie offre une dégustation unique, parfaite pour les
            connaisseurs.
            </p>
            <button class="close-btn" onclick="closePopup('popupWhiskey')">Fermer</button>
        </div>

    </div>
  </div>
</div>


<script>
    
        function showPopup(id) {
        document.getElementById(id).style.display = "block";
        document.getElementById("overlay" + id.replace("popup", "")).style.display = "block";
    }

    function closePopup(id) {
        document.getElementById(id).style.display = "none";
        document.getElementById("overlay" + id.replace("popup", "")).style.display = "none";
    }
  </script>


<br><br><br>




  <div class="w3-container" id="contact" style="padding-bottom:32px;">
    <div class="w3-content" style="max-width:700px">
      <h5 class="w3-center w3-padding-48"><span class="w3-tag w3-wide">CONTACT</span></h5>
    
      <form action="contact_redirection.php" method="POST" methode target="_blank">
        <p><input class="w3-input w3-padding-16 w3-border" type="text" placeholder="Nom" required name="nom"></p>
        <p><input class="w3-input w3-padding-16 w3-border" type="text" placeholder="Prenom" required name="prenom"></p>
        <p><input class="w3-input w3-padding-16 w3-border" type="text" placeholder="E-mail" required name="email"></p>
        <p><input class="w3-input w3-padding-16 w3-border" type="text" placeholder="Telephone" required name="telephone"></p>
        <textarea name="message" id="message" placeholder="Message" style="width: 100%; height: 200px; resize: none;"></textarea>
        <p><button class="w3-button w3-black" type="submit">ENVOYER</button></p>
      </form>
    </div>
  </div>
</div>



</body>
</html>
