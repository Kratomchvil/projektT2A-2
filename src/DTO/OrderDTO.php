<?php
class OrderDTO {
    private $id;
    private $customerId;
    private $items;

    public function __construct($id, $customerId, $items) {
        $this->id = $id;
        $this->customerId = $customerId;
        $this->items = $items;
    }

    public function getId() {
        return $this->id;
    }

    public function getCustomerId() {
        return $this->customerId;
    }

    public function getItems() {
        return $this->items;
    }
}
?>