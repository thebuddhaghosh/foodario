const stripe=Stripe("pk_test_YOUR_PUBLIC_KEY");

document.getElementById("pay").onclick=()=>{
 fetch("backend/create-checkout-session.php",{
  method:"POST",
  headers:{"Content-Type":"application/json"},
  body:JSON.stringify({cart})
 })
 .then(r=>r.json())
 .then(d=>stripe.redirectToCheckout({sessionId:d.id}));
};
