<?php
$server = "localhost";
$username = "root";
$password = "";
$dbname = "group project";

try{
   $pdo = new PDO("mysql:host=$server;port=3306;dbname=$dbname","$username","$password");
   $pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
}catch(PDOException $e){
   die('Unable to connect with the database');
}
