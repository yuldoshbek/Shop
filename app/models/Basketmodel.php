<?php 

session_start();

  class Basketmodel {
    private $session_name = 'cart';

    public function isSetSession(){
      return isset($_SESSION[$this->session_name]);
    }

    public function deletSession(){
      unset($_SESSION[$this->session_name]);
    }
     
    public function getSession(){
      return $_SESSION[$this->session_name];
    }

    public function addToCard($itemId){
      if(!$this->isSetSession())
      $_SESSION[$this->session_name]=$itemId;
    else{
        $items= explode(",",$_SESSION[$this->session_name]);
        $itemExt = false;
        foreach($items as $el ){
          if($el==$itemId)
            $itemExt = true;
        }

        if(!$itemExt)
      $_SESSION[$this->session_name]=$_SESSION[$this->session_name].','. $itemId;
    }
    }
    public function  countItem(){
      if(!$this->isSetSession())
      return 0;
    else{
      $items = explode(",",$_SESSION[$this->session_name]);
      return count($items);
    }
    }


  }
