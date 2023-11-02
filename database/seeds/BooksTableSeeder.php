<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BooksTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $param =[
            'id' =>1,
            'name' =>'情報処理教科書 出るとこだけ！基本情報技術者［科目B］第4版',
            'price' =>1980,
        ];
        DB::table('people')->insert($param);

        $param =[
            'id' =>2,
            'name' =>'うかる！ 基本情報技術者　[科目B・アルゴリズム編]　2023年版 福嶋先生の集中ゼミ',
            'price' =>1680,
        ];
        DB::table('people')->insert($param);

        $param =[
            'id' =>3,
            'name' =>'キタミ式イラストIT塾 基本情報技術者 科目A試験一問一答 令和04年度サンプル問題',
            'price' =>1000,
        ];
        DB::table('people')->insert($param);
    }
}
