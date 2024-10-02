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
        //echo $conn->executeStatement('UPDATE persons SET email = ? Where id = ?', ['jaman8@gmailc.com',3]); 
        echo $conn->update('persons', ['email'=>'jaman.feni@gmail.com'], ['id'=>3]);
    }
}catch(Exception $e){
    echo "Failed";
}
