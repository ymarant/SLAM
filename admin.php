<?php
session_start();

$servername = "sql208.infinityfree.com";
$username = "if0_38342249"; 
$password = "8p8SMDlMUOmSd"; 
$dbname = "if0_38342249_brasserie";
include 'Logs.php';

$bdd = new PDO('mysql:host=' . $servername . ';dbname=' . $dbname . ';charset=utf8', $username, $password);



 if (isset($_SESSION['id_user']) and isset($_SESSION['role'])) {
     if ($_SESSION['role'] != "admin"){
        header("Location: connexion.php");
     }
 } else {
     header("Location: connexion.php");
 }




if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['ajouter'])) {
     
        $requete = $bdd->prepare('INSERT INTO utilisateurs (nom, prenom, email, telephone, mdp, id_role) VALUES (:nom, :prenom, :email, :telephone, :mdp, :id_role)');
        $requete->execute([
            'nom' => $_POST['nom'],
            'prenom' => $_POST['prenom'],
            'email' => $_POST['email'],
            'telephone' => $_POST['telephone'],
            'mdp' => md5("1234"),
            'id_role' => $_POST['id_role']
        ]);
    } elseif (isset($_POST['modifier'])) {
        $requete = $bdd->prepare('UPDATE utilisateurs SET nom = :nom, prenom = :prenom, email = :email, telephone = :telephone, id_role = :id_role WHERE id = :id');
        $requete->execute([
            'nom' => $_POST['nom'],
            'prenom' => $_POST['prenom'],
            'email' => $_POST['email'],
            'telephone' => $_POST['telephone'],
            'id_role' => $_POST['id_role'],
            'id' => $_POST['id']
        ]);
    } elseif (isset($_POST['supprimer'])) {
        $requete = $bdd->prepare('DELETE FROM utilisateurs WHERE id = :id');
        $requete->execute(
            [
                'id' => $_POST['id']
            ]);
    }
}

$utilisateurs = $bdd->query('SELECT * FROM utilisateurs')->fetchAll(PDO::FETCH_ASSOC);
$roles = $bdd->query('SELECT * FROM roles')->fetchAll(PDO::FETCH_ASSOC);
$logs = Logs::getLogs();
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Gestion des Utilisateurs</title>
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Inconsolata">

    <style>
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
<br><br>

<div class="w3-container w3-padding-large" id="home">
    <br>
    <!-- AJOUT D'UN UTILISATEUR -->
    <div class="w3-card-4 w3-padding" style="background-color: white; padding: 20px; border-radius: 10px;">
        <h5 class="w3-center w3-padding-48"><span class="w3-tag w3-wide">Ajouter un Utilisateur</span></h5>
        <form method="post">
            <input class="w3-input w3-border" type="text" name="nom" placeholder="Nom" required>
            <input class="w3-input w3-border" type="text" name="prenom" placeholder="Prénom" required>

            <input class="w3-input w3-border" type="email" name="email" placeholder="Email" required>
            <input class="w3-input w3-border" type="text" name="telephone" placeholder="Téléphone" required>
            <select class="w3-select w3-border" name="id_role" required>
                <?php foreach ($roles as $role): ?>
                    <option value="<?= $role['id'] ?>"><?= $role['role'] ?></option>
                <?php endforeach; ?>
            </select>
            <button class="w3-button w3-black w3-block" type="submit" name="ajouter">Ajouter</button>
        </form>
    </div>

    <br><br>

    <!-- MODIFICATION D'UN UTILISATEUR -->
    <div class="w3-card-4 w3-padding" style="background-color: white; padding: 20px; border-radius: 10px;">
        <h5 class="w3-center w3-padding-48"><span class="w3-tag w3-wide">Liste des Utilisateurs</span></h5>
        <table class="w3-table w3-striped w3-bordered">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nom</th>
                    <th>Prénom</th>
                    <th>Email</th>
                    <th>Téléphone</th>
                    <th>Rôle</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($utilisateurs as $utilisateur): ?>
                    <tr>
                        <td><?= $utilisateur['id'] ?></td>
                        <td><?= $utilisateur['nom'] ?></td>
                        <td><?= $utilisateur['prenom'] ?></td>
                        <td><?= $utilisateur['email'] ?></td>
                        <td><?= $utilisateur['telephone'] ?></td>
                        <td><?= $utilisateur['id_role'] ?></td>
                        <td>
                            <form method="post" style="display:inline;">
                                <input type="hidden" name="id" value="<?= $utilisateur['id'] ?>">
                                <input class="w3-input w3-border" type="text" name="nom" value="<?= htmlspecialchars($utilisateur['nom']) ?>" required>
                                <input class="w3-input w3-border" type="text" name="prenom" value="<?= htmlspecialchars($utilisateur['prenom']) ?>" required>
                                <input class="w3-input w3-border" type="email" name="email" value="<?= htmlspecialchars($utilisateur['email']) ?>" required>
                                <input class="w3-input w3-border" type="text" name="telephone" value="<?= htmlspecialchars($utilisateur['telephone']) ?>" required>
                                <select class="w3-select w3-border" name="id_role" required>
                                    <?php foreach ($roles as $role): ?>
                                        <option value="<?= $role['id'] ?>" <?= $role['id'] == $utilisateur['id_role'] ? 'selected' : '' ?>><?= $role['role'] ?></option>
                                    <?php endforeach; ?>
                                </select>
                                <button class="w3-button w3-brown" type="submit" name="modifier">Modifier</button>
                            </form>
                            <form method="post" style="display:inline;">
                                <input type="hidden" name="id" value="<?= $utilisateur['id'] ?>">
                                <button class="w3-button w3-grey" type="submit" name="supprimer">Supprimer</button>
                            </form>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>

    <br><br>

    <!-- Logs -->
    <div class="w3-card-4 w3-padding" style="background-color: white; padding: 20px; border-radius: 10px;">
        <h5 class="w3-center w3-padding-48"><span class="w3-tag w3-wide">Logs</span></h5>
            <p><?= $logs ?></p>
    </div>

</div>

</body>
</html>
