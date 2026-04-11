<?php
class ProductImageDTO {
    private $id;
    private $productId;
    private $imageUrl;

    public function __construct($id, $productId, $imageUrl) {
        $this->id = $id;
        $this->productId = $productId;
        $this->imageUrl = $imageUrl;
    }

    public function getId() {
        return $this->id;
    }

    public function getProductId() {
        return $this->productId;
    }

    public function getImageUrl() {
        return $this->imageUrl;
    }
}
?>