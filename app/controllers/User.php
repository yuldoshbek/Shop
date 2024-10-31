<?php 
  class User extends Controller{
    public function reg(){
      $data = [];

      if(isset($_POST['name'])){
        $user = $this->model('Usermodel');
        $user->setData($_POST['name'],$_POST['email'],$_POST['pass'],$_POST['re_pass']);
  
        $isvalid =$user->validForm();
        if($isvalid == "Верно")
          $user->addUser();
        else 
          $data['message']=$isvalid;
      }

      $this->view('user/reg',$data);

    }

    public function dashboard(){
      $user = $this->model('Usermodel');
      if(isset($_POST['exit_bnt'])){
          $user->logOut(); 
          exit();     
        }
     
      $this->view('user/dashboard',$user->getuser());
    }

    public function auth(){
      $data=[];
      if(isset($_POST['email'])){
        $user = $this->model('Usermodel');
        $data['message'] = $user->auth($_POST['email'],$_POST['pass']);
            
      }

      $this->view('user/auth',$data);
    }

  }