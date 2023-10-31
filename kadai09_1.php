<?php
/* kadai09_1.php
SK1A 20 陳鏡宇*/
//1
session_start();
//2
$errmessage = "";

if(isset($_SESSION["errmessage"]))
{
  $errmessage = $_SESSION["errmessage"];
}
//3 セッションデータのクリア
$_SESSION = [];

//4 HTML 内で使用するカテゴリ配列を定義する。
$category = array("ピザ","ドリンク");

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
     $stmt->execute();  //實行
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
  
  <title>php1 - kadai09_1</title>
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
      <h3 class="text-xl border-b-2 border-green-400 pb-2 mb-5">登録商品の編集</h3>
      
      <!--検索に失敗した時のHTML-->
      <?php if(!$result["status"]): ?>
      <p class="text-red-600"><?= $result["status"] ?></p>
      <?php endif ?>
      
      <!--更新に失敗した時のHTML-->
      <p class="text-red-600"><?= $errmessage ?></p>
      
    </div>

    <div class="product-wrap px-5 py-10 shadow-md">
      <h4 class="font-bold mb-5">商品情報</h4>

      <form action="kadai09_2.php" method="POST">
      
        <div class="flex mb-10">
          <div class="flex-grow mr-10">
            <div class="mb-5">
              <div class="flex flex-col w-6/12">
                <label for="product_no" class="text-gray-500 text-left uppercase tracking-wider">code</label>
                <?= $result["result"]["PRODUCT_NO"]?>
                <input 
                  type="text" 
                  name="product_no" 
                  id="product_no" 
                  class="px-2 py-2 border rounded-md outline-none focus:border-green-200" 
                  value="<?= $result["result"]["PRODUCT_NO"] ?>"
                  readonly
                ><!--森　追加  商品番号は変更できないようにreadonly属性をつけた-->
              </div>
            </div>

            <div class="flex justify-between mb-5">
              <div class="flex flex-col flex-grow mr-10">
                <label for="category" class="text-gray-500 text-left uppercase tracking-wider">category</label>
                <select name="category" class="px-2 py-2 border  rounded-md outline-none focus:border-green-200">
                  <?php 
                   foreach($category as $c){
                     if($c == $result["result"]["CATEGORY"]){
                       print "<option value='{$c}' selected>{$c}</option>";
                     }else{
                       print "<option value='{$c}'>{$c}</option>";
                     }
                            //<option value="ピザ">ピザ</option>
                            //<option value="ドリンク">ドリンク</option>
                   } //foreach
                   ?>
                </select>
              </div>
              <div class="flex flex-col w-4/12">
                <label for="price" class="text-gray-500 text-left uppercase tracking-wider">price</label>
                <input 
                  type="text" 
                  name="price" 
                  id="product_no" 
                  class="px-2 py-2 border rounded-md outline-none focus:border-green-200" 
                  value="<?= $result["result"]["PRICE"]?>"
                >
              </div>
            </div>

            <div class="flex flex-col">
              <label for="name" class="text-gray-500 text-left uppercase tracking-wider">name</label>
              <input 
                type="text" 
                name="pname" 
                id="product_no" 
                class="px-2 py-2 border rounded-md outline-none focus:border-green-200" 
                value="<?= $result["result"]["PNAME"]?>"
              >
            </div>
          </div>

          <div class="flex flex-col items-stretch flex-grow">
            <label for="description" class="text-gray-500 text-left uppercase tracking-wider">description</label>
            <textarea class="w-full h-full text-lg px-2 bg-gray-100 py-2 border rounded-md" disabled></textarea>
          </div>
        </div>

        <div class="flex justify-end">
          <a href="kadai06_1.php" class="text-white text-center leading-10 bg-gray-600 px-10 mr-5 hover:bg-gray-500 rounded-md">戻る</a>
          <button type="submit" class="text-white text-center leading-10 bg-pink-600 px-10 hover:bg-pink-500 rounded-md">更新する</button>
        </div>

      </form>

    </div><!--/.product-wrap-->

  </div><!--/.container-->
</main>

</div><!--/.wrapper-->
</body>
</html>