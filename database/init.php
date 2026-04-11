<?php
$categories = $categoryRepo->getAll();

// Doporučené produkty (pro hlavní stránku)
$featured = $productRepo->getFeatured(limit: 6);

// Produkty v kategorii (podle ID nebo slugu)
$products = $productRepo->getByCategory(1);
$products = $productRepo->getByCategorySlug('');

// Konkrétní produkt podle slugu (pro detail produktu)
$product = $productRepo->getBySlug('');

// Obrázky a parametry produktu (pro detail)
$images = $productRepo->getImages($product->id);
$params = $productRepo->getParameters($product->id);

// Rozdělení parametrů na volitelné (select) a informační (info)
$selectableParams = array_filter($params, fn(ProductParameterDTO $p) => $p->isSelectable());
$infoParams = array_filter($params, fn(ProductParameterDTO $p) => !$p->isSelectable());

// Zjištění, zda produkt vyžaduje výběr varianty
$product->hasVariants; // true pokud má alespoň jeden parametr typu 'select'

// Vyhledávání
$results = $productRepo->search('bici');

?>