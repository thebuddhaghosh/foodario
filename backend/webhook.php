<?php
require 'config.php';
require 'db.php';

$payload=@file_get_contents("php://input");
$event=\Stripe\Event::constructFrom(json_decode($payload,true));

if($event->type==='checkout.session.completed'){
  $s=$event->data->object;
  $stmt=$pdo->prepare("INSERT INTO orders (stripe_session_id,email,total,status)
                       VALUES (?,?,?,?)");
  $stmt->execute([
    $s->id,
    $s->customer_details->email,
    $s->amount_total/100,
    'paid'
  ]);
}
?>