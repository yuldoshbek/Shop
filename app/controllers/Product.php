<?php 
 class Product extends Controller {
    
  public function index($id = null) {
      if ($id === null) {
          echo "Продукт не найден.";
          return;
      }
      $product = $this->model('Products');
      $this->view('product/index', $product->getOneProduct($id));
  }
  
}
