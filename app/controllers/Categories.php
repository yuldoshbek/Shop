<?php 
  class Categories extends Controller {

    public function index(){
      $products = $this->model('Products');
      $data  =  ['products' => $products->getProducts(),'title' =>'Все Категория  товар на сайте'];
      $this->view('categories/index',$data);
    }

    
    public function shoes(){
      $products = $this->model('Products');
      $data  =  ['products' => $products->getProductsCategery('shoes'),'title' =>'Категория  Обувь'];
      $this->view('categories/index',$data);
    }
    
   





    public function hats(){
      $products = $this->model('Products');
      $data  =  ['products' => $products->getProductsCategery('hats'),'title' =>'Категория Шапки'];
      $this->view('categories/index',$data);
    }

    public function shirts(){
      $products = $this->model('Products');
      $data  =  ['products' => $products->getProductsCategery('shirts'),'title' =>'Категория  футболки'];
      $this->view('categories/index',$data);
    }

    public function watches(){
      $products = $this->model('Products');
      $data  =  ['products' => $products->getProductsCategery('watches'),'title' =>'Категория  часы'];
      $this->view('categories/index',$data);
    }
    

    

  }