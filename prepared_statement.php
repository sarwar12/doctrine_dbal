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
        $statement = $conn->executeQuery("SELECT * FROM students WHERE section=? AND class=?", ['A', 1]);
        print_r($statement->fetchAllAssociative());
        
    }
}catch(Exception $e){
    echo "Failed";
}
