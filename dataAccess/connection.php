<?php
    $fileConfig = parse_ini_file(__DIR__ . DIRECTORY_SEPARATOR . "config.ini");
    
    $tipoDb = $fileConfig["DbType"];
    $host = $fileConfig["DbHost"];
    $dbName = $fileConfig["DbName"];
    $user = $fileConfig["DbUser"];
    $password = $fileConfig["DbPw"];

    echo "tipoDb: " .$tipoDb ."<br>";
    echo "dbName: " .$dbName ."<br>";
    echo "host: " .$host ."<br>";
    echo "user: " .$user ."<br>";
    echo "password: " .$password ."<br>";

    $db = new PDO("mysql:host = $host; dbName = $dbName;", $user, $password);