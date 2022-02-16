<?php

  $host = 'localhost';
  $user = 'root';
  $db = 'films';//database
  $pwd = '';//password
  try {
    $bdd = new PDO('mysql:host='.$host.';dbname='.$db.';charset=utf8', $user,$pwd);
       return $bdd;
  }catch (Exception $e) {
    exit('Erreur : '.$e->getMessage());
  }
 
?>