<!DOCTYPE html>
<html lang="ru">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <meta name="description" content="Главная страница Интернет магазина">
  <meta name="keywords" content="Покупки,Интернет магазин, главное страница,новый модели,товары,интересный новинки,акций,скидки">
  <title><?= $data['title'] ?></title>
  <link rel="stylesheet" href="public/css/main.css" charset="utf-8">
  <link rel="stylesheet" href="public/css/product.css" charset="utf-8">
</head>
<body>


<?php require  'public/blocks/header.php' ?>



    <div class="container main">
      <a href="http://localhost/shop/?url=categories/<?= $data['category'] ?>">Назад</a>
        <h1><?= $data['title'] ?></h1>
        <div class="intro">
          <div>
             <img src="public/img/<?= $data['img'] ?>" alt="<?= $data['title'] ?>">
          </div>
       <div>
        <p><?= $data['anons'] ?></p><br>
        <p><?= $data['text'] ?></p>
       </div>
        <div>

          <form action="http://localhost/shop/?url=basket" method="post">
                    <input type="hidden" name="item_id" value="<?=$data['id']?>">
                    <button class="bnt">Купить за <?=$data['price']?> рублей</button>
                </form>



        </div>
          
        </div>
        
    </div>







    <?php require  'public/blocks/footer.php' ?>



<script src="https://kit.fontawesome.com/9995ed50bd.js" crossorigin="anonymous"></script>

</body>
</html>