<?php
require __DIR__ . '/vendor/autoload.php';

\Stripe\Stripe::setApiKey('sk_test_YOUR_SECRET_KEY');

define('DOMAIN','http://localhost/luxe-shop');
?>