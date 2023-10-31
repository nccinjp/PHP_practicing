<?php
/* kadai11_1.php
SK1A 20 陳鏡宇*/

//1 定数定義
define( "DB_HOST", "localhost" );
define( "DB_USER", "dbuser" );
define( "DB_PASS", "ecc" );
define( "DB_NAME", "studb" );
define( "DB_CHARSET", "utf8mb4" );

//2 結果格納用の配列$result
$result = [
    "status" => 500,
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
      $where = ""; //where句を格納するための変数

        //6.商品名にデータがあった時の処理
        if( isset($getdata["name"])&& $getdata["name"] != "") {

        $getdata["name"] = $instance -> escape_string( $getdata["name"] );
        $getdata["name"] = preg_replace( "/%/", "\%", $getdata["name"] );
        $where = " WHERE PNAME LIKE '%{$getdata["name"]}%' ";  
        //這句where前的空白一定要留因為要接入SQL

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
        $result["status"] = 200;
        $result["message"] = "";
        //9-2
        if($kekka -> num_rows){
            while( $row = $kekka -> fetch_array( MYSQLI_ASSOC ) ) {
              $result[ "result" ][]= $row; 
            }
          }else{
            $result[ "status" ] = 400;
            $result[ "message" ] = "指定されたデータは存在しませんでした";
          }
    $kekka -> close();  
    }
 //10
 $instance -> close();  
 //$connection->close();


//11
http_response_code(200);
//12
header('Content-Type:application/json; charset=UTF-8');
//13
header("X-Content-Type-Options: nosniff");
//14
print json_encode($result,
JSON_PRETTY_PRINT|JSON_UNESCAPED_UNICODE|JSON_UNESCAPED_SLASHES);
}

?>