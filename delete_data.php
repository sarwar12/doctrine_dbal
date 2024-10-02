<?php 
require "vendor/autoload.php";
use Doctrine\DBAL\DriverManager;

$connectionParams = [
    'dbname' => 'dbal',
    'user' => 'root',
    'password' => '',
    'host' => 'localhost',
    'driver' => 'mysqli',
];
$conn = DriverManager::getConnection($connectionParams);
try{
    if($conn->getDatabase()){
        echo $conn->delete('persons', ['id'=>3]);
    }
}catch(Exception $e){
    echo "Failed";
}
