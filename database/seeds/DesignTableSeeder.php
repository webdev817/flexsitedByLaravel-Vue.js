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
        'mawaisnow/select-design/Axii.jpg',
        'mawaisnow/select-design/Beauty Salon   Just another site.jpg',
        'mawaisnow/select-design/Bougenville — A Beautiful   Casual Tumblr Theme.jpg',
        'mawaisnow/select-design/Haiber - Haircut Beauty Salon Muse Template.jpg',
        'mawaisnow/select-design/Hairy   Barber Html5 Template.jpg',
        'mawaisnow/select-design/Helen Spa   Welness   Health Theme – Helen Spa   Welness   Health Theme.jpg',
        'mawaisnow/select-design/Muhil.jpg',
        'mawaisnow/select-design/Sofee.jpg',
        'mawaisnow/select-design/Barber – Health   Beauty WordPress Themes.jpg',
        'mawaisnow/select-design/Trisha.jpg'
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
            $design = new Design;
            $design->image = $arr[9]; //41th image name
            $design->categoryId = 1;
            $design->save();
        }


    }
}
