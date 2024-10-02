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
        $query = "SELECT count(*) FROM students WHERE section='A' AND class=1";
        $data = $conn->fetchFirstColumn(($query));
        print_r($data);
    }
}catch(Exception $e){
    echo "Failed";
}
