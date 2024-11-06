<?php

$host = "localhost";
$dbname = "clients-system";
$usermame = "root";
$password = "root";

try {
  $pdo = new PDO("mysql:host=$host;dbname=$dbname", $usermame, $password);
  $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
  die("Connection failed: " . $e->getMessage());
}
