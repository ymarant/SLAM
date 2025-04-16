<?php
session_start();
$servername = "sql208.infinityfree.com";
$username = "if0_38342249"; 
$password = "8p8SMDlMUOmSd"; 
$dbname = "if0_38342249_brasserie";
include 'Logs.php';

$bdd = new PDO('mysql:host=' . $servername . ';dbname=' . $dbname . ';charset=utf8', $username, $password);

if (isset($_POST['email']) and (isset($_POST['mdp']))) {
    $email = $_POST['email'];
    $mdp = $_POST['mdp'];

    $result = $bdd->prepare('SELECT * FROM utilisateurs WHERE email = :Email and mdp = :Mdp');
    $result->execute([
        'Email' => $email,
        'Mdp' => md5($mdp),
    ]);

    $user = $result->fetch(PDO::FETCH_ASSOC);

    if ($user) {

        $nom = $user['nom'];
        $id_user = $user['id'];
        $id_role = $user['id_role'];

        $requete2 = $bdd->prepare('SELECT * FROM roles where id = :id_role_user ');
        $requete2->execute([
            'id_role_user' => $id_role,
        ]);
        $role = $requete2->fetch(PDO::FETCH_ASSOC);

        Logs::WriteLogs("Connexion " . $role['role'] ." -> $email", $_SERVER['REMOTE_ADDR']);

        $_SESSION['id_user'] = $id_user;
        $_SESSION['role'] = $role['role'];
        
        header("Location: index.php?message= Bienvenue ". $role['role'] . " " . $nom. " !&role=" . $role['role']);
        
        
    } else {
      
      Logs::WriteLogs("Login incorrect -> $email", $_SERVER['REMOTE_ADDR']);
      header("Location: connexion.php?errorConnexion=true");


   }


}
?>
