<?php

use Illuminate\Database\Seeder;
use App\Addon;
class AddonSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $addon = new Addon;
        $addon->logoDesignPrice = "100";
        $addon->cardDesignPrice = "150";
        $addon->flyerDesignPrice = "200";
        $addon->socialMediaDesignPrice = "200";
        $addon->save();
    }
}
