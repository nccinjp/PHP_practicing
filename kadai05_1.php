<?php
/**
 * ファイル名；kadai05_1.php
 * @author 陳鏡宇 20番
 * @package SK1A
 **/

?>
<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <link href="asset/styles/tailwind.min.css" rel="stylesheet">
  <title>php1 - kadai05_1</title>
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
    <h3 class="text-xl border-b-2 border-green-400 pb-2 mb-10">画像のアップロード</h3>

    <form action="kadai05_2.php" method="POST" enctype="multipart/form-data">
      <input type="hidden" name="MAX_FILE_SIZE" value="2000000">

      <div class="flex items-center h-96 mb-10 p-4 border border-gray-400 border-dashed">
        <div class="flex flex-col flex-grow items-center">
          <svg class="w-16 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-width="0.8" stroke-linejoin="round" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z">
          </svg>
          
          <input type="file" name="upfile" id="upload_image" class="hidden">
          <label for="upload_image" class="text-indigo-600 py-4">
            <span class="border rounded-md border-indigo-600 p-2 mx-auto hover:bg-indigo-600 hover:text-white">ファイルを添付</span>
          </label>
          <p class="text-sm text-center">PNG, JPG, GIF<br>2MB以内</p>
        </div>
        <figure class="thumb h-full"><img class="object-contain h-full"></figure>
      </div>
      <div class="flex justify-center">
        <button type="submit" class="w-40 h-10 text-white text-lg bg-pink-600 hover:bg-pink-500 rounded-md">アップロード</button>
      </div>

    </form>
  </div><!--/.container-->
</main>

</div><!--/.wrapper-->
<script src="asset/scripts/kadai05.js"></script>
</body>
</html>