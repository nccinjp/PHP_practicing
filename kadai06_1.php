<?php
/* kadai06_1.php
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

//4データベースに接続する
$instance = new mysqli( DB_HOST, DB_USER, DB_PASS, DB_NAME );

if( ! $instance -> connect_error ) {
    //正常に接続できた場合の処理
      $instance->set_charset(DB_CHARSET);  //データベースの文字コードを指定する
      //5
      $where = " "; //where句を格納するための変数

        //6.商品名にデータがあった時の処理
        if( isset($getdata["name"])&& $getdata["name"] != "") {
        $getdata["name"] = $instance -> escape_string( $getdata["name"] );
        $getdata["name"] = preg_replace( "/%/", "\%", $getdata["name"] );
        $where = " WHERE PNAME LIKE '%{$getdata["name"]}%' ";  //這句where前的空白一定要留因為要接入SQL
        }else{
          if( isset($getdata["category"])&& $getdata["category"] != ""){
            $getdata["category"] = $instance -> escape_string( $getdata["category"] );
            $where = " WHERE CATEGORY = '{$getdata["category"]}'";
          }
        }

    //8
    $sql = "SELECT * FROM OLDPRODUCT {$where}";

    if($kekka = $instance -> query($sql)){
        //9-1
        $result["status"] = true;
        //9-2
        while( $row = $kekka -> fetch_array( MYSQLI_ASSOC ) ) {
            $result[ "result" ][]= $row; 
        }
      $kekka -> close();  
    }

    //10
    $instance -> close();  
    //$connection->close();
}
?>
<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <!-- link -->
  <link href="asset/styles/tailwind.min.css" rel="stylesheet">
  
  <title>php1 - kadai06_1</title>
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
    <div class="flex justify-between items-end border-b-2 border-green-400 pb-3 mb-10">
      <h3 class="text-xl">登録商品一覧</h3>
      <a href="kadai08_1.php" class="block w-40 h-10 text-white text-center leading-10 bg-pink-600 hover:bg-pink-500 rounded-md">新規登録</a>
    </div>

    <div class="flex justify-between items-start">

      <div class="w-3/12 h-80 p-5 shadow-md">
        <form action="kadai06_1.php" method="GET" class="h-full">

        <div class="flex flex-col justify-between h-full">
          <div>
            <div class="border-b border-gray-300 border-dashed mb-4 pb-6">
              <label for="name" class="text-gray-500 text-xs uppercase tracking-wider">name</label>
              <input type="text" name="name" id="name" class="w-full h-10 px-3 text-sm border-2 border-gray-200 rounded-md focus:border-green-200" value="" placeholder="product name">
            </div>

            <div>
              <label for="category" class="text-gray-500 text-xs uppercase tracking-wider">category</label>
              <select name="category" id="category" class="w-full h-10 px-3 text-sm border-2 border-gray-200 rounded-md focus:border-green-200">
                <option
                  value=""
                  <?php if(empty($getdata["category"])): ?>
                    selected
                    <?php endif ?>
                >すべての商品</option>

                <option
                  value="ピザ"
                  <?php if(empty($getdata["category"])): ?>
                    selected
                    <?php endif ?>
                  >ピザ</option>

                <option
                  value="ドリンク"
                  <?php if(empty($getdata["category"])): ?>
                    selected
                    <?php endif ?>
                >ドリンク</option>
              </select>
            </div>
          </div>

          <div class="flex justify-center">
            <button type="submit" class="w-40 h-10 text-white text-lg bg-indigo-600 hover:bg-indigo-500 rounded-md">検索</button>
          </div>
        </div>

        </form>
      </div>

    <?php if($result["status"]): ?> 
    <!-- 成功した時のHTML --> 
      <div class="w-8/12">  

        <table class="w-full table-fixed">
          <thead>
            <tr class="bg-gray-100 text-gray-500 text-xs text-left uppercase tracking-wider border-b border-gray-300">
              <th class="w-2/12 h-6 font-medium px-6 py-3">code</th>
              <th class="w-6/12 h-6 font-medium px-6 py-3">name</th>
              <th class="w-2/12 h-6 font-medium px-6 py-3">price</th>
              <th class="w-2/12 h-6 text-center font-medium px-6 py-3">setting</th>
            </tr>
          </thead>
          <tbody>
          
          <?php foreach($result["result"] as $product ): ?>
            <tr class="tracking-wider border-b border-gray-200 hover:bg-gray-100 ">
              <td class="h-10 px-6 py-5"><?= $product["PRODUCT_NO"] ?></td>
              <td class="h-10 px-6 py-5"><?= $product["PNAME"] ?></td>
              <td class="h-10 px-6 py-5"><?= $product["PRICE"] ?></td>
              <td class="h-10 text-center px-6 py-5">
                <a href="kadai07_1.php?product_no=<?=$product["PRODUCT_NO"]?>" class="text-pink-600 hover:text-pink-400">詳細</a>
              </td>
            </tr>
          <?php endforeach ?>
          </tbody>
        </table>
      </div>
    
    <?php else: ?>  
    <!-- 失敗した時のHTML -->
      <div>
        <p class="text-xl"><?= $result["MESSAGE"]?></p>
      </div>
    <?php endif ?>
    </div>

  </div><!--/.container-->
</main>

</div><!--/.wrapper-->
</body>
</html>