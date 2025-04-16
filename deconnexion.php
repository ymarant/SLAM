<?php
session_start();

if(isset($_SESSION['id_user'])) {
    unset($_SESSION['id_user']);
    unset($_SESSION['role']);
    session_destroy();
    header("Location: index.php?deconnexion=true");
} else {
    header("Location: index.php");
}


?>