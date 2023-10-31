<?php
/**
 * ファイル名；kadai04_2.php
 * @author 陳鏡宇 20番
 * @package SK1A
**/

//1
require_once "./kadai04_resource.php";

//2
$result = [
  "status" => false,
  "message"=> "該当する郵便番号はありませんでし",
  "result" => []
];

//3
$getdata = filter_input_array(INPUT_GET,$filter_array);

//4
if($getdata == NULL){
  //$reslut["status"]=false;
  header('Location: kadai04_1.php');
}

//5
if(!$getdata["zip"]){
  $result["status"]= false ;
  $result["message"] = "郵便番号を数字7 桁で入力してください" ; 
}
setcookie( "zip", $getdata["zip"], time() + ( 60 * 1 ) );

$getdata["zip"] = mb_convert_kana( $getdata["zip"],"n");  //全形變半形

//6+7
if(!$handle = @fopen("./files/zip.csv","r")){
  $reslut["status"]=false;
  $message["システム障害が発生しています(ファイルオープン失敗)"];
}else{
  while(!feof($handle)){
    $row = fgets($handle);                                      //ファイルを1 行読み込む。
    list($zip,$pref,$city,$town) = explode(",",$row);           //カンマ区切りごとにレコードを分割し
          if($zip == $getdata["zip"]){                          //3.$zip と$getdata["zip”]が同じ値であれば、
            $result["status"]=true;
            $result["result"][] = compact("zip","pref","city","town");
            break;
          }
  }
  fclose($handle);    //ファイルをクローズする。
}

?>
<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <link href="asset/styles/tailwind.min.css" rel="stylesheet">
  <title>php1 - kadai04_2</title>
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
    <h3 class="text-xl border-b-2 border-green-400 pb-2 mb-10">検索の結果</h3>
    <div class="w-2/3">

    <?php if($result["status"]): ?>

      <!-- 郵便番号検索が成功した時に表示するHTML -->
      <table class="table-fixd w-full">
        <thead>
          <tr class="bg-green-100 h-12">
            <th class="w-2/12 text-sm font-normal">郵便番号</th>
            <th class="w-3/12 text-sm font-normal">都道府県</th>
            <th class="w-3/12 text-sm font-normal">市区町村</th>
            <th class="w-4/12 text-sm font-normal">町域</th>  
          </tr>
        </thead>
        <tbody>
          <tr class="h-24">
            <td class="text-xl text-center border"><?="〒{$zip}" ?></td>
            <td class="text-xl text-center border"><?="{$pref}" ?></td>
            <td class="text-xl text-center border"><?="{$city}" ?></td>
            <td class="text-xl text-center border"><?="{$town}" ?></td>
          </tr>
        </tbody>
      </table>
    

    <?php else: ?>  
      <!-- 郵便番号検索に失敗した時のHTML -->
      <div>
        <p class="text-3xl font-bold"><?= $result["message"] ?></p>
      </div>
    <?php endif?>

      <div class="flex justify-end mt-10">
        <a href="kadai04_1.php" class="block w-40 h-10 text-white text-center leading-10 bg-gray-500 hover:bg-gray-400 rounded-md">検索へ戻る</a>
      </div>
    </div>

  </div><!--/.container-->
</main>

</div><!--/.wrapper-->
</body>
</html>