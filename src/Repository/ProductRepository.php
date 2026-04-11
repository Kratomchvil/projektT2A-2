<?php
class ProductRepository {
  public function getByCategory($categoryId) {
    // Vrátí všechny produkty v dané kategorii (podle ID)
  }

  public function getByCategorySlug($categorySlug) {
    // Vrátí všechny produkty v dané kategorii (podle slugu)
  }

  public function getBySlug($slug) {
    // Vrátí konkrétní produkt podle slugu
  }

  public function getImages($productId) {
    // Vrátí pole obrázků pro daný produkt
  }

  public function getParameters($productId) {
    // Vrátí pole parametrů pro daný produkt
  }
}  
?>