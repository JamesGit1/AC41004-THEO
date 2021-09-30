<?php

// $host = '127.0.0.1';
// $db   = 'theohealth';
// $user = 'root';
// $pass = 'xxxx';
// $port = "3306";
// $charset = 'utf8mb4';

// $options = [
//     \PDO::ATTR_ERRMODE            => \PDO::ERRMODE_EXCEPTION,
//     \PDO::ATTR_DEFAULT_FETCH_MODE => \PDO::FETCH_ASSOC,
//     \PDO::ATTR_EMULATE_PREPARES   => false,
// ];
// $dsn = "mysql:host=$host;dbname=$db";
// try {
//      $pdo = new \PDO($dsn, $user, $options);
// } catch (\PDOException $e) {
//      throw new \PDOException($e->getMessage(), (int)$e->getCode());
// }


$servername = "127.0.0.1";
$username = "root";

try {
  $pdo = new PDO("mysql:host=$servername;dbname=theohealth", $username);
  // set the PDO error mode to exception
  $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  //echo "Connected successfully";
} catch(PDOException $e) {
  echo "Connection failed: " . $e->getMessage();
}
?>