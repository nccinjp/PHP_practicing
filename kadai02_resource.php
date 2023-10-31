<?php
/**
 * 2021/09/23 森修正
 * サムネイルを配列にまとめていたのを排除
 * また、PGの便宜上、配列番号をid番号と同じになるように付加した
 */
$products = [
  1 =>[
    "id" => 1,
    "name" => "シナモンミックス",
    "price" => 400,
    "description" => "シナモンの甘みと香りが広がる逸品",
    "large" => "kadai02-product-1-lg.jpeg",
    "small" => "kadai02-product-1-sm.jpeg",
  ],
  2 =>[
    "id" => 2,
    "name" => "チョココーテイング",
    "price" => 650,
    "description" => "サクサククッキーにチョコレートをコーティングしたクッキー",
    "large" => "kadai02-product-2-lg.jpeg",
    "small" => "kadai02-product-2-sm.jpeg",
  ],
  3 =>[
    "id" => 3,
    "name" => "クッキー・ケーキ",
    "price" => 400,
    "description" => "ケーキのように見えますが、実はクッキーなんです",
    "large" => "kadai02-product-3-lg.jpeg",
    "small" => "kadai02-product-3-sm.jpeg",
  ],
  4 =>[
    "id" => 4,
    "name" => "バレンタインクッキー",
    "price" => 850,
    "description" => "バレンタインにピッタリな、可愛いハート型クッキー",
    "large" => "kadai02-product-4-lg.jpeg",
    "small" => "kadai02-product-4-sm.jpeg",
  ],
  5 =>[
    "id" => 5,
    "name" => "クッキー６種詰め合わせ",
    "price" => 1200,
    "description" => "ギフトスイーツの大定番。長年愛され続けるクッキー",
    "large" => "kadai02-product-5-lg.jpeg",
    "small" => "kadai02-product-5-sm.jpeg",
  ],
  6 =>[
    "id" => 6,
    "name" => "アーモンドクッキー",
    "price" => 300,
    "description" => "香ばしいアーモンドとほんのり甘いサクサクのクッキー",
    "large" => "kadai02-product-6-lg.jpeg",
    "small" => "kadai02-product-6-sm.jpeg",
  ],
  7 =>[
    "id" => 7,
    "name" => "ワッフルクッキー",
    "price" => 300,
    "description" => "見た目はワッフル！食感はサクサクのクッキー",
    "large" => "kadai02-product-7-lg.jpeg",
    "small" => "kadai02-product-7-sm.jpeg",
  ],
  8 =>[
    "id" => 8,
    "name" => "チーズケーキサンドクッキー",
    "price" => 600,
    "description" => "ミルキーで濃厚チーズケーキサンドクッキー",
    "large" => "kadai02-product-8-lg.jpeg",
    "small" => "kadai02-product-8-sm.jpeg",
  ],
];

//課題2_2でgetデータをフィルタリングチェック用の配列
//プロダクトIDが整数であることと１～８までの範囲チェック
$filter_array=[
  "product_id" => [
    "filter" => FILTER_VALIDATE_INT,
    "options" => [
      "max_range" => 8,
      "min_range" => 1
    ]
  ],
];