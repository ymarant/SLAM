<?php

ini_set('display_errors', 1);
error_reporting(E_ALL);


session_start();

$servername = "sql208.infinityfree.com";
$username = "if0_38342249";
$password = "8p8SMDlMUOmSd";
$dbname = "if0_38342249_brasserie";

$bdd = new PDO("mysql:host=$servername;dbname=$dbname;charset=utf8", $username, $password);

$id_direction = $_SESSION['id_user'];
$role = $_SESSION['role'];

if (isset($_SESSION['id_user']) and isset($_SESSION['role'])) {
    if ($_SESSION['role'] != "direction"){
       header("Location: connexion.php");
    }
  } else {
    header("Location: connexion.php");
  }

$mois = isset($_GET['mois']) ? $_GET['mois'] : date('n'); 
$annee = isset($_GET['annee']) ? $_GET['annee'] : date('Y'); 
  
 
#### reservations ####
$reservations_valide = $bdd->prepare("SELECT * FROM reservations WHERE statut_resa = 'validée' AND YEAR(date_resa) = :annee AND MONTH(date_resa) = :mois");
$reservations_valide->execute([
    'annee' => $annee,
    'mois' => $mois
]);
$reservations_valide = $reservations_valide->fetchAll(PDO::FETCH_ASSOC);
  
#### maitieres premieres ####
$matieres_premiers = $bdd->prepare("SELECT * FROM matieres_premieres WHERE YEAR(date_achat) = :annee AND MONTH(date_achat) = :mois");
$matieres_premiers->execute([
    'annee' => $annee,
    'mois' => $mois
]);
$matieres_premiers = $matieres_premiers->fetchAll(PDO::FETCH_ASSOC);


#### depense ####
$depense = $bdd->prepare("SELECT SUM(prix) AS depense FROM matieres_premieres WHERE YEAR(date_achat) = :annee AND MONTH(date_achat) = :mois");
$depense->execute([
    'annee' => $annee,
    'mois' => $mois
]);
$depense = $depense->fetch(PDO::FETCH_ASSOC);
$depense = $depense['depense'];
  

#### recette ####
$recette = $bdd->prepare("SELECT SUM(prix_resa) AS recette FROM reservations WHERE statut_resa = 'validée' AND YEAR(date_resa) = :annee AND MONTH(date_resa) = :mois");
$recette->execute([
    'annee' => $annee, 
    'mois' => $mois
]);
$recette = $recette->fetch(PDO::FETCH_ASSOC);
$recette = $recette['recette'];

