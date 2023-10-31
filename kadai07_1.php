<?php
/* kadai07_1.php
SK1A 20 陳鏡宇*/

//1 定数定義
define( "DB_HOST", "localhost" );
define( "DB_USER", "dbuser" );
define( "DB_PASS", "ecc" );
define( "DB_NAME", "studb" );
define( "DB_CHARSET", "utf8mb4" );
//2 結果格納用の配列$result
$result = [
"status" => false,
"message" => "現在システムを利用することができません",
"result" => []
];

//3
$getdata = filter_input_array(INPUT_GET);

//4
if($getdata == NULL){
  header('Location: kadai06_1.php');
}

//5データベースに接続する
$instance = new mysqli( DB_HOST, DB_USER, DB_PASS, DB_NAME );
if( ! $instance -> connect_error ) {
  //正常に接続できた場合の処理
  $instance->set_charset(DB_CHARSET);  //6データベースの文字コードを指定する

  //7 SQL 文を作成する。
  $sql = "SELECT * FROM OLDPRODUCT WHERE PRODUCT_NO = ?";

  //8
  if($stmt=$instance->prepare($sql)){
     $stmt->bind_param("s", $getdata["product_no"]);
     $stmt->execute();
     $kekka = $stmt->get_result();
     
     //9 
     if($kekka->num_rows){
        $result["status"] = true;
        while($row = $kekka -> fetch_array(MYSQLI_ASSOC)){
          $result["result"]= $row;  //ここが 06_1 と違う。
        }
      }else{
    //10
    $result[ "status" ] = false;
    $result[ "message" ] = "該当する商品はありません";

    }
    $kekka-> close();
    $stmt -> close();
  }
  $instance -> close();  
}
?>
<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <!-- link -->
  <link href="asset/styles/tailwind.min.css" rel="stylesheet">
  
  <title>php1 - kadai07_1</title>
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

    <h3 class="text-xl border-b-2 border-green-400 pb-2 mb-10">商品の詳細</h3>

    <div class="flex justify-end mb-10">
      <a href="kadai06_1.php" class="text-white text-center leading-10 bg-gray-600 px-10 hover:bg-gray-500 rounded-md">戻る</a>
      <form action="kadai10_1.php" method="POST">
<input type="hidden" name="product_no" value="<?= $getdata['product_no'] ?>">
<button type="submit" class="text-white text-center leading-10 bg-red-700 px-10
px-10 mx-5 hover:bg-red-600 rounded-md">削除する</button>
</form>
      <a href="kadai09_1.php?product_no=<?= $getdata['product_no'] ?>" class="text-white text-center leading-10 bg-pink-600 px-10 hover:bg-pink-500 rounded-md">編集する</a>
    </div>

    <?php if($result["status"]): ?>  
    <!-- 成功した時のHTML -->
    <div class="product-wrap px-5 py-10 shadow-md">
      <h4 class="font-bold mb-5">商品情報</h4>
      <div class="flex">
        <div class="flex-grow mr-10">
          <div class="mb-5">
            <div class="w-6/12">
              <p class="text-gray-500 text-left uppercase tracking-wider">code</p>
              <p class="px-2 py-2 border rounded-md"><?= $result["result"]["PRODUCT_NO"] ?></p>
            </div>
          </div>

          <div class="flex justify-between mb-5">
            <div class="flex-grow mr-10">
              <p class="text-gray-500 text-left uppercase tracking-wider">category</p>
              <p class="px-2 py-2 border  rounded-md"><?= $result["result"]["CATEGORY"]?></p>
            </div>
            <div class="w-4/12">
              <p class="text-gray-500 text-left uppercase tracking-wider">price</p>
              <p class="px-2 py-2 border  rounded-md"><?= $result["result"]["PRICE"]?></p>
            </div>
          </div>

          <div>
            <p class="text-gray-500 text-left uppercase tracking-wider">name</p>
            <p class="text-lg px-2 py-2 border  rounded-md"><?= $result["result"]["PNAME"]?></p>
          </div>
        </div>

        <div class="flex flex-col items-stretch flex-grow">
          <p class="text-gray-500 text-left uppercase tracking-wider">description</p>
          <p class="flex-grow text-lg px-2 bg-gray-100 py-2 border rounded-md"></p>
        </div>
      </div>

    </div><!--/.product-wrap-->
    <?php else: ?>
    <!-- 失敗した時のHTML -->
      <p class="text-xl"><?= $result["message"]?></p>
    <?php endif ?>

  </div><!--/.container-->
</main>

</div><!--/.wrapper-->
</body>
</html>