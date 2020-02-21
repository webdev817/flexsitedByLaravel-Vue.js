<?php

use Illuminate\Database\Seeder;
use App\DesignCategory;


class DesignCategoryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      $arr = ['Hair Extensions', 'Braids', 'Nails', 'Barber','Beauty Salon',
        'Spa','Makeup', 'Eyebros', 'Lashes'
      ];
      foreach ($arr as $val) {
        $designCategory = new DesignCategory;
        $designCategory->title = $val;
        $designCategory->save();
      }
    }
}
