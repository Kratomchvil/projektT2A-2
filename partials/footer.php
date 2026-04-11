
<?php
require_once __DIR__ . '/src/bootstrap.php';

$cart = new Cart();
$pageTitle = 'Hlavní stránka';
$cartItemCount = $cart->getTotalQuantity();

// Hlavička (otevírá <html>, <head>, <header> s navigací a košíkem)
require __DIR__ . '/partials/header.php';
?>
<footer class="site-footer">
  <div class="container">
    <div style="display:flex; justify-content:space-between; align-items:center; gap:1rem; flex-wrap:wrap">
      <div>
        <strong>DrumShop</strong>
        <div class="muted">Prodej bicích nástrojů — Praha</div>
      </div>
      <div class="muted">© 2026 DrumShop. Všechna práva vyhrazena.</div>
    </div>
  </div>
</footer>
<?php
// Patička (uzavírá <footer>, </body>, </html>)
require __DIR__ . '/partials/footer.php';
?>