<?php
session_start();
$servername = "sql208.infinityfree.com";
$username = "if0_38342249"; 
$password = "8p8SMDlMUOmSd"; 
$dbname = "if0_38342249_brasserie";
date_default_timezone_set('Europe/Paris');
include 'Logs.php';


$bdd = new PDO('mysql:host=' . $servername . ';dbname=' . $dbname . ';charset=utf8', $username, $password);

$result = $bdd->prepare('INSERT INTO contacts (nom, prenom, email, telephone, date, message) VALUES (:Nom, :Prenom, :Email, :Telephone, :Date, :Message)');
$result->execute(
    [
    'Nom' => $_POST['nom'],
    'Prenom' => $_POST['prenom'],
    'Email' => $_POST['email'],
    'Telephone' => $_POST['telephone'],
    'Date' => date('Y-m-d H:i:s'),
    'Message' => $_POST['message']
    ]);

    header("Location: index.php");
    Logs::WriteLogs("Contact envoyé -> $email");



?>