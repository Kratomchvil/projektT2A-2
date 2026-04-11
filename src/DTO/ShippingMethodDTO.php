<?php
class ShippingMethodDTO {
    private $id;
    private $name;
    private $cost;

    public function __construct($id, $name, $cost) {
        $this->id = $id;
        $this->name = $name;
        $this->cost = $cost;
    }

    public function getId() {
        return $this->id;
    }

    public function getName() {
        return $this->name;
    }

    public function getCost() {
        return $this->cost;
    }
}

?>