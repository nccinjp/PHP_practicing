<?php
/**
 * 2021/11/14 森作成
 * OLDPRODUCTテーブルの項目のフィルタリング用配列
 * ＊product_no　数字4桁
 * ＊price　0~10000までの数
 * ＊category　ピザかドリンク
 * ＊pname チェックなし
 */

//oldproductテーブルのデータフィルタリングチェック用の配列
$filter_array=[
  "product_no" =>
  [
  "filter" => FILTER_VALIDATE_REGEXP,
    "options" => [
    "regexp" => "/\A\d{4}\z/"
    ]
  ],
  "price" => [
    "filter" => FILTER_VALIDATE_INT,
    "options" => [
      "max_range" => 10000,
      "min_range" => 0
    ]
  ],
  "category" =>
  [
  "filter" => FILTER_VALIDATE_REGEXP,
    "options" => [
    "regexp" => "/\Aピザ\z|\Aドリンク\z/u"
    ]
  ],
  "pname" => []

];