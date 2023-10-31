<?php
/**
 * ファイル名；kadai02_2.php
 * 陳鏡宇
 * 20
 */


require_once "./kadai02_resource.php";
$getdata = filter_input_array(INPUT_GET,$filter_array);

$id = $getdata["product_id"];
setcookie("php1_kadai02[{$id}]", $id, time() + ( 60 * 1));

if($getdata == NULL){
  header("Location:kadai02_1.php");
}

if(in_array(NULL,$getdata,true) || in_array(false,$getdata,true)){
  exit("不正データが検出されました。");
}


?>

<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <!-- link -->
  <link href="asset/styles/tailwind.min.css" rel="stylesheet">
  
  <title>php1 - kadai02_2</title>
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
    <h2 class="text-xl border-b-2 border-pink-400 pb-2 mb-10">取り扱い商品の詳細</h2>
    <div class="product-wrap">
      <div class="flex flex-wrap p-5 mb-10 border rounded-md">
          <figure class="w-1/2"><img src="asset/images/<?=$products[$id]["large"]?>" class="rounded-md"></figure>
          <div class="flex flex-col w-1/2 px-10">
            <h3 class="text-2xl font-bold">
              <?=$products[$id]["name"]?>
            </h3>
            <p class="flex-grow text-lg my-20">
              <?=$products[$id]["description"]?>
            </p>
            <p class="text-2xl text-pink-400 font-bold">
              <?=$products[$id]["price"]?>
            </p>
          </div>
      </div>
      <div class="flex justify-end">
        <a href="kadai02_1.php" class="block w-40 h-10 text-white text-center leading-10 bg-gray-500 hover:bg-gray-400 rounded-md">一覧に戻る</a>
      </div>
    </div>

  </div><!--/.container-->
</main>

</div><!--/.wrapper-->
</body>
</html>