<?php
/* kadai12_1.php
SK1A 20 陳鏡宇*/

$apiURL ="https://click.ecc.ac.jp/ecc/sakakura/ajax/selector-list.php";
$response = file_get_contents( $apiURL);
$response = mb_convert_encoding($response,'UTF-8','ASCII,JIS,UTF-8,EUC-JP,SJIS-WIN');
$json= json_decode($response, true);

?>
<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <link href="asset/styles/tailwind.min.css" rel="stylesheet">
  <!-- Google Matarial icon -->
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

  <title>php1 - kadai12_1</title>
  <style>
    html{scroll-behavior: smooth;}
  </style>
</head>
<body>
<div class="wrapper w-screen h-screen box-border">

<header class="bg-green-500">
  <div class="container mx-auto py-5">
    <h1 class="text-l text-white mb-6">サーバーサイドスクリプト演習１</h1>
    <h2 class="text-white text-3xl">JSONデータを扱う</h2>
  </div><!--/.container-->
</header>

<main>
  <div class="container flex justify-between items-start mx-auto my-20">
    <!-- w-full h-full mx-auto py-20 -->
    <div class="w-2/12">
      <nav class="p-1 border border-green-400 transition-transform duration-500 delay-300">
        <ul class="bg-green-400">
           <!----ここからセレクタ詳細データを表示------->
        <?php foreach($json["categories"] as $c ): ?>
          <li><a href="#<?= $c?>" class="block w-full text-white text-sm p-2 hover:bg-green-600"><?= $c ?></a></li>
        <?php endforeach ?>
        </ul>
      </nav>
    </div>
    

    <div id="category-wrap" class="w-9/12">

    <?php foreach($json ["selecters"] as $s): ?>
      <section id="<?= $s["category"]?>" class="mb-20">
        <h2 class="text-2xl border-l-4 border-green-300 px-4 py-2 mb-5"><?= $s["category"]?></h2>
        <dl class="ml-5">
        <?php foreach($s["list"] as $l): ?>
          <dt class="text-xl border-b-4 border-green-300 py-2 mb-10"><?= $l["type"]?></dt>
          <dd class="text-md mb-20"><?= $l["range"]?></dd>
        <?php endforeach ?>
        </dl>
    <?php endforeach ?>
      </section>
    
    </div>

  </div><!--/.container-->
</main>

</div><!--/.wrapper-->
<script src="asset/scripts/kadai11.js"></script>
</body>
</html>