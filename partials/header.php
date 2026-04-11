

<?php
require_once __DIR__ . '/src/bootstrap.php';

$cart = new Cart();
$pageTitle = 'Hlavní stránka';
$cartItemCount = $cart->getTotalQuantity();

// Hlavička (otevírá <html>, <head>, <header> s navigací a košíkem)
require __DIR__ . '/partials/header.php';
?>
<header class="site-header">
  <div class="container wrap">
    <div class="brand">
      <a href="../projekt-eshop/index.html" class="logo"><img src="../assets/logo/logo-main.png" alt="DrumShop logo" style="height:40px; display:block"></a>
      <span class="muted">-Bicí nástroje & příslušenství</span>
    </div>
    <div class="search">
      <form action="../projekt-eshop/vyhledavani.html" method="get">
        <input type="search" name="q" placeholder="Hledat..." style="width:100%; padding:0.6rem; border-radius:8px; border:1px solid rgba(255,255,255,0.04); background:transparent; color:var(--text)">
      </form>
    </div>
    <nav class="site-nav">
      <a href="../projekt-eshop/produkty.html">Produkty</a>
      <a href="../projekt-eshop/kategorie.html">Kategorie</a>
      <a href="../projekt-eshop/o-nas.html">O nás</a>
      <a href="../projekt-eshop/kontakt.html">Kontakt</a>
      <a href="../projekt-eshop/kosik-krok1.html" class="btn btn-ghost cart-badge"><img src="../assets/logo/shopping-cart.png" alt="Košík" style="height:18px"><span class="muted" style="margin-left:6px">Košík</span><span class="cart-count">0</span></a>
    </nav>
  </div>
</header>

<?php
// Patička (uzavírá <footer>, </body>, </html>)
require __DIR__ . '/partials/footer.php';
?>
