<?php
$shippingRepo = new ShippingMethodRepository();
$paymentRepo = new PaymentMethodRepository();

// Všechny způsoby dopravy (pro formulář s výběrem)
$shippingMethods = $shippingRepo->getAll();

// Všechny způsoby platby
$paymentMethods = $paymentRepo->getAll();

// Konkrétní způsob podle ID
$shipping = $shippingRepo->getById(2); // Zásilkovna
$shipping->name;         // "Zásilkovna"
$shipping->price;        // 69.0
$shipping->deliveryDays; // "2–3 pracovní dny"
$shipping->isFree();     // false
?>