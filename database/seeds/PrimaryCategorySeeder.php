<?php

use Illuminate\Database\Seeder;
use App\Models\PrimaryCategory;

class PrimaryCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         factory(PrimaryCategory::class)->create([
             'id'      => 1,
             'name'    => 'レディース',
             'sort_no' => 1,
         ]);
         factory(PrimaryCategory::class)->create([
             'id'      => 2,
             'name'    => 'メンズ',
             'sort_no' => 2,
         ]);
         factory(PrimaryCategory::class)->create([
             'id'      => 3,
             'name'    => 'ベビー・キッズ',
             'sort_no' => 3,
         ]);
         factory(PrimaryCategory::class)->create([
             'id'      => 4,
             'name'    => 'インテリア・住まい・小物',
             'sort_no' => 4,
         ]);
         factory(PrimaryCategory::class)->create([
             'id'      => 5,
             'name'    => '本・音楽・ゲーム',
             'sort_no' => 5,
         ]);
         factory(PrimaryCategory::class)->create([
             'id'      => 6,
             'name'    => 'おもちゃ・ホビー・グッズ',
             'sort_no' => 6,
         ]);
         factory(PrimaryCategory::class)->create([
             'id'      => 7,
             'name'    => 'コスメ・コスメ・美容',
             'sort_no' => 7,
         ]);

         factory(PrimaryCategory::class)->create([
             'id'      => 8,
             'name'    => '家電・スマホ・カメラ',
             'sort_no' => 8,
         ]);
         factory(PrimaryCategory::class)->create([
             'id'      => 9,
             'name'    => 'スポーツ・レジャー',
             'sort_no' => 9,
         ]);
         factory(PrimaryCategory::class)->create([
             'id'      => 10,
             'name'    => 'チケット',
             'sort_no' => 10,
         ]);
         factory(PrimaryCategory::class)->create([
             'id'      => 11,
             'name'    => '自動車・オードバイ',
             'sort_no' => 11,
         ]);
         factory(PrimaryCategory::class)->create([
             'id'      => 12,
             'name'    => 'その他',
             'sort_no' => 12,
         ]);
    }
}
