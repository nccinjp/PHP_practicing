<?php
/**
 * ファイル名；kadai02_1.php
 * SK1A  陳 鏡宇 
 * 20   
 * */

 //配列ファイルを読み込む
require_once "./kadai02_resource.php";

$browsed = [];
if(isset($_COOKIE["php1_kadai02"])){
  $browsed = $_COOKIE["php1_kadai02"];
}

?>
<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <!-- link -->
  <link href="asset/styles/tailwind.min.css" rel="stylesheet">
  
  <title>php1 - kadai02_1</title>
</head>
<body class="bg-gray-50">
<div class="wrapper box-border">

<header class="bg-green-500">
  <div class="container mx-auto py-5">
    <h1 class="text-l text-white mb-6">サーバーサイドスクリプト演習１</h1>
    <h2 class="text-3xl text-white">クッキー</h2>
  </div><!--/.container-->
</header>

<main>
  <div class="container mx-auto py-20">
    <h2 class="text-xl border-b-2 border-pink-400 pb-2 mb-10">取り扱いクッキー</h2>
    <div class="product-wrap flex justify-evenly flex-wrap mb-20">

    <?php foreach($products as $index => $p): ?>
      
      <div class="flex-shrink-0 w-1/6 h-72 bg-gray-50 border rounded-md shadow hover:shadow-lg mr-20 mb-20">
      <a href="kadai02_2.php?product_id=<?= $index ?>" class="flex flex-col w-full h-full p-2">
          <h3 class="order-2 flex-grow font-bold my-5"><?=$p["name"]?></h3>
          <figure class="order-1 h-3/5 overflow-hidden"><img src="asset/images/<?= $p["small"]?>"></figure>
          <p class="order-3 text-pink-400 text-sm">¥<?= $p["price"]?></p>
        </a>
      </div>

    <?php endforeach?>
    </div>

    <h2 class="text-xl border-b-2 border-pink-400 pb-2 mb-10">閲覧したクッキー</h2>
    <div class="product-wrap w-full flex overflow-x-scroll mb-20">
    
    <?php /******ここからクッキー値に**/
       foreach($browsed as $b): ?>

      <div class="flex-shrink-0 w-1/6 h-72 bg-gray-50 border rounded-md shadow hover:shadow-lg mr-20 mb-20">
        <a href="kadai02_2.php" class="flex flex-col w-full h-full p-2">
          <h3 class="order-2 flex-grow font-bold my-5"><?=$products[$b]["name"]?></h3>
          <figure class="order-1 h-3/5 overflow-hidden"><img src="asset/images/<?=$products[$b]["small"]?>"></figure>
          <p class="order-3 text-pink-400 text-sm">¥<?=$products[$b]["price"]?></p>
        </a>
      </div>
    <?php endforeach ?>
    </div>

  </div><!--/.container-->
</main>

</div><!--/.wrapper-->
</body>
</html>