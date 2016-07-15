<?php
    $server = php_uname('n');
    if(strpos($server, '.local') != false) {
        $dsn = 'mysql:host=localhost;dbname=salt_city_esports';
        $username = 'root';
        $password = '';
    }else{
        $dsn = 'mysql:host=localhost;dbname=herecon1_guitar1';
        $username = 'herecon1_iClient';
        $password = '-)&(C!DzI.5G';
    }

    try {
        $db = new PDO($dsn, $username, $password);
    } catch (PDOException $e) {
        $error_message = $e->getMessage();
        include('../errors/db_error.php');
        exit();
    }
?>