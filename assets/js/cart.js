// cart.js - simple localStorage cart counter (no prices)
(function(){
  const KEY = 'drumshop_cart_v1';
  function getCart(){
    try{ return JSON.parse(localStorage.getItem(KEY) || '[]'); }catch(e){ return []; }
  }
  function saveCart(cart){ localStorage.setItem(KEY, JSON.stringify(cart)); }
  // addItem accepts either a string (name) or object { name, img, qty }
  function addItem(item){
    if(!item) return;
    let name = typeof item === 'string' ? item : (item.name || 'Produkt');
    const img = (typeof item === 'object' && item.img) ? item.img : '';
    const qtyToAdd = (typeof item === 'object' && item.qty) ? parseInt(item.qty,10) : 1;
    const cart = getCart();
    const existing = cart.find(i=>i.name === name);
    if(existing){ existing.qty = (existing.qty||0) + qtyToAdd; if(img) existing.img = img; }
    else cart.push({ name: name, img: img, qty: qtyToAdd });
    saveCart(cart);
    renderCount();
  }
  function totalCount(){
    return getCart().reduce((s,i)=>s + (i.qty||0), 0);
  }
  function renderCount(){
    const els = document.querySelectorAll('.cart-count');
    els.forEach(el => el.textContent = totalCount());
  }
  window.cartHelpers = { addItem, getCart, saveCart, totalCount, renderCount };
  document.addEventListener('DOMContentLoaded', renderCount);
})();
