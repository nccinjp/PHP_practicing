<?php
/**
 * 2021/09/26 森作成
 * コメント欄に入力された値を取得する用のフィルタ配列
 * バリデータチェックはなし。XSS対策のみ
 */

//課題3_2でpostデータをフィルタリングチェック用の配列
//コメントをサニタイジングする
$filter_array=[
  "comment" => FILTER_SANITIZE_FULL_SPECIAL_CHARS,
];