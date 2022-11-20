<?php

//funcção para criar uma conexão com o banco de dados
function conectar(){
    $name = "root";
    $pass = "";
    $database = "users";
    $host = "localhost";
    $charset = "utf8";
    $port = "3306";
    $dsn = 'mysql:host=' . $host . ';dbname=' . $database . ';port=' . $port . ';charset=' . $charset;

    $conn = new PDO($dsn, $name, $pass);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    return $conn;
}

