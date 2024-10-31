<?php  

class App {

  // Значения по умолчанию
  protected $controller = 'Home';
  protected $method = 'index';
  protected $params = [];

  public function __construct() {
      $url = $this->parseUrl();

      // Проверка на наличие контроллера
      if ($url && file_exists('app/controllers/' . ucfirst($url[0]) . '.php')) {
          $this->controller = ucfirst($url[0]);
          unset($url[0]);
      }

      // Подключаем файл контроллера
      require_once 'app/controllers/' . $this->controller . '.php';

      // Создаем экземпляр контроллера
      $this->controller = new $this->controller;

      // Проверка на метод контроллера
      if (isset($url[1])) {
          if (method_exists($this->controller, $url[1])) {
              $this->method = $url[1];
              unset($url[1]);
          }
      }

      // Параметры для метода контроллера
      $this->params = $url ? array_values($url) : [];

      // Вызов метода контроллера с параметрами
      //call_user_func_array([$this->controller, $this->method], $this->params);
        // Вызов метода контроллера с параметрами
            if (count($this->params) > 0) {
            call_user_func_array([$this->controller, $this->method], $this->params);
        } else {
            call_user_func([$this->controller, $this->method]);
            }


  }

  public function parseUrl() {
      if (isset($_GET['url'])) {
          return explode('/', filter_var(rtrim($_GET['url'], '/'), FILTER_SANITIZE_URL));
      }
      return []; // Возвращаем пустой массив, если URL не задан
  }
}




