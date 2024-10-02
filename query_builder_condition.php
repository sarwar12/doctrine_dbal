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
        $qb->select("*")->from('students')
        ->where('class=? and section=?')
        ->orWhere('class=? and section=?')
        ->setParameter(1,1)
        ->setParameter(2,'A')
        ->setParameter(3,2)
        ->setParameter(4,'B');

        //echo $qb->getSQL();
        print_r($qb->executeQuery()->fetchAllAssociative());
    }
}catch(Exception $e){
    echo "Failed";
}
