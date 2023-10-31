<?php
/* kadai08_2.php
SK1A 20 陳鏡宇*/

//1 定数定義
define( "DB_HOST", "localhost" );
define( "DB_USER", "dbuser" );
define( "DB_PASS", "ecc" );
define( "DB_NAME", "studb" );
define( "DB_CHARSET", "utf8mb4" );

//2配列ファイルを読み込む（ require_once
if($_SERVER['REQUEST_METHOD'] !== 'POST'){
    header('Location: kadai08_1.php');
    exit();
  }
//3
require_once "./oldproduct_resource.php";
//4。
$postdata = filter_input_array(INPUT_POST,$filter_array);
//$post data が NULL だった場合は、 PG 終了 する。
if(in_array(NULL,$postdata,true)){
    exit("不正データが検出されました。");
  }
//5
session_start();
$_SESSION["old"] = $postdata;

//6
if(in_array(false,$postdata,true)){
    if(!$postdata["product_no"]){
    //商品番号不正
    $_SESSION["errmessage"] = "商品コードが入力がされていないか不正な入力です。";
    }else if(!$postdata["category"]){
    //カテゴリ値不正
    $_SESSION["errmessage"] = "カテゴリ値が間違っています。";
    }else{
    //値段不正
    $_SESSION["errmessage"]="値段の入力が不正です。";
    }    
    header('Location: kadai08_1.php');
    exit();
    // 忘れずに
    }

    //商品名未入力処理
    if($postdata["pname"] == ""){
        $_SESSION["errmessage"] = "商品名が入力されていません。";
        header('Location: kadai08_1.php');
        exit();// 忘れずに
    }

//7データベースに接続する。正常に接続できた場合は、以下の処理を行う。
$instance = new mysqli( DB_HOST, DB_USER, DB_PASS, DB_NAME );
if( ! $instance -> connect_error){

  $instance->set_charset(DB_CHARSET);
  $sql = "INSERT INTO OLDPRODUCT( PRODUCT_NO, PNAME, CATEGORY,PRICE )VALUES( ?, ?, ?, ? )";
  if($stmt = $instance -> prepare($sql)){
    $stmt->bind_param("sssi",$postdata["product_no"],$postdata["pname"],$postdata["category"],$postdata["price"]); 
    $stmt->execute();
    //9
    if( $stmt -> affected_rows == 1 ){
    
    //更新成功コミット処理
    $instance -> commit();
    header("Location:kadai07_1.php?product_no={$postdata["product_no"]}");
    }else{
    
    //更新失敗ロールバック処理
    $instance -> rollback();
    $_SESSION["errmessage"] = "商品情報新規登録ができませんでした。";
    header('Location: kadai08_1.php');
    }
    $stmt -> close();
    }   
    $instance -> close();
}
?>