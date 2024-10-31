<?php 

class Basket extends Controller {
  public function index() {
      $data = [];
      $cart = $this->model('BasketModel');

      if (isset($_POST['item_id'])) {
          $cart->addToCard($_POST['item_id']);
      }

      if (!$cart->isSetSession()) {
          $data['empty'] = 'Пустая корзина';
      } else {
          $products = $this->model('Products');
          $productIds = $cart->getSession();
          $data['products'] = $products->getProductsCart($productIds);
      }

      $this->view('basket/index', $data);
  }
}








