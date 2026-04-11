<?php
$customerRepo = new CustomerRepository();
$orderRepo = new OrderRepository();
$cart = new Cart();

// 1) Vytvořit zákazníka
$customer = $customerRepo->create(
    firstName: 'Jan',
    lastName: 'Novák',
    email: 'jan@email.cz',
    phone: '+420 777 123 456',
    street: 'Sportovní 42',
    city: 'Praha',
    zip: '11000',
);

// 2) Vytvořit objednávku z položek košíku
//    Celková cena se vypočítá automaticky (zboží + doprava + platba)
$order = $orderRepo->create(
    customerId: $customer->id,
    shippingMethodId: 2,   // Zásilkovna
    paymentMethodId: 1,    // Kartou online
    note: 'Prosím zabalit jako dárek.',
    cartItems: $cart->getItems(),
);

// 3) Vyprázdnit košík
$cart->clear();

// $order->id obsahuje číslo nové objednávky
// $order->totalPrice obsahuje celkovou cenu včetně dopravy a platby

?>