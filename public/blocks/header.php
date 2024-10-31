<header>

  <div class="container top-menu">
      <div class="nav">
         <a href="http://localhost/shop/">Главное</a>
         <a href="http://localhost/shop/?url=contact/index">Контакты</a>
         <a href="http://localhost/shop/?url=contact/about">Про Компанию</a>
      </div>
    <div class="tel">
     <i class="fa-solid fa-phone"></i> +99899 722-54-38
    </div>
  </div>


  <div class="container middle">
    <div class="logo">
      <img src="public/img/logo.svg" alt="logo">
      <span>Мы знаем Что Вы Хотите</span>
    </div>

    <div class="auth-cheakaout">
    <a href="http://localhost/shop/?url=basket">
      
    <?php 
      require_once 'app/models/Basketmodel.php';
      $Basketmodel = new Basketmodel();
    ?>

    
    <button class="bnt basket"> Корзина <b>(<?= $Basketmodel->countItem()?>)</b></button></a>
  <br>
  <?php if (!isset($_COOKIE['login']) || $_COOKIE['login'] == ''): ?>
    <a href="http://localhost/shop/?url=user/auth"> <button class="bnt auth">Войти<button></a>
    <a href="http://localhost/shop/?url=user/reg"> <button class="bnt">Регестрация<button>
    </a>
      <?php else: ?>
    <a href="http://localhost/shop/?url=user/dashboard"> <button class="bnt dashboard">Кабинет Пользователя<button>
    </a>
    <?php  endif; ?>

  </div>
  </div>  

     





  <div class="container menu">
    <ul>
      <li><a href="http://localhost/shop/?url=categories">
      Все товары
      </a></li>
      <li><a href="http://localhost/shop/?url=categories/shoes">
      Обуви
      </a></li>
      <li><a href="http://localhost/shop/?url=categories/hats">
      Кепки
      </a></li>
      <li><a href="http://localhost/shop/?url=categories/shirts">
      Футболки
      </a></li>
      <li><a href="http://localhost/shop/?url=categories/watches">
      Часы
      </a></li>
    </ul>
  </div>


</header>