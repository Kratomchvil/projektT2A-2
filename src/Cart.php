<?php
$cart = new Cart();

// Přidat produkt do košíku (bez varianty)
$cart->add(
    productId: $product->id,
    productName: $product->name,
    unitPrice: $product->price,
    image: $product->image,
);

// Přidat produkt s variantou (stejný produkt v jiné variantě = jiná položka)
$cart->add(
    productId: $product->id,
    productName: $product->name,
    unitPrice: $product->price,
    image: $product->image,
    variant: 'Barva: Černá, Velikost: 42',
);

// Změnit množství (pro variantu je třeba uvést i variant string)
$cart->updateQuantity(productId: 1, quantity: 3);
$cart->updateQuantity(productId: 1, quantity: 2, variant: 'Barva: Černá, Velikost: 42');

// Odebrat produkt
$cart->remove(productId: 1);
$cart->remove(productId: 1, variant: 'Barva: Černá, Velikost: 42');

// Zobrazení košíku
$items = $cart->getItems();           // pole CartItemDTO[]
$total = $cart->getTotalPrice();      // celková cena
$count = $cart->getTotalQuantity();   // celkový počet kusů
$empty = $cart->isEmpty();            // je košík prázdný?

// Vyprázdnit košík (po odeslání objednávky)
$cart->clear();

?>