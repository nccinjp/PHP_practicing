<?php
/**
 * ファイル名；kadai03_2.php
 * @author 陳鏡宇 20番
 * @package SK1A  **/

//1
if($_SERVER['REQUEST_METHOD']!='POST'){
  header('Location: kadai03_1.php');
}

//2
require_once "./kadai03_resource.php";

//3
$postdata = filter_input_array(INPUT_POST,$filter_array); 

//4
if(in_array(NULL,$postdata,true) || in_array(false,$postdata,true) ){
  exit("不正データが検出されました。");
} 
//Step5:session start
session_start();

//6
$_SESSION["comment"]=$postdata["comment"];

//7 表示用のデータを$viewdataに格納
$viewdata["comment"]=$postdata["comment"];
$viewdata["sid"]=session_id();


?>
<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <!-- link -->
  <link href="asset/styles/tailwind.min.css" rel="stylesheet">
  <title>php1 - kadai03_2</title>
</head>
<body>
<div class="wrapper">

<header class="bg-green-500">
  <div class="container mx-auto py-5">
    <h1 class="text-l text-white mb-6">サーバーサイドスクリプト演習１</h1>
    <h2 class="text-white text-3xl">セッション</h2>
  </div><!--/.container-->
</header>

<main>
  <div class="container mx-auto py-20">

  <div class="mb-20">
        <div class="mb-10">
          <label class="block">ID</label>
          <p class="w-full text-md p-2 border-2 border-gray-200 focus:border-green-200 rounded-md"><?= $viewdata["sid"]?></p>
        </div>

        <div>
          <label class="block">コメント</label>
          <p class="w-full text-md p-2 border-2 border-gray-200 focus:border-green-200 rounded-md outline-none resize-none"><?= $viewdata["comment"]?></p>
        </div>
      </div>

      <div class="flex justify-end">
        <a href="kadai03_1.php" class="block w-40 h-10 text-white text-center leading-10 bg-gray-500 hover:bg-gray-400 rounded-md">入力に戻る</a>
      </div>

    <div class="flex justify-end">
    </div>

  </div><!--/.container-->
</main>

</div><!--/.wrapper-->
<script src=""></script>
</body>
</html>