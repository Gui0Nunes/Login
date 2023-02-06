<?php

//Estanciar autoload do composer
require "../../vendor/autoload.php";
//createImmutable
//Estanciar biblioteca variavel de ambiente
$dotenv = Dotenv\Dotenv::createUnsafeImmutable('../../env');
$dotenv->load();
//Acesso BD
define('HOST', getenv('HOST'));
define('USER', getenv('USER'));
define('PASS', getenv('PASS'));
define('DBNAME', getenv('DBNAME'));


try{
    $pdo = new PDO("mysql:host=" . HOST . ";dbname=" . DBNAME, USER, PASS);
    // Defina o modo de erro PDO para exceção
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch(PDOException $e){
    die("ERROR: Não foi possível conectar." . $e->getMessage());
}
