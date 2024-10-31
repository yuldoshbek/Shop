<?php 
  require 'DB.php'; 

class UserModel {
  private $name;
  private $email;
  private $pass;
  private $re_pass;

    private $_db = null;

  public function __construct()
    {
        $this->_db = DB::getInstance();
    }

  public function  setData($name
  ,$email,$pass,$re_pass)
  {
    $this->name=$name;
    $this->email=$email;
    $this->pass=$pass;
    $this->re_pass=$re_pass;

  }
  public function validForm(){

    if(strlen($this->name) <3)
        return "Имя сишком коротокая";
       else if(strlen($this->email)<3)
        return "Email сишком коротокая";
        else if( strlen($this->pass) <3 )
          return "не менее 3 символов";
          else if($this->pass != $this->re_pass)
            return "пароли не совподает";
            else  
              return "Верно";

    }


    public function addUser(){
      $sql = 'INSERT INTO users(name,email,pass) VALUES (:name,:email,:pass)';
      $qurey = $this->_db->prepare($sql);
      $pass=password_hash($this->pass,PASSWORD_DEFAULT);
      $qurey->execute(['name'=>$this->name,'email'=>$this->email,'pass'=>$pass]);

      $this->setAuth($this->email);

    }

     public function getuser(){
      $email = $_COOKIE['login'];
      $result = $this->_db->query("SELECT * FROM `users` WHERE `email`= '$email' ");
      return $result->fetch(PDO::FETCH_ASSOC); 
     }

    public function logOut(){
      setcookie('login',$this->email,time() -3600,'/');
      unset($_COOKIE['login']);
      header('Location: http://localhost/shop/?url=user/auth');
    }

    public function auth($email, $pass) {
      // Выполнение запроса
      $query = $this->_db->prepare("SELECT * FROM `users` WHERE `email` = :email");
      $query->execute([':email' => $email]);
  
      // Получение результата
      $user = $query->fetch(PDO::FETCH_ASSOC);
  
      // Проверка на существование пользователя
      if (!$user) {
          return 'Пользователь с таким email не существует';
      }
  
      // Проверка пароля
      if (password_verify($pass, $user['pass'])) {
        $this->setAuth($email);
      } else {
          return 'Пароль неверный';
      }
  }


  public function setAuth($email){
    setcookie('login',$email,time() +3600,'/');
        header('Location: http://localhost/shop/?url=user/dashboard');
  }
  

}