?>
  
  <!DOCTYPE html>
  <html lang="fr">
  <head>
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
      <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Inconsolata">
      <title>DIRECTION</title>
      <style>
          body, html {
              height: 100%;
              font-family: "Inconsolata", sans-serif;
          }
          .container {
              max-width: 900px;
              margin: 40px auto;
              padding: 30px;
              background: white;
              border-radius: 8px;
              box-shadow: 0px 4px 10px rgba(0,0,0,0.1);
          }
          .bgimg {
              background-position: center;
              background-size: cover;
              background-image: url("https://www.maison-michard.fr/wp-content/uploads/2022/11/MICHARD-photo-158A5184.jpg");
              position: fixed;
              top: 0;
              left: 0;
              width: 100%;
              height: 100%;
              filter: blur(5px);
              z-index: -1;
          }
          .menu {
              display: none;
          }
      </style>
  </head>
  <body>
  
  <div class="bgimg"></div>
  
  <div class="w3-top">
      <div class="w3-row w3-padding w3-black">
          <div class="w3-col s3">
              <a href="index.php" class="w3-button w3-block w3-black">RETOUR</a>
          </div>
      </div>
  </div>
  
  <div class="container">
      <form method="GET" action="">
          <div style="text-align: center;">
              <label for="mois">Mois:</label>
              <select name="mois" id="mois">
                    <?php
                        $mois_list = [1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12];  
                        $mois = isset($_GET['mois']) ? $_GET['mois'] : date('n');
                        foreach ($mois_list as $mois_num) {
                            echo "<option value='$mois_num' " . ($mois == $mois_num ? 'selected' : '') . ">$mois_num</option>";
                        }
                    ?>
                </select>

                <label for="annee">Année:</label>
                <select name="annee" id="annee">
                    <?php
                    
                        $annee_list = [2019, 2020, 2021, 2022, 2023, 2024, 2025, 2026, 2027];
                        $annee = isset($_GET['annee']) ? $_GET['annee'] : date('Y');
                        foreach ($annee_list as $annee_num) {
                            $selected = ($annee == $annee_num) ? 'selected' : '';
                            echo "<option value='$annee_num' $selected>$annee_num</option>";
                        }
                    ?>
                </select>
  
              <input type="submit" value="Filtrer">
          </div>
      </form>
  
      <h5 class="w3-center w3-padding-48"><span class="w3-tag w3-wide">Commandes passées</span></h5>
  
      <table style="width: 100%; border-collapse: collapse; margin-top: 10px;">
          <thead>
              <tr style="background: grey;">
                  <th>ID</th>
                  <th>Nom</th>
                  <th>Client</th>
                  <th>Quantité</th>
                  <th>Date</th>
                  <th>Prix</th>
              </tr>
          </thead>
          <tbody>
              <?php foreach ($reservations_valide as $reservation): 
                  $nom_produit_resa = $bdd->prepare("SELECT nom FROM produits WHERE id = :id_produit");
                  $nom_produit_resa->execute(['id_produit' => $reservation['id_produit']]);
                  $nom_produit_resa = $nom_produit_resa->fetch(PDO::FETCH_ASSOC);
  
                  $produit_client = $bdd->prepare("SELECT nom, prenom FROM utilisateurs WHERE id = :id_client");
                  $produit_client->execute(['id_client' => $reservation['id_client']]);
                  $produit_client = $produit_client->fetch(PDO::FETCH_ASSOC);
              ?>
              <tr>
                  <td style="border: 1px solid #ccc; text-align: center;"><?= htmlspecialchars($reservation['id']); ?></td>
                  <td style="border: 1px solid #ccc;"><?= htmlspecialchars($nom_produit_resa['nom']); ?></td>
                  <td style="border: 1px solid #ccc;"><?= htmlspecialchars($produit_client['nom']) . " " . htmlspecialchars($produit_client['prenom']); ?></td>
                  <td style="border: 1px solid #ccc; text-align: center;"><?= htmlspecialchars($reservation['quantite']); ?></td>
                  <td style="border: 1px solid #ccc;"><?= htmlspecialchars($reservation['date_resa']); ?></td>
                  <td style="border: 1px solid #ccc; text-align: center;"><?= htmlspecialchars($reservation['prix_resa']) . "€"; ?></td>
              </tr>
              <?php endforeach; ?>
          </tbody>
      </table>
  
      <br> 
  
      <h5 class="w3-center w3-padding-48"><span class="w3-tag w3-wide">Matieres premieres achetées</span></h5>
      <table style="width: 100%; border-collapse: collapse; margin-top: 10px;">
          <thead>
              <tr style="background: grey;">
                  <th>ID</th>
                  <th>Nom</th>
                  <th>Quantité</th>
                  <th>Date achat</th>
                  <th>Prix</th>
              </tr>
          </thead>
          <tbody>
              <?php foreach ($matieres_premiers as $matiere_premiere): ?>
              <tr>
                  <td style="border: 1px solid #ccc; text-align: center;"><?= htmlspecialchars($matiere_premiere['id']); ?></td>
                  <td style="border: 1px solid #ccc;"><?= htmlspecialchars($matiere_premiere['nom']); ?></td>
                  <td style="border: 1px solid #ccc;"><?= htmlspecialchars($matiere_premiere['quantite']); ?></td>
                  <td style="border: 1px solid #ccc;"><?= htmlspecialchars($matiere_premiere['date_achat']); ?></td>
                  <td style="border: 1px solid #ccc;"><?= htmlspecialchars($matiere_premiere['prix']); ?></td>
                  
              </tr>
              <?php endforeach; ?>
          </tbody>
      </table>
  
  </div>
  
  <div class="container">
      <p><strong>Depense totale :</strong> <?= isset($depense) ? $depense : 0 ?> €</p>
      <p><strong>Recette totale :</strong> <?= isset($recette) ? $recette : 0 ?> €</p>
      <p><strong>Benefice :</strong> <?= $recette - $depense ?> €</p>
  </div>
  
  </body>
  </html>