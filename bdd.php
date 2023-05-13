<?php
$bddservername = "localhost";
$bddusername = "Paul";
$bddpassword = "Paul";

try {
  $bdd = new PDO("mysql:host=$bddservername;dbname=BDCOMMANDES", $bddusername, $bddpassword);
  // set the PDO error mode to exception
  $bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  
} catch(PDOException $e) {
  echo "Connection failed: " . $e->getMessage();
}
?>