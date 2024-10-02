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
        echo "Connected";
        $result = $conn->executeQuery("SELECT * FROM students WHERE section=? AND class=?", array('A', 1));
        /* while($data = $result->fetchAllAssociative()){
            print_r($data);
        } */
       print_r($result->fetchAllAssociative(PDO::FETCH_BOTH));
    }
}catch(Exception $e){
    echo "Failed";
}