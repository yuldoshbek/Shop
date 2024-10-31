<?php 

class home extends Controller{

  //главное страница
  public function index (){
     $products = $this->model('Products');


    $this->view('home/index',$products->getProductsLimit("id",5));
  }


  

}