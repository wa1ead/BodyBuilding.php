<?php
$ServerName= 'localhost';
$dbUsername= 'root';
$dbPassword= '';
$dbName= 'BodyBuilding';

$conn= mysqli_connect($ServerName, $dbUsername ,$dbPassword, $dbName);

if(!$conn){
    die('Connection Failed: '. mysqli_connect_error());
}