<?php
/**************************************** 
 * 2021/09/15
 * A.MORI 修正
 * 各項目ごとに配列を分割した
*********************************************/
/*学校情報配列*/
$school = [
  "id" => 1,
  "name" => "ECCコンピュータ専門学校"
];
/*学科情報配列 */
$departments = [
    [
      "id" => 1,
      "name" => "高度情報処理研究",
      "annual" => 4,

    ],
    [
      "id" => 2,
      "name" => "マルチメディア研究",
      "annual" => 3,
      
    ],
    [
      "id" => 3,
      "name" => "マルチメディア",
      "annual" => 2,
      
    ]
  ];
/* コース情報配列 */
$courses = [
  [
    "id" => 1,
    "name" => "IT開発エキスパート",
    "department_id" => 1,
    "department_name" => "高度情報処理研究",
  ],
  [
    "id" => 2,
    "name" => "IT開発研究",
    "department_id" => 2,
    "department_name" => "マルチメディア研究",
  ],
  [
    "id" => 3,
    "name" => "システムエンジニア",
    "department_id" => 3,
    "department_name" => "マルチメディア",
  ],
  [
    "id" => 4,
    "name" => "Webデザイン",
    "department_id" => 2,
    "department_name" => "マルチメディア研究",
  ],
];

//課題1_2でpostデータをフィルタリングチェック用の配列
//名前とフリガナは必須入力項目であるが、ここではフィルタリングしないのでPGで処理を行う。
//学科IDとコースIDは、整数チェックと範囲チェックを行う。
//名前、フリガナ、備考は、HTMLエンコード（サニタイジング）を行う。
//フィルタ一覧　 https://www.php.net/manual/ja/filter.filters.php
$filter_array=[
  "name" => FILTER_SANITIZE_FULL_SPECIAL_CHARS,
  "kana"=> FILTER_SANITIZE_FULL_SPECIAL_CHARS,
  "department" => [
    "filter" => FILTER_VALIDATE_INT,
    "options" => [
      "max_range" => 3,
      "min_range" => 1
    ]
  ],
  "course" => [
    "filter" => FILTER_VALIDATE_INT,
      "options" => [
        "max_range" => 4,
        "min_range" => 1
      ]
    ],
  "note"=> FILTER_SANITIZE_FULL_SPECIAL_CHARS,
];