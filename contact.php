<?php
$servername = "sql208.infinityfree.com";
$username = "if0_38342249"; 
$password = "8p8SMDlMUOmSd"; 
$dbname = "if0_38342249_brasserie"; 

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connexion échouée: " . $conn->connect_error);
}

$nom = $_POST['nom'];
$prenom = $_POST['prenom'];
$email = $_POST['email'];
$telephone = $_POST['telephone'];
$message = $_POST['message'];
$date = date("Y-m-d H:i:s");

$sql = "INSERT INTO contacts (nom, prenom, email, telephone, date, message) VALUES (?, ?, ?, ?, ?, ?)";
$stmt = $conn->prepare($sql);
$stmt->bind_param("ssssss", $nom, $prenom, $email, $telephone, $date, $message);

if ($stmt->execute()) {
    echo '<div class="w3-container w3-center w3-padding-32">';
    echo '<div class="w3-card w3-padding-32 w3-round w3-light-grey">';
    echo '<h2>Merci pour votre connexion !</h2>';
    echo '<p>Vos informations ont été enregistrées avec succès.</p>';
    echo '<p><a href="index.php" class="w3-button w3-black w3-round w3-xlarge">Retour au site</a></p>';
    echo '</div>';
    echo '</div>';
} else {
    echo "Erreur : " . $stmt->error;
}

$stmt->close();
$conn->close();
?>
