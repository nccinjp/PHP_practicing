<?php
/* kadai08_1.php
SK1A 20 陳鏡宇*/
//1
session_start();

//2
$errmessage = "";
$old["product_no"] = "";
$old["price"] = "";
$old["pname"] = "";

//セッションデータがあれば、上記変数に保存する
if(isset($_SESSION["old"])){
  $old = $_SESSION["old"];
  }
if(isset($_SESSION["errmessage"])){
  $errmessage = $_SESSION["errmessage"];
  }
//3 セッションデータのクリア
$_SESSION = [];

?>
<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <!-- link -->
  <link href="asset/styles/tailwind.min.css" rel="stylesheet">
  
  <title>php1 - kadai08_1</title>
</head>
<body class="bg-gray-50">
<div class="wrapper box-border">

<header class="bg-green-500">
  <div class="container mx-auto py-5">
    <h1 class="text-l text-white mb-6">サーバーサイドスクリプト演習１</h1>
    <h2 class="text-3xl text-white">データベース処理</h2>
  </div><!--/.container-->
</header>

<main>
  <div class="container mx-auto py-20">

    <div class="mb-10">
      <h3 class="text-xl border-b-2 border-green-400 pb-2 mb-5">商品の新規登録</h3>

      <!--商品登録に失敗した時のHTML-->
      <p class="text-red-600"><?= $errmessage ?></p>

    </div>

    <div class="product-wrap px-5 py-10 shadow-md">
      <h4 class="font-bold mb-5">商品情報</h4>

      <form action="kadai08_2.php" method="POST">
        <div class="flex mb-10">
          <div class="flex-grow mr-10">
            <div class="mb-5">
              <div class="flex flex-col w-6/12">
                <label for="product_no" class="text-gray-500 text-left uppercase tracking-wider">code</label>
                <input 
                  type="text" 
                  name="product_no" 
                  id="product_no" 
                  class="px-2 py-2 border rounded-md outline-none focus:border-green-200" 
                  value="<?= $old["product_no"] ?>"
                >
              </div>
            </div>

            <div class="flex justify-between mb-5">
              <div class="flex flex-col flex-grow mr-10">
                <label for="category" class="text-gray-500 text-left uppercase tracking-wider">category</label>
                <select name="category" id="category" class="px-2 py-2 border  rounded-md outline-none focus:border-green-200">
                  <option 
                    value="ピザ"
                  >ピザ</option>
                  <option 
                    value="ドリンク"
                  >ドリンク</option>
                </select>
              </div>
              <div class="flex flex-col w-4/12">
                <label for="price" class="text-gray-500 text-left uppercase tracking-wider">price</label>
                <input 
                  type="text" 
                  name="price" 
                  id="price" 
                  class="px-2 py-2 border rounded-md outline-none focus:border-green-200" 
                  value="<?= $old["price"] ?>"
                >
              </div>
            </div>

            <div class="flex flex-col">
              <label for="name" class="text-gray-500 text-left uppercase tracking-wider">name</label>
              <input 
                type="text" 
                name="pname" 
                id="name" 
                class="px-2 py-2 border rounded-md outline-none focus:border-green-200" 
                value="<?= $old["pname"] ?>"
              >
            </div>
          </div>

          <div class="flex flex-col items-stretch flex-grow">
            <label for="description" class="text-gray-500 text-left uppercase tracking-wider">description</label>
            <textarea name="description" id="description" class="w-full h-full text-lg px-2 bg-gray-100 py-2 border rounded-md" disabled></textarea>
          </div>
        </div>

        <div class="flex justify-end">
          <a href="kadai06_1.php" class="text-white text-center leading-10 bg-gray-600 px-10 mr-5 hover:bg-gray-500 rounded-md">一覧へ戻る</a>
          <button type="submit" class="text-white text-center leading-10 bg-pink-600 px-10 hover:bg-pink-500 rounded-md">登録する</button>
        </div>
      </form>

    </div><!--/.product-wrap-->

  </div><!--/.container-->
</main>

</div><!--/.wrapper-->
</body>
</html>