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
        'mawaisnow/select-design/Trisha.jpg',
        'mawaisnow/select-design/skin beauty.jpg',
        'mawaisnow/select-design/muji.jpg',
        ];
        $arrFull = [
        'mawaisnow/select-design/Axii-full.jpg',
        'mawaisnow/select-design/Beauty Salon   Just another site-full.jpg',
        'mawaisnow/select-design/Bougenville — A Beautiful   Casual Tumblr Theme-full.jpg',
        'mawaisnow/select-design/Haiber - Haircut Beauty Salon Muse Template-full.jpg',
        'mawaisnow/select-design/Hairy   Barber Html5 Template-full.jpg',
        'mawaisnow/select-design/Helen Spa   Welness   Health Theme – Helen Spa   Welness   Health Theme-full.jpg',
        'mawaisnow/select-design/Muhil-full.jpg',
        'mawaisnow/select-design/Sofee-full.jpg',
        'mawaisnow/select-design/Barber – Health   Beauty WordPress Themes-full.jpg',
        'mawaisnow/select-design/Trisha-full.jpg',
        'mawaisnow/select-design/skin beauty-full.jpg',
        'mawaisnow/select-design/muji-full.jpg',
        ];

        for ($i=0; $i < 1; $i++) {

            $design = new Design;
            $design->image = $arr[0];
            $design->imageFull = $arrFull[0];
            $design->categoryId = 1;
            $design->save();

            $design = new Design;
            $design->image = $arr[1];
            $design->imageFull = $arrFull[1];

            $design->categoryId = 5;
            $design->save();

            $design = new Design;
            $design->image = $arr[2];
            $design->imageFull = $arrFull[2];

            $design->categoryId = 6;
            $design->save();

            $design = new Design;
            $design->image = $arr[3];
            $design->imageFull = $arrFull[3];

            $design->categoryId = 6;
            $design->save();

            $design = new Design;
            $design->image = $arr[4];
            $design->imageFull = $arrFull[4];

            $design->categoryId = 2;
            $design->save();


            $design = new Design;
            $design->image = $arr[5];
            $design->imageFull = $arrFull[5];

            $design->categoryId = 9;
            $design->save();

            $design = new Design;
            $design->image = $arr[6]; //8th image name
            $design->imageFull = $arrFull[6];

            $design->categoryId = 9;
            $design->save();

            $design = new Design;
            $design->image = $arr[7]; //9th image name
            $design->imageFull = $arrFull[7];


            $design->categoryId = 5;
            $design->save();

            $design = new Design;
            $design->image = $arr[8]; //41th image name
            $design->imageFull = $arrFull[8];


            $design->categoryId = 1;
            $design->save();

            $design = new Design;
            $design->image = $arr[9]; //41th image name
            $design->imageFull = $arrFull[9];


            $design->categoryId = 1;
            $design->save();
            $design = new Design;
            $design->image = $arr[10]; //41th image name
            $design->imageFull = $arrFull[10];


            $design->categoryId = 1;
            $design->save();
            $design = new Design;
            $design->image = $arr[11]; //41th image name
            $design->imageFull = $arrFull[11];


            $design->categoryId = 1;
            $design->save();
        }


    }
}
