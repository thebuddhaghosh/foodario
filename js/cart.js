let cart=JSON.parse(localStorage.getItem("cart"))||[];

function save(){localStorage.setItem("cart",JSON.stringify(cart))}
function add(p){
 let i=cart.find(x=>x.id===p.id);
 i?i.qty++:cart.push({...p,qty:1});
 save(); render();
}
function render(){
 let el=document.querySelector(".cart-items");
 if(!el)return;
 el.innerHTML="";
 let total=0;
 cart.forEach(i=>{
  total+=i.price*i.qty;
  el.innerHTML+=`
  <div class="cart-item">
    ${i.name} x${i.qty}
    <button onclick="remove(${i.id})">×</button>
  </div>`;
 });
 document.querySelector(".cart-total").innerText="$"+total;
}
function remove(id){
 cart=cart.filter(i=>i.id!==id);
 save();render();
}
render();
