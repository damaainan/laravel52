<?php

use Illuminate\Database\Seeder;

class BookSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('book')->delete();

        for ($i=0; $i < 10; $i++) {
            \App\models\Book::create([
                'list'   => 'st.hujiang.com/topic/'. rand(100000,150000).'/ ',
                'qihao'    => '第'.($i+1).'期',
                'name'    => 'name '.($i+1),
                'book'    => '《book--'.($i+1).'》',
            ]);
        }
    }
}
