<?php

use Illuminate\Database\Seeder;
use App\Models\SecondaryCategory;

class SecondaryCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(SecondaryCategory::class)->create([
             'id'                  => 1,
             'name'                => 'トップス',
             'sort_no'             => 1,
             'primary_category_id' => 1,
         ]);
         factory(SecondaryCategory::class)->create([
             'id'                  => 2,
             'name'                => 'ジャケット/アウター',
             'sort_no'             => 2,
             'primary_category_id' => 1,
         ]);
         factory(SecondaryCategory::class)->create([
             'id'                  => 3,
             'name'                => 'パンツ',
             'sort_no'             => 3,
             'primary_category_id' => 1,
         ]);
         factory(SecondaryCategory::class)->create([
             'id'                  => 4,
             'name'                => 'スカート',
             'sort_no'             => 4,
             'primary_category_id' => 1,
         ]);
         factory(SecondaryCategory::class)->create([
             'id'                  => 5,
             'name'                => 'ワンピース',
             'sort_no'             => 5,
             'primary_category_id' => 1,
         ]);
         factory(SecondaryCategory::class)->create([
             'id'                  => 6,
             'name'                => '靴',
             'sort_no'             => 6,
             'primary_category_id' => 1,
         ]);
         factory(SecondaryCategory::class)->create([
             'id'                  => 7,
             'name'                => '帽子',
             'sort_no'             => 7,
             'primary_category_id' => 1,
         ]);
         factory(SecondaryCategory::class)->create([
             'id'                  => 8,
             'name'                => 'バッグ',
             'sort_no'             => 8,
             'primary_category_id' => 1,
         ]);
         factory(SecondaryCategory::class)->create([
             'id'                  => 9,
             'name'                => 'アクセサリー',
             'sort_no'             => 9,
             'primary_category_id' => 1,
         ]);
         factory(SecondaryCategory::class)->create([
             'id'                  => 10,
             'name'                => '小物',
             'sort_no'             => 10,
             'primary_category_id' => 1,
         ]);
         factory(SecondaryCategory::class)->create([
             'id'                  => 11,
             'name'                => 'スーツ/フォーマル/ドレス',
             'sort_no'             => 11,
             'primary_category_id' => 1,
         ]);
         factory(SecondaryCategory::class)->create([
             'id'                  => 12,
             'name'                => 'その他',
             'sort_no'             => 12,
             'primary_category_id' => 1,
         ]);
         factory(SecondaryCategory::class)->create([
             'id'                  => 13,
             'name'                => 'トップス',
             'sort_no'             => 13,
             'primary_category_id' => 2,
         ]);
         factory(SecondaryCategory::class)->create([
             'id'                  => 14,
             'name'                => 'ジャケット/アウター',
             'sort_no'             => 14,
             'primary_category_id' => 2,
         ]);
         factory(SecondaryCategory::class)->create([
             'id'                  => 15,
             'name'                => 'スーツ',
             'sort_no'             => 15,
             'primary_category_id' => 2,
         ]);
         factory(SecondaryCategory::class)->create([
             'id'                  => 16,
             'name'                => '靴',
             'sort_no'             => 16,
             'primary_category_id' => 2,
         ]);
         factory(SecondaryCategory::class)->create([
             'id'                  => 17,
             'name'                => '帽子',
             'sort_no'             => 17,
             'primary_category_id' => 2,
         ]);
         factory(SecondaryCategory::class)->create([
             'id'                  => 18,
             'name'                => 'バッグ',
             'sort_no'             => 18,
             'primary_category_id' => 2,
         ]);
         factory(SecondaryCategory::class)->create([
             'id'                  => 19,
             'name'                => 'アクセサリー',
             'sort_no'             => 19,
             'primary_category_id' => 2,
         ]);
         factory(SecondaryCategory::class)->create([
             'id'                  => 20,
             'name'                => '小物',
             'sort_no'             => 20,
             'primary_category_id' => 2,
         ]);
         factory(SecondaryCategory::class)->create([
             'id'                  => 21,
             'name'                => 'その他',
             'sort_no'             => 21,
             'primary_category_id' => 2,
         ]);
         factory(SecondaryCategory::class)->create([
             'id'                  => 22,
             'name'                => 'ベビー服（男の子用）',
             'sort_no'             => 22,
             'primary_category_id' => 2,
         ]);
         factory(SecondaryCategory::class)->create([
             'id'                  => 23,
             'name'                => 'ベビー服（女の子用）',
             'sort_no'             => 23,
             'primary_category_id' => 3,
         ]);
         factory(SecondaryCategory::class)->create([
             'id'                  => 24,
             'name'                => 'キッズ服（男の子用）',
             'sort_no'             => 24,
             'primary_category_id' => 3,
         ]);
         factory(SecondaryCategory::class)->create([
             'id'                  => 25,
             'name'                => 'キッズ服（女の子用）',
             'sort_no'             => 25,
             'primary_category_id' => 3,
         ]);
         factory(SecondaryCategory::class)->create([
             'id'                  => 26,
             'name'                => 'キッズ靴',
             'sort_no'             => 26,
             'primary_category_id' => 3,
         ]);
         factory(SecondaryCategory::class)->create([
             'id'                  => 27,
             'name'                => 'ベビー家具/寝具',
             'sort_no'             => 27,
             'primary_category_id' => 3,
         ]);
         factory(SecondaryCategory::class)->create([
             'id'                  => 28,
             'name'                => 'キッチン/食器',
             'sort_no'             => 28,
             'primary_category_id' => 4,
         ]);
         factory(SecondaryCategory::class)->create([
             'id'                  => 29,
             'name'                => 'ベッド/マットレス',
             'sort_no'             => 29,
             'primary_category_id' => 4,
         ]);
         factory(SecondaryCategory::class)->create([
             'id'                  => 30,
             'name'                => 'ソファ',
             'sort_no'             => 30,
             'primary_category_id' => 4,
         ]);
         factory(SecondaryCategory::class)->create([
             'id'                  => 31,
             'name'                => '椅子/チェア',
             'sort_no'             => 31,
             'primary_category_id' => 4,
         ]);
         factory(SecondaryCategory::class)->create([
             'id'                  => 32,
             'name'                => '机/テーブル',
             'sort_no'             => 32,
             'primary_category_id' => 4,
         ]);
         factory(SecondaryCategory::class)->create([
             'id'                  => 33,
             'name'                => '収納家具',
             'sort_no'             => 33,
             'primary_category_id' => 4,
         ]);
         factory(SecondaryCategory::class)->create([
             'id'                  => 34,
             'name'                => 'カーペット',
             'sort_no'             => 34,
             'primary_category_id' => 4,
         ]);
         factory(SecondaryCategory::class)->create([
             'id'                  => 35,
             'name'                => 'カーテン',
             'sort_no'             => 35,
             'primary_category_id' => 4,
         ]);
         factory(SecondaryCategory::class)->create([
             'id'                  => 36,
             'name'                => 'ライト/照明',
             'sort_no'             => 36,
             'primary_category_id' => 4,
         ]);
         factory(SecondaryCategory::class)->create([
             'id'                  => 37,
             'name'                => 'インテリア小物',
             'sort_no'             => 37,
             'primary_category_id' => 4,
         ]);
         factory(SecondaryCategory::class)->create([
             'id'                  => 38,
             'name'                => '本',
             'sort_no'             => 38,
             'primary_category_id' => 5,
         ]);
         factory(SecondaryCategory::class)->create([
             'id'                  => 39,
             'name'                => '漫画',
             'sort_no'             => 39,
             'primary_category_id' => 5,
         ]);
         factory(SecondaryCategory::class)->create([
             'id'                  => 40,
             'name'                => 'CD',
             'sort_no'             => 40,
             'primary_category_id' => 5,
         ]);
         factory(SecondaryCategory::class)->create([
             'id'                  => 41,
             'name'                => 'DVD/ブルーレイ',
             'sort_no'             => 41,
             'primary_category_id' => 5,
         ]);
         factory(SecondaryCategory::class)->create([
             'id'                  => 42,
             'name'                => 'テレビゲーム',
             'sort_no'             => 42,
             'primary_category_id' => 5,
         ]);
         factory(SecondaryCategory::class)->create([
             'id'                  => 43,
             'name'                => '本',
             'sort_no'             => 43,
             'primary_category_id' => 5,
         ]);
         factory(SecondaryCategory::class)->create([
             'id'                  => 44,
             'name'                => 'おもちゃ',
             'sort_no'             => 44,
             'primary_category_id' => 6,
         ]);
         factory(SecondaryCategory::class)->create([
             'id'                  => 45,
             'name'                => 'グッズ',
             'sort_no'             => 45,
             'primary_category_id' => 6,
         ]);
         factory(SecondaryCategory::class)->create([
             'id'                  => 46,
             'name'                => 'フィギュア',
             'sort_no'             => 46,
             'primary_category_id' => 6,
         ]);
         factory(SecondaryCategory::class)->create([
             'id'                  => 47,
             'name'                => '楽器/機材',
             'sort_no'             => 47,
             'primary_category_id' => 6,
         ]);
         factory(SecondaryCategory::class)->create([
             'id'                  => 48,
             'name'                => '美術品',
             'sort_no'             => 48,
             'primary_category_id' => 6,
         ]);
         factory(SecondaryCategory::class)->create([
             'id'                  => 49,
             'name'                => 'ボードゲーム',
             'sort_no'             => 49,
             'primary_category_id' => 6,
         ]);
         factory(SecondaryCategory::class)->create([
             'id'                  => 50,
             'name'                => 'メイク',
             'sort_no'             => 50,
             'primary_category_id' => 7,
         ]);
         factory(SecondaryCategory::class)->create([
             'id'                  => 51,
             'name'                => 'ネイルケア',
             'sort_no'             => 51,
             'primary_category_id' => 7,
         ]);
         factory(SecondaryCategory::class)->create([
             'id'                  => 52,
             'name'                => '香水',
             'sort_no'             => 52,
             'primary_category_id' => 7,
         ]);
         factory(SecondaryCategory::class)->create([
             'id'                  => 53,
             'name'                => 'スキンケア',
             'sort_no'             => 53,
             'primary_category_id' => 7,
         ]);
         factory(SecondaryCategory::class)->create([
             'id'                  => 54,
             'name'                => 'ヘアケア',
             'sort_no'             => 54,
             'primary_category_id' => 7,
         ]);
         factory(SecondaryCategory::class)->create([
             'id'                  => 55,
             'name'                => 'ボディケア',
             'sort_no'             => 55,
             'primary_category_id' => 7,
         ]);
         factory(SecondaryCategory::class)->create([
             'id'                  => 56,
             'name'                => 'ダイエット',
             'sort_no'             => 56,
             'primary_category_id' => 7,
         ]);
         factory(SecondaryCategory::class)->create([
             'id'                  => 57,
             'name'                => 'スマートフォン/携帯電話',
             'sort_no'             => 57,
             'primary_category_id' => 8,
         ]);
         factory(SecondaryCategory::class)->create([
             'id'                  => 58,
             'name'                => 'スマホアクセサリー',
             'sort_no'             => 58,
             'primary_category_id' => 8,
         ]);
         factory(SecondaryCategory::class)->create([
             'id'                  => 59,
             'name'                => 'PC/タブレット',
             'sort_no'             => 59,
             'primary_category_id' => 8,
         ]);
         factory(SecondaryCategory::class)->create([
             'id'                  => 60,
             'name'                => 'カメラ',
             'sort_no'             => 60,
             'primary_category_id' => 8,
         ]);
         factory(SecondaryCategory::class)->create([
             'id'                  => 61,
             'name'                => 'テレビ/映像機器',
             'sort_no'             => 61,
             'primary_category_id' => 8,
         ]);
         factory(SecondaryCategory::class)->create([
             'id'                  => 62,
             'name'                => 'オーディオ機器',
             'sort_no'             => 62,
             'primary_category_id' => 8,
         ]);
         factory(SecondaryCategory::class)->create([
             'id'                  => 63,
             'name'                => '美容/健康',
             'sort_no'             => 63,
             'primary_category_id' => 8,
         ]);
         factory(SecondaryCategory::class)->create([
             'id'                  => 64,
             'name'                => '冷暖房/空調',
             'sort_no'             => 64,
             'primary_category_id' => 8,
         ]);
         factory(SecondaryCategory::class)->create([
             'id'                  => 65,
             'name'                => '生活家電',
             'sort_no'             => 65,
             'primary_category_id' => 8,
         ]);
         factory(SecondaryCategory::class)->create([
             'id'                  => 66,
             'name'                => 'ゴルフ',
             'sort_no'             => 66,
             'primary_category_id' => 9,
         ]);
         factory(SecondaryCategory::class)->create([
             'id'                  => 67,
             'name'                => 'フィッシング',
             'sort_no'             => 67,
             'primary_category_id' => 9,
         ]);
         factory(SecondaryCategory::class)->create([
             'id'                  => 68,
             'name'                => 'トレーニング/エクササイズ',
             'sort_no'             => 68,
             'primary_category_id' => 9,
         ]);
         factory(SecondaryCategory::class)->create([
             'id'                  => 69,
             'name'                => 'スノーボード',
             'sort_no'             => 69,
             'primary_category_id' => 9,
         ]);
         factory(SecondaryCategory::class)->create([
             'id'                  => 70,
             'name'                => 'スキー',
             'sort_no'             => 70,
             'primary_category_id' => 9,
         ]);
         factory(SecondaryCategory::class)->create([
             'id'                  => 71,
             'name'                => 'キャンプ',
             'sort_no'             => 71,
             'primary_category_id' => 9,
         ]);
         factory(SecondaryCategory::class)->create([
             'id'                  => 72,
             'name'                => '音楽',
             'sort_no'             => 72,
             'primary_category_id' => 10,
         ]);
         factory(SecondaryCategory::class)->create([
             'id'                  => 73,
             'name'                => 'スポーツ',
             'sort_no'             => 73,
             'primary_category_id' => 10,
         ]);
         factory(SecondaryCategory::class)->create([
             'id'                  => 74,
             'name'                => '演劇/芸能',
             'sort_no'             => 74,
             'primary_category_id' => 10,
         ]);
         factory(SecondaryCategory::class)->create([
             'id'                  => 75,
             'name'                => 'イベント',
             'sort_no'             => 75,
             'primary_category_id' => 10,
         ]);
         factory(SecondaryCategory::class)->create([
             'id'                  => 76,
             'name'                => '映画',
             'sort_no'             => 76,
             'primary_category_id' => 10,
         ]);
         factory(SecondaryCategory::class)->create([
             'id'                  => 77,
             'name'                => '自動車本体',
             'sort_no'             => 77,
             'primary_category_id' => 11,
         ]);
         factory(SecondaryCategory::class)->create([
             'id'                  => 78,
             'name'                => '自動車タイヤ/ホイール',
             'sort_no'             => 78,
             'primary_category_id' => 11,
         ]);
         factory(SecondaryCategory::class)->create([
             'id'                  => 79,
             'name'                => '自動車パーツ',
             'sort_no'             => 79,
             'primary_category_id' => 11,
         ]);
         factory(SecondaryCategory::class)->create([
             'id'                  => 80,
             'name'                => '自動車アクセサリー',
             'sort_no'             => 80,
             'primary_category_id' => 11,
         ]);
         factory(SecondaryCategory::class)->create([
             'id'                  => 81,
             'name'                => 'オートバイ車体',
             'sort_no'             => 81,
             'primary_category_id' => 11,
         ]);
         factory(SecondaryCategory::class)->create([
             'id'                  => 82,
             'name'                => 'オートバイパーツ',
             'sort_no'             => 82,
             'primary_category_id' => 11,
         ]);
         factory(SecondaryCategory::class)->create([
             'id'                  => 83,
             'name'                => 'オートバイアクセサリー',
             'sort_no'             => 83,
             'primary_category_id' => 11,
         ]);
         factory(SecondaryCategory::class)->create([
             'id'                  => 84,
             'name'                => 'ペット用品',
             'sort_no'             => 84,
             'primary_category_id' => 12,
         ]);
         factory(SecondaryCategory::class)->create([
             'id'                  => 85,
             'name'                => '食品',
             'sort_no'             => 85,
             'primary_category_id' => 12,
         ]);
         factory(SecondaryCategory::class)->create([
             'id'                  => 86,
             'name'                => '飲料/酒',
             'sort_no'             => 86,
             'primary_category_id' => 12,
         ]);
         factory(SecondaryCategory::class)->create([
             'id'                  => 87,
             'name'                => '日用品/生活雑貨',
             'sort_no'             => 87,
             'primary_category_id' => 12,
         ]);
         factory(SecondaryCategory::class)->create([
             'id'                  => 88,
             'name'                => '文房具/事務用品',
             'sort_no'             => 88,
             'primary_category_id' => 12,
         ]);
    }
}
