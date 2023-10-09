<?php

$userdb = "root";
$passworddb = "";

try {

  $db = new PDO('mysql:host=localhost;dbname=moneyclick', $userdb, $passworddb);

} catch (PDOException $e) {

  print "Erreur :" . $e->getMessage() . "<br/>";
  die;
  
}