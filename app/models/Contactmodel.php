<?php 
class Contactmodel {
  private $name;
  private $email;
  private $age;
  private $message;

  public function  setData($name
  ,$email,$age,$message)
  {
    $this->name=$name;
    $this->email=$email;
    $this->age=$age;
    $this->message=$message;

  }
  public function validForm(){

    if(strlen($this->name) <3)
        return "Имя сишком коротокая";
       else if(strlen($this->email)<3)
        return "Email сишком коротокая";
        else if(!is_numeric($this->age) || $this->age <= 0 || $this->age >90)
          return "Возрост не веден";
          else if(strlen($this->message)<15)
            return "Комнетарий силшком коротокая";
            else  
              return "Верно";
    }
    

  public function mail(){
    $to = "yoldoshbekhoja@inbox.ru";
    $message = "Имя:". $this->name . ".Возраст" . $this->age . ".Собшения" . $this->message;
    $subject ="=?utf-8?B?".base64_encode("Собшения с нашего сайта")."?=";
    $headers = "From: $this->email\r\nReply-to: $this->email\r\nContent-type: text/html; charset=utf-8\r\n";

    $success = mail($to,$subject, $message,$headers);

    if(!$success)
        return "Собшения не оправлена";
      else 
      return true;
  }


}