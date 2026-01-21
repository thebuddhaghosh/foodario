<?php
require 'db.php';

$id=$_GET['session_id'];
$s=$pdo->prepare("SELECT * FROM orders WHERE stripe_session_id=?");
$s->execute([$id]);
$o=$s->fetch();
if(!$o) die("Order not found");
?>
<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="../css/style.css">
</head>
<body class="text-center py-5">
<h1>Order Confirmed</h1>
<p>Order #<?= $o['id'] ?></p>
<p>Total $<?= number_format($o['total'],2) ?></p>
<a href="../index.html" class="btn btn-dark">Continue Shopping</a>
</body>
</html>
