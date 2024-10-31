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
</head>
<body>


<?php require  'public/blocks/header.php' ?>



<div class="container main">
        <h1><?= $data['title'] ?></h1>
        <div class="products">
            <?php for($i = 0; $i < count($data['products']); $i++): ?>
            <div class="product">
            <div class="image">
                    <img src="public/img/<?= $data['products'][$i]['img'] ?>" alt="Товар">
                </div>
                <h3><?=$data['products'][$i]['title']?></h3>
                <p><?=$data['products'][$i]['anons']?></p>
                <a href="http://localhost/shop/?url=product/index/<?= $data['products'][$i]['id'] ?>"><button class="bnt">Детальнее</button></a>
            </div>
            <?php endfor; ?>
        </div>
    </div>

 
   


<?php require  'public/blocks/footer.php' ?>





<script src="https://kit.fontawesome.com/9995ed50bd.js" crossorigin="anonymous"></script>

</body>
</html>