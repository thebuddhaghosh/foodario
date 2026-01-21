<?php
require 'db.php';

$code=$_POST['code'];
$s=$pdo->prepare("SELECT * FROM coupons WHERE code=? AND active=1");
$s->execute([$code]);
$c=$s->fetch(PDO::FETCH_ASSOC);

echo json_encode($c ?: ['error'=>'Invalid coupon']);
?>