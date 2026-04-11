<?php
require_once __DIR__ . '/src/bootstrap.php';

$cart = new Cart();
$pageTitle = 'Hlavní stránka';
$cartItemCount = $cart->getTotalQuantity();

// Hlavička (otevírá <html>, <head>, <header> s navigací a košíkem)
require __DIR__ . '/partials/header.php';
?>
<nav class="site-nav">
  <a href="../projekt-eshop/produkty.html">Všechny produkty</a>
  <a href="../projekt-eshop/kategorie.html">Kategorie</a>
  <a href="../projekt-eshop/o-nas.html">O nás</a>
</nav>
<?php
// Patička (uzavírá <footer>, </body>, </html>)
require __DIR__ . '/partials/footer.php';
?>