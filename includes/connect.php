<?php

    $host = "localhost";
    $port = "5432";
    $db = "myWiki";
    $user = "postgres";
    $pw = "IchbinKevin03.";
    $connStr = "host=$host port=$port dbname=$db user=$user password=$pw";

    $dbConn = pg_connect($connStr);

    if(!$dbConn) {
        echo "Ein Fehler ist aufgetreten.\n";
        exit;
    }

?>