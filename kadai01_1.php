<?php
    require_once "./kadai01_resource.php";

?>
<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <link href="asset/styles/tailwind.min.css" rel="stylesheet">
  <title>php1 - kadai01_1</title>
</head>

<body>
<div class="wrapper w-screen h-screen">

<header class="bg-green-500">
  <div class="container mx-auto py-5">
    <h1 class="text-l text-white mb-6">サーバーサイドスクリプト演習１</h1>
    <h2 class="text-white text-3xl">formの復習</h2>
  </div><!--/.container-->
</header>

<main>
  <div class="container w-full h-full mx-auto py-20">

    <form action="kadai01_2.php" method="POST" novalidate>
      <div class="flex mb-20">
        <div class="w-6/12 mr-10">
          <div class="flex mb-10">
            <div class="w-1/2 mr-5">

              <label class="block" for="department">学科</label>
              <select name="department" id="department" class="w-full text-md p-2 border-2 border-gray-200 focus:border-green-200 rounded-md outline-none">
                <?php 
                  foreach($departments as $dep){
                    print "<option value='{$dep["id"]}'>{$dep["name"]}</option>";
                  }
                ?>
              </select>
            </div>

            <div class="w-1/2">
              <label class="block" for="course">コース</label>
              <select name="course" id="course" class="w-full text-md p-2 border-2 border-gray-200 focus:border-green-200 rounded-md outline-none">
                <?php 
                  foreach($courses as $cou){
                    print "<option value='{$cou["id"]}'>{$cou["name"]}</option>\n";
                  }
                ?>
              </select>
            </div>
          </div>

          <div class="mb-10">
            <label class="block" for="name">名前<em class="text-red-600 text-sm not-italic p-0.5 ml-3">必須</em></label>
            <input type="text" name="name" id="name" class="text-md w-full p-2 border-2 border-gray-200 focus:border-green-200 rounded-md outline-none" placeholder="ECC 太郎" required>
                  
          </div>

          <div class="">
            <label class="block" for="kana">フリガナ<em class="text-red-600 text-sm not-italic ml-3">必須</em></label>
            <input type="text" name="kana" id="kana" class="text-md w-full p-2 border-2 border-gray-200 focus:border-green-200 rounded-md outline-none" placeholder="イーシーシー タロウ" required>
          
          </div>
        </div>
      
        

        <div class="w-6/12 flex flex-col items-stretch">
          <label class="w-full flex-0" for="note">備考</label>
          <textarea name="note" id="note" class="w-full flex-1 text-md p-2 border-2 border-gray-200 focus:border-green-200 rounded-md outline-none resize-none"></textarea>
                  
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