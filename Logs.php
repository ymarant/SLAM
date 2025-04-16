<?php

class Logs{

    public static function WriteLogs($logs, $ip){

        date_default_timezone_set('Europe/Paris');
        $date = date('d/m/Y H:i:s');


        $monfichier = fopen('logs.txt', 'a+');
        fwrite($monfichier, "$date | [$ip] $logs <br>\n");
        fgets($monfichier);
        fclose($monfichier);
    }

    public static function getLogs() {
        $monfichier = fopen('logs.txt', 'r');

        $contenu = fread($monfichier, filesize("logs.txt"));
        fclose($monfichier);
        return $contenu;


    }
}

?>