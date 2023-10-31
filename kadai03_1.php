<?php
/**
 * ファイル名；kadai03_1.php
 * @author 陳鏡宇 20番
 * @package SK1A
 **/
require_once "./kadai03_resource.php";

//セッションSTART
session_start();

//セッションデータが存在すれば、$oldに代入
$old["comment"]="";
if(isset($_SESSION["comment"])){
  $old["comment"]=$_SESSION["comment"];  
}

?>
<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <link href="asset/styles/tailwind.min.css" rel="stylesheet">
  <title>php1 - kadai03_1</title>
</head>
<body>
<div class="wrapper w-screen h-screen">

<header class="bg-green-500">
  <div class="container mx-auto py-5">
    <h1 class="text-l text-white mb-6">サーバーサイドスクリプト演習１</h1>
    <h2 class="text-white text-3xl">セッション</h2>
  </div><!--/.container-->
</header>

<main>
  <div class="container w-full h-full mx-auto py-20">

    <form action="kadai03_2.php" method="POST">
      <div class="mb-20">
        <div>
          <label class="block" for="comment">コメント</label>
          <textarea name="comment" id="comment" class="w-full h-36 text-md p-2 border-2 border-gray-200 focus:border-green-200 rounded-md outline-none resize-none"><?= $old["comment"]?></textarea>
        </div>
      </div>

      <div class="flex justify-end">
          <button type="submit" class="w-40 h-10 text-white text-lg bg-pink-600 hover:bg-pink-500 rounded-md">入力内容の確認</button>
      </div>
    </form>

  </div><!--/.container-->
</main>

</div><!--/.wrapper-->
</body>
</html>