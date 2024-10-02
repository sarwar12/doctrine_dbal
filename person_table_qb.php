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
        $qb->delete('persons')
        ->where('id = ?')
        ->setParameter(1, 4)
        ->executeQuery();
    }
}catch(Exception $e){
    echo $e->getMessage();
    echo "Failed";
}
