<!DOCTYPE html>
<html lang="ru">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <meta name="description" content="Главная страница Интернет магазина">
  <meta name="keywords" content="Покупки,Интернет магазин, главное страница,новый модели,товары,интересный новинки,акций,скидки">
  <title>Авторизоватся</title>
  <link rel="stylesheet" href="public/css/main.css" charset="utf-8">
  <link rel="stylesheet" href="public/css/form.css" charset="utf-8">
</head>
<body>


<?php require  'public/blocks/header.php' ?>



<div class="container main">
        <h1>Авторизоватся</h1>

        <p class="write">Здесь вы можете авторизоватся на сайте</p>

        <form action="http://localhost/shop/?url=user/auth" method="post" class="form-controll">

        
          <input type="email" name="email" id="email" placeholder="ведите email"   value="<?= isset($_POST['email']) ? htmlspecialchars($_POST['email']) : '' ?>">
          <input type="password" name="pass" placeholder="ведите пароли"  value="<?= isset($_POST['pass']) ? htmlspecialchars($_POST['pass']) : '' ?>">
         
          

          <div class="error">
              <?= isset($data['message']) ? htmlspecialchars($data['message']) : '' ?>
        </div>


        <button type="submit" class="bnt" id="send">войти</button>



        </form>
          
    </div>





<?php require  'public/blocks/footer.php' ?>





<script src="https://kit.fontawesome.com/9995ed50bd.js" crossorigin="anonymous"></script>

</body>
</html>