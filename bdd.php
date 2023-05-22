<?php
$bddservername = "localhost";
$bddusername = "Antoine";
$bddpassword = "1234";

try {
  $bdd = new PDO("mysql:host=$bddservername;dbname=projet", $bddusername, $bddpassword);
  // set the PDO error mode to exception
  $bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  
} catch(PDOException $e) {
  echo "Connection failed: " . $e->getMessage();
}
?>