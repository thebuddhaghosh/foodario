<?php
require 'db.php';

function checkStock($id,$qty){
  global $pdo;
  $s=$pdo->prepare("SELECT stock FROM products WHERE id=?");
  $s->execute([$id]);
  return $s->fetchColumn() >= $qty;
}
?>