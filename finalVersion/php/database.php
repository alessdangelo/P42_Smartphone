<?php 
/*
    ETML
    By : Manuel Oro
    Date : 25.12.2020
    Desc : Connect db to website
*/
    define('HOST', 'localhost');
    define('DB_NAME', 'db_smartphone');
    define('USER', 'root');
    define('PASS','root');

    try
    {
        $db = new PDO("mysql:host=" . HOST . ";dbname=" . DB_NAME, USER, PASS);
        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }
    catch(PDOException $e)
    {
        echo $e;
    }

?>