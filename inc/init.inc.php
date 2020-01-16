<?php

# Connexion à notre BDD Company
$dsn = "mysql:host=localhost;dbname=company";
$log="root";
$pwd="";
$attributs = [
    PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING,
    PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8",
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
];

$pdo = new PDO($dsn, $log, $pwd, $attributs);