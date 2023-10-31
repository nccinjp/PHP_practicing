<?php
//ファイル名：
//名　前：陳鏡宇
//クラス：SK1A
  if($_SERVER['REQUEST_METHOD']!='POST'){
    header('Location: kadai01_1.php');
  }

  require_once "./kadai01_resource.php";

  $postdata = filter_input_array(INPUT_POST,$filter_array);

  if(in_array(NULL,$postdata,true) || in_array(false,$postdata,true) ){
    exit("不正データが検出されました。");
  } 
 
  if(empty($postdata["name"])){
    $postdata["name"]="名前が入力されてません。";
  }

  if(empty($postdata["kana"])){
    $postdata["kana"]="フリガナが入力されてません。";
  }

  $keyIndex = array_search($postdata["course"], array_column($courses,"id"));

  $result = $courses[$keyIndex];
  //var_dump($result);

  if(($postdata["department"]) !== ($result["department_id"])){
    $postdata["department_name"] = "学科またはコースの選択が間違っています";
    $postdata["course_name"] = " 学科またはコースの選択が間違っています" ;
  }else{
    $postdata["department_name"] = $result["department_name"];
    $postdata["course_name"]=$result["name"];
  }


?>
<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <!-- link -->
  <link href="asset/styles/tailwind.min.css" rel="stylesheet">
  <title>php1 - kadai01_2</title>
</head>
<body>
<div class="wrapper">

<header class="bg-green-500">
  <div class="container mx-auto py-5">
    <h1 class="text-l text-white mb-6">サーバーサイドスクリプト演習１</h1>
    <h2 class="text-white text-3xl">formの復習</h2>
  </div><!--/.container-->
</header>

<main>
  <div class="container mx-auto py-20">

    <div class="flex mb-20">
      <div class="w-6/12 mr-10">
        <div class="flex mb-10">
          <div class="w-1/2 mr-5">
            <label class="block" for="department">学科</label>
            <p class="text-md p-1.5 border-2 border-gray-200 focus:border-green-200 rounded-md"><?=$postdata ["department_name"]?></p>
          </div>

          <div class="w-1/2">
            <label class="block" for="course">コース</label>
            <p class="text-md p-1.5 border-2 border-gray-200 focus:border-green-200 rounded-md"><?=$postdata ["course_name"]?></p>
          </div>
        </div>

        <div class="mb-10">
          <label class="block" for="name">名前</label>
          <p class="w-full text-md p-2 border-2 border-gray-200 focus:border-green-200 rounded-md"><?=$postdata ["name"]?></p>
        </div>

        <div class="">
          <label class="block" for="kana">フリガナ</label>
          <p class="w-full text-md p-2 border-2 border-gray-200 focus:border-green-200 rounded-md"><?=$postdata ["kana"]?></p>
        </div>
      </div>
    
      

      <div class="w-6/12 flex flex-col items-stretch">
        <label class="w-full" for="freeword">備考</label>
        <p class="w-full flex-1 text-md p-2 border-2 border-gray-200 focus:border-green-200 rounded-md"></p>
      </div>

    </div>

    <div class="flex justify-end">
      <a href="./kadai01_1.php" class="block w-40 h-10 text-white text-center leading-10 bg-gray-500 mr-10 hover:bg-gray-400 rounded-md">入力に戻る</a>
      <a href="#" class="block w-40 h-10 text-white text-center leading-10 bg-pink-600 hover:bg-pink-500 rounded-md">送信する</a>
    </div>

  </div><!--/.container-->
</main>

</div><!--/.wrapper-->
</body>
</html>