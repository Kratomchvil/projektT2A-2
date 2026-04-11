<?php
class Database {
  private $pdo;

  public function __construct() {
    $this->pdo = new PDO('mysql:host=localhost;dbname=eshop;charset=utf8', 'root', '');
    $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  }
?>