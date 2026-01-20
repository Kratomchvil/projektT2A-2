// product-modal.js - quick view modal for any product card
document.addEventListener('DOMContentLoaded', function(){
  function qs(sel, ctx){ return (ctx||document).querySelector(sel); }

  const modal = qs('#product-modal');
  if(!modal) return;
  const overlay = qs('.modal-overlay', modal);
  const closeBtn = qs('.modal-close', modal);
  const titleEl = qs('.modal-title', modal);
  const descEl = qs('.modal-desc', modal);
  const priceEl = qs('.modal-price', modal);
  const imgEl = qs('.modal-image img', modal);
  const buyBtn = qs('.modal-buy', modal);

  function buildBuyHref(title, originalHref){
    try{
      if(originalHref && originalHref.includes('kosik')) return originalHref;
      if(originalHref && originalHref.includes('?product=')) return originalHref;
    }catch(e){}
    const p = encodeURIComponent(title || 'Produkt');
    return 'kosik-krok1.html?product=' + p;
  }

  function openModal(data){
    titleEl.textContent = data.title || '';
    descEl.textContent = data.desc || '';
    priceEl.textContent = data.price || '';
    imgEl.src = data.img || '';
    imgEl.alt = data.title || '';
    buyBtn.href = buildBuyHref(data.title, data.href);
    // store last opened product info on modal for buy handler
    modal._current = { title: data.title || '', img: data.img || '', href: buyBtn.href };
    modal.setAttribute('aria-hidden','false');
    modal.style.display = 'flex';
  }

  function closeModal(){
    modal.setAttribute('aria-hidden','true');
    modal.style.display = 'none';
  }

  overlay.addEventListener('click', closeModal);
  closeBtn.addEventListener('click', closeModal);
  document.addEventListener('keydown', function(e){ if(e.key==='Escape') closeModal(); });

  // delegate clicks on product list buy/show buttons
  document.addEventListener('click', function(e){
    const btn = e.target.closest('.product-list .btn-primary, .product-card .btn-primary, .btn-primary');
    if(!btn) return;
    const card = btn.closest('.product-card') || btn.closest('.card.product-card');
    if(!card) return;
    e.preventDefault();
    const title = (card.querySelector('.title')||{}).textContent || (card.querySelector('img')||{}).alt || '';
    const desc = (card.querySelector('.muted')||{}).textContent || '';
    const price = (card.querySelector('.price')||{}).textContent || '';
    const img = (card.querySelector('img')||{}).src || '';
    const href = btn.getAttribute('href') || '';
    openModal({ title, desc, price, img, href });
  });
  
  // when user clicks Buy inside modal, add correct product to cart and then go to cart
  if(buyBtn){
    buyBtn.addEventListener('click', function(e){
      e.preventDefault();
      try{
        if(window.cartHelpers && typeof window.cartHelpers.addItem === 'function'){
          const info = modal._current || {};
          window.cartHelpers.addItem({ name: info.title || titleEl.textContent, img: info.img || imgEl.src, qty: 1 });
        }
      }catch(err){}
      // navigate to buy href (built earlier)
      var target = buyBtn.getAttribute('href') || '#';
      if(target && target !== '#') window.location.href = target;
    });
  }

  // also intercept direct .btn-primary clicks inside product cards (in case user wants instant add)
  document.addEventListener('click', function(e){
    const direct = e.target.closest('.card.product-card .btn-primary, .product-card .btn-primary');
    if(!direct) return;
    const card = direct.closest('.product-card') || direct.closest('.card.product-card');
    if(!card) return;
    const href = direct.getAttribute('href') || '';
    const title = (card.querySelector('.title')||{}).textContent || (card.querySelector('img')||{}).alt || '';
    const img = (card.querySelector('img')||{}).src || '';
    // if link points directly to kosik (or explicit intent), add item and navigate
    if(href && href.includes('kosik')){
      e.preventDefault();
      try{ if(window.cartHelpers) window.cartHelpers.addItem({ name: title, img: img, qty: 1 }); }catch(e){}
      window.location.href = href;
      return;
    }
    // otherwise, let modal open handler handle showing correct product (which will add image when bought)
  });
});
