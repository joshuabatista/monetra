<?php   

$username = "root";
$password = "";


try {
    $pdo = new PDO('mysql:host=localhost;dbname=monetra', $username, $password);
      $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  } catch(PDOException $e) {
      echo 'ERROR: ' . $e->getMessage();
  }
