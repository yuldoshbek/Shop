<?php 

class Controller {
    
  protected function model($models) {
      // Подключаем файл модели
      $modelPath = 'app/models/' . $models . '.php';
      
      if (file_exists($modelPath)) {
          require_once $modelPath;
          return new $models();  // Возвращаем экземпляр модели
      } else {
          throw new Exception("Model file '$modelPath' not found.");
      }
  }


      //оброшения к view
      protected function view($view,$data=[]){
        require_once 'app/views/' . $view . '.php';
      }


}
