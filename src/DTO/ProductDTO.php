<?php
class ProductDTO {
    private $id;
    private $name;
    private $price;
    private $categoryId;

    public function __construct($id, $name, $price, $categoryId) {
        $this->id = $id;
        $this->name = $name;
        $this->price = $price;
        $this->categoryId = $categoryId;
    }

    public function getId() {
        return $this->id;
    }

    public function getName() {
        return $this->name;
    }

    public function getPrice() {
        return $this->price;
    }

    public function getCategoryId() {
        return $this->categoryId;
    }
}
?>