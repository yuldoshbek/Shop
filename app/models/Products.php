<?php
  require 'DB.php'; 

  class Products {
    private $_db = null;

    public function __construct()
    {
      $this->_db = DB::getInstance();
    }

    public function getProducts(){
      $result = $this->_db->query("SELECT * FROM `products` ORDER BY `id` DESC");

      return $result->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getProductsLimit($order,$limit){
      $result = $this->_db->query("SELECT * FROM `products` ORDER BY $order DESC LIMIT $limit");

      return $result->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getProductsCategery($category){
      $result = $this->_db->query("SELECT * FROM `products` WHERE `category`='$category' ORDER BY `id` DESC");

      return $result->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getOneProduct($id){
      $result = $this->_db->query("SELECT * FROM `products` WHERE `id`= '$id' ");
      return $result->fetch(PDO::FETCH_ASSOC); 
    }
    
    public function getProductsCart($productIds) {
      // Убедимся, что $productIds является массивом
      if (is_string($productIds)) {
          $productIds = explode(',', $productIds); // Преобразуем строку в массив
      }

      // Теперь $productIds точно является массивом, применяем array_map
      $ids = implode(',', array_map('intval', $productIds));  // Преобразуем в строку для SQL-запроса
      $sql = "SELECT * FROM products WHERE id IN ($ids)";
      $stmt = $this->_db->query($sql);  // Выполняем запрос к базе данных
      return $stmt->fetchAll(PDO::FETCH_ASSOC);  // Возвращаем все товары
  }
  
  
    
  }