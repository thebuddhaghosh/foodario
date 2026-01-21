<?php
require 'config.php';
require 'inventory.php';

$data=json_decode(file_get_contents("php://input"),true);
$cart=$data['cart'];

$items=[];
foreach($cart as $i){
  if(!checkStock($i['id'],$i['qty'])){
    http_response_code(400);
    exit(json_encode(['error'=>'Out of stock']));
  }
  $items[]=[
    'price_data'=>[
      'currency'=>'usd',
      'product_data'=>['name'=>$i['name']],
      'unit_amount'=>$i['price']*100
    ],
    'quantity'=>$i['qty']
  ];
}

$session=\Stripe\Checkout\Session::create([
  'mode'=>'payment',
  'line_items'=>$items,
  'success_url'=>DOMAIN.'/backend/order-confirmation.php?session_id={CHECKOUT_SESSION_ID}',
  'cancel_url'=>DOMAIN.'/cart.html'
]);

echo json_encode(['id'=>$session->id]);
?>