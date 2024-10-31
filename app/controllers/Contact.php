<?php   

class Contact extends Controller {

  public function index(){

    $data = [];


    if(isset($_POST['name'])){
      $mail = $this->model('Contactmodel');
      $mail->setData($_POST['name'],$_POST['email'],$_POST['age'],$_POST['message']);

      $isvalid =$mail->validForm();
      if($isvalid == "Верно")
        $data['message']=$mail->mail();
      else 
        $data['message']=$isvalid;
    }

    $this->view("contact/index",$data);

  }

  public function about(){
      $this->view("contact/about");
  }


}