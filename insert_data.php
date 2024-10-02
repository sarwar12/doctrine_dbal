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
        $conn->insert('persons', ['name'=>'Jaman khan', 'email'=>'jaman3@gmailc.com']);
        echo $conn->lastInsertId();
    }
}catch(Exception $e){
    echo "Failed";
}
