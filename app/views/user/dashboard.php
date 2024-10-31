<!DOCTYPE html>
<html lang="ru">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <meta name="description" content="Главная страница Интернет магазина">
  <meta name="keywords" content="Покупки,Интернет магазин, главное страница,новый модели,товары,интересный новинки,акций,скидки">
  <title></title>
  <link rel="stylesheet" href="public/css/main.css" charset="utf-8">
  <link rel="stylesheet" href="public/css/product.css" charset="utf-8">
  <link rel="stylesheet" href="public/css/user.css" charset="utf-8">
</head>
<body>


  <?php require 'public/blocks/header.php'; ?>




<div class="container main">
     <h1>Кабинет пользователя</h1><br>
     <div class="info">
      <p>Привет, <b><?= $data['name'] ?></b></p>
      <form action="http://localhost/shop/?url=user/dashboard" method="post">
        <input type="hidden" name="exit_bnt">
          <button class="bnt" type="submit">Выйти</button>
      </form>
     </div>
        
    </div>







    <?php require  'public/blocks/footer.php' ?>



<script src="https://kit.fontawesome.com/9995ed50bd.js" crossorigin="anonymous"></script>

</body>
</html>