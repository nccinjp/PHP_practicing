<?php
/**
 * ファイル名；kadai04_1.php
 * @author 陳鏡宇 20番
 * @package SK1A
 **/

$zip = null;
  if(isset($_COOKIE["zip"])){
    $zip = $_COOKIE["zip"];
  }

?>
<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <link href="asset/styles/tailwind.min.css" rel="stylesheet">
  <title>php1 - kadai04_1</title>
</head>
<body>
<div class="wrapper w-screen h-screen">

<header class="bg-green-500">
  <div class="container mx-auto py-5">
    <h1 class="text-l text-white mb-6">サーバーサイドスクリプト演習１</h1>
    <h2 class="text-white text-3xl">ファイル処理</h2>
  </div><!--/.container-->
</header>

<main>
  <div class="container w-full h-full mx-auto py-20">
    <h3 class="text-xl border-b-2 border-green-400 pb-2 mb-10">郵便番号で検索する</h3>

    <form action="kadai04_2.php" method="GET">
      <div class="flex flex-wrap py-10">
        <div class="w-1/3 mr-5">
          <input type="text" name="zip" id="zip" class="text-md w-full p-2 mb-2 border-2 border-gray-200 focus:border-green-200 rounded-md outline-none" maxlength="7" value="<?= $zip ?>">
          <p class="text-sm">３桁以上の数字を入力してください</p>
        </div>
        <div>
          <button type="submit" class="w-40 h-10 text-white text-lg bg-pink-600 hover:bg-pink-500 rounded-md">検索する</button>
        </div>
      </div>
    </form>

  </div><!--/.container-->
</main>

</div><!--/.wrapper-->
</body>
</html>