<?php

use Illuminate\Database\Seeder;

class FlowerTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $flower = new App\flowermodel();
        $flower->name = 'hoa hong';
        $flower->auth = 'da lat';
        $flower->price = 1.5;
        $flower->view_count = 0;
        $flower->save();

        $flower = new App\flowermodel();
        $flower->name = 'hoa sen';
        $flower->auth = 'da lat';
        $flower->price = 3;
        $flower->view_count = 0;
        $flower->save();

        $flower = new App\flowermodel();
        $flower->name = 'hoa tuylip';
        $flower->auth = 'da lat';
        $flower->price = 2;
        $flower->view_count = 0;
        $flower->save();
    }
}
