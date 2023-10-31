<?php
/**
 * ファイル名；kadai05_2.php
 * @author 陳鏡宇 20番
 * @package SK1A
 **/

 //アップロードを許可する拡張子
$allow = array("jpeg","jpg","png","gif");

//1
if($_SERVER['REQUEST_METHOD'] != 'POST'){
  //$reslut["status"]=false;
  header('Location: kadai05_1.php');
}

//2
$result = [
  "status" => false,
  "message" => "ファイルのアップロードに失敗しました",
  "result" => []
  ];

//3  
if(!isset($_FILES["upfile"])){
  exit("ファイルのアップロードに失敗しました");
}

//4
$upFile = $_FILES["upfile"]; 

//5-1
if($upFile["error"] === UPLOAD_ERR_OK){
  $list = explode(".",$upFile["name"]);
 
  $reFileName = uniqid("");
  $ext = $list[ count( $list ) - 1 ]; //拡張子を$ext へ格納する
  $moveFilePath = "./asset/storage/{$reFileName}.{$ext}";  //移動PATH的路徑設定
    
    if(is_uploaded_file($upFile['tmp_name'])){
      if(move_uploaded_file($upFile["tmp_name"],$moveFilePath)){
      $result[ "status"] = true;
      $result["message"] = "ファイルのアップロードに成功しました";
      $result[ "result"] = $moveFilePath;
    }
  }

  //6
  }else{
    $result["status"] = false;
    switch($upFile["error"]){

      case UPLOAD_ERR_INI_SIZE;
      case UPLOAD_ERR_FORM_SIZE;
        $result["message"]="ファイルのサイズが大きすぎます。";
        break;

      case UPLOAD_ERR_PARTIAL;
        $result["message"]="通信環境が良くなってからもう一度お試しください";
        break; 
      case UPLOAD_ERR_NO_FILE;
        $result["message"]="ファイルのアップロードに失敗しました";
        break;

      default;
        $result["message"]="システムの復旧後に再度アップロードしてください"; 
    } //switch

  }

?>
<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <link href="asset/styles/tailwind.min.css" rel="stylesheet">
  <title>php1 - kadai05_2</title>
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
    <h3 class="text-xl border-b-2 border-green-400 mb-10 pb-2">画像のアップロード</h3>

    <div class="p-10 border border-gray-200">
      <?php if($result["status"]):?>
      <!-- 画像のアップロードが成功した時のHTML -->
      <figure><img src="<?= $result["result"] ?>"class="object-contain object-center"><?= $result["message"]?></figure>
      <?php else: ?>
      <!-- 画像のアップロードに失敗した時のHTML -->
      <p class="text-pink-600 text-xl py-10"><?= $result["message"] ?></p>
      <?php endif ?>
    </div>

  </div><!--/.container-->
</main>

</div><!--/.wrapper-->
<script></script>
</body>
</html>