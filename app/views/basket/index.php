<!DOCTYPE html>
<html lang="ru">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <meta name="description" content="Главная страница Интернет магазина">
  <meta name="keywords" content="Покупки,Интернет магазин, главное страница,новый модели,товары,интересный новинки,акций,скидки">
  <title>Корзина Товаров</title>
  <link rel="stylesheet" href="public/css/main.css" charset="utf-8">
  <link rel="stylesheet" href="public/css/basket.css" charset="utf-8">
  <link rel="stylesheet" href="public/css/click.css" charset="utf-8">
</head>
<body>

<?php require 'public/blocks/header.php' ?>

<div class="container main">
    <h1>Корзина Товаров</h1>

    <?php if(empty($data['products'])): ?>
      <p><?= $data['empty'] ?></p>
    <?php else: ?>


        <div class="products">
          <?php 
          $sum = 0;

          // Если в корзине один продукт, он не будет массивом
          if(isset($data['products']['id'])) {
              $product = $data['products'];
              $sum += $product['price'];
          ?>
              <div class="row">
                <img src="public/img/<?= htmlspecialchars($product['img']) ?>" alt="<?= htmlspecialchars($product['title']) ?>">
                <h4> <?= htmlspecialchars($product['title']) ?></h4>
                <span><?= htmlspecialchars($product['title']) ?> - <?= htmlspecialchars($product['price']) ?> рублей</span>
              </div>
          <?php 
          } else {
            // Если несколько продуктов в корзине
            foreach ($data['products'] as $product):
              $sum += $product['price'];
          ?>
              <div class="row">
                <img src="public/img/<?= htmlspecialchars($product['img']) ?>" alt="<?= htmlspecialchars($product['title']) ?>">
                <h4> <?= htmlspecialchars($product['title']) ?></h4>
                <span> <?= htmlspecialchars($product['price']) ?> рублей</span>
              </div>
          <?php endforeach; } ?>
          
  






        <!--  <button class="bnt">Преобрести (<b><?= $sum ?> рублей</b>)</button> --!>
        
                <?php
          //Секретный ключ интернет-магазина
    $key = "7071527638655b4637457b635c7253375851503767435642446644";
 
  $fields = array();
 
  // Добавление полей формы в ассоциативный массив
  $fields["WMI_MERCHANT_ID"]    = "174330250327";
  $fields["WMI_PAYMENT_AMOUNT"] = $sum;
  $fields["WMI_CURRENCY_ID"]    = "643";
  $fields["WMI_PAYMENT_NO"]     = time();
  $fields["WMI_DESCRIPTION"]    = "BASE64:".base64_encode(" Покупка товаров в сайте Bek ");
  $fields["WMI_EXPIRED_DATE"]   =  date('Y-m-d')."T23:59:59";
  $fields["WMI_SUCCESS_URL"]    = "http://localhost/shop/?url=/success";
  $fields["WMI_FAIL_URL"]       = "http://localhost/shop/?url=/fail";
  $fields["id_of_tovar"]       = "ID-2212231"; 
  //Если требуется задать только определенные способы оплаты, раскоментируйте данную строку и перечислите требуемые способы оплаты.
  // $fields["WMI_PTENABLED"]      = array("UnistreamRUB", "SberbankRUB", "RussianPostRUB");
 
  //Сортировка значений внутри полей
  foreach($fields as $name => $val)
  {
      if(is_array($val))
      {
          usort($val, "strcasecmp");
          $fields[$name] = $val;
      }
  }
 
  // Формирование сообщения, путем объединения значений формы,
  // отсортированных по именам ключей в порядке возрастания.
  uksort($fields, "strcasecmp");
  $fieldValues = "";
 
  foreach($fields as $value)
  {
      if(is_array($value))
          foreach($value as $v)
          {
              //Конвертация из текущей кодировки (UTF-8)
              //необходима только если кодировка магазина отлична от Windows-1251
              $v = iconv("utf-8", "windows-1251", $v);
              $fieldValues .= $v;
          }
      else
      {
          //Конвертация из текущей кодировки (UTF-8)
          //необходима только если кодировка магазина отлична от Windows-1251
          $value = iconv("utf-8", "windows-1251", $value);
          $fieldValues .= $value;
      }
  }
 
  // Формирование значения параметра WMI_SIGNATURE, путем
  // вычисления отпечатка, сформированного выше сообщения,
  // по алгоритму MD5 и представление его в Base64
 
  $signature = base64_encode(pack("H*", md5($fieldValues . $key)));
 
  //Добавление параметра WMI_SIGNATURE в словарь параметров формы
 
  $fields["WMI_SIGNATURE"] = $signature;
 
  // Формирование HTML-кода платежной формы
 
  print "<form action='https://wl.walletone.com/checkout/checkout/Index' method='POST'>";
 
  foreach($fields as $key => $val)
  {
      if(is_array($val))
          foreach($val as $value)
          {
              print "<input type='hidden' name='$key' value='$value'>";
          }
      else
          print "<input type='hidden' name='$key' value='$val'>";
  }
 
  print "<button type='submit' class='bnt'>Приоребсти (<b>".$sum." рублей</b>)</button></form>";



?>





















        </div>
    <?php endif; ?>
</div>

<?php require 'public/blocks/footer.php' ?>

<script src="https://kit.fontawesome.com/9995ed50bd.js" crossorigin="anonymous"></script>

</body>
</html>
