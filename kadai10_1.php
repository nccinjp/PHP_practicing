<?php
/* kadai10_1.php
SK1A 20 陳鏡宇*/

//1 定数定義
define( "DB_HOST", "localhost" );
define( "DB_USER", "dbuser" );
define( "DB_PASS", "ecc" );
define( "DB_NAME", "studb" );
define( "DB_CHARSET", "utf8mb4" );

if($_SERVER['REQUEST_METHOD'] != 'POST'){
    header('Location: kadai06_1.php');
    exit();
  }

$postdata = filter_input_array(INPUT_POST);
if(in_array(NULL,$postdata,true)){
    exit("不正データが検出されました。");
  }

$instance = new mysqli( DB_HOST, DB_USER, DB_PASS, DB_NAME );
if( ! $instance -> connect_error){

    $instance->set_charset(DB_CHARSET);
    
    $sql = "DELETE FROM OLDPRODUCT WHERE PRODUCT_NO =?";
    
    if($stmt = $instance -> prepare($sql)){
      $stmt->bind_param("s",$postdata["product_no"]); 
      $stmt->execute();
      //9
      if( $stmt -> affected_rows == 1 ){
      //更新成功コミット処理
      $instance -> commit();
      
      }else{
      //更新失敗ロールバック処理
      $instance -> rollback();
      }
      header('Location: kadai06_1.php');
      $stmt->close();
      }   
     $instance->close();
  }

?>