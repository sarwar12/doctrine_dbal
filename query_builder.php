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
$qb = $conn->createQueryBuilder();
try{
    if($conn->getDatabase()){
        $qb->select('*')->from('students')->setMaxResults(10);
        echo $qb->getSQL().PHP_EOL;
        $result = $qb->executeQuery()->fetchAllAssociative();
        print_r($result);
    }
}catch(Exception $e){
    echo "Failed";
}
