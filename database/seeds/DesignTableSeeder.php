<?php

use Illuminate\Database\Seeder;
use App\Design;

class DesignTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $arr = [
        'mawaisnow/select-design/1.jpg',
        'mawaisnow/select-design/2.jpg',
        'mawaisnow/select-design/3.jpg',
        'mawaisnow/select-design/4.jpg',
        'mawaisnow/select-design/5.jpg',
        'mawaisnow/select-design/6.jpg',
        'mawaisnow/select-design/8.jpg',
        'mawaisnow/select-design/9.jpg',
        'mawaisnow/select-design/41.jpg',
        'mawaisnow/select-design/46708-original.jpg',
        'mawaisnow/select-design/d599192977cf24a1e8891c75c3490e1d'
        ];

        for ($i=0; $i < 3; $i++) {

            $design = new Design;
            $design->image = $arr[0];
            $design->categoryId = 1;
            $design->save();

            $design = new Design;
            $design->image = $arr[1];
            $design->categoryId = 5;
            $design->save();

            $design = new Design;
            $design->image = $arr[2];
            $design->categoryId = 6;
            $design->save();

            $design = new Design;
            $design->image = $arr[3];
            $design->categoryId = 6;
            $design->save();

            $design = new Design;
            $design->image = $arr[4];
            $design->categoryId = 2;
            $design->save();


            $design = new Design;
            $design->image = $arr[5];
            $design->categoryId = 9;
            $design->save();

            $design = new Design;
            $design->image = $arr[6]; //8th image name
            $design->categoryId = 9;
            $design->save();

            $design = new Design;
            $design->image = $arr[7]; //9th image name
            $design->categoryId = 5;
            $design->save();

            $design = new Design;
            $design->image = $arr[8]; //41th image name
            $design->categoryId = 1;
            $design->save();
        }


    }
}
