<?php
class ProductParameterDTO {
    private $id;
    private $productId;
    private $name;
    private $value;

    public function __construct($id, $productId, $name, $value) {
        $this->id = $id;
        $this->productId = $productId;
        $this->name = $name;
        $this->value = $value;
    }

    public function getId() {
        return $this->id;
    }

    public function getProductId() {
        return $this->productId;
    }

    public function getName() {
        return $this->name;
    }

    public function getValue() {
        return $this->value;
    }
}

?>