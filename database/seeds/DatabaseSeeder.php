<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(UsersTableSeeder::class);
        $this->call(DesignCategoryTableSeeder::class);
        $this->call(DesignTableSeeder::class);
        $this->call(WizeredTableSeeder::class);
        $this->call(PlanSeeder::class);
        $this->call(PlanOfferSeeder::class);
        $this->call(OrderTableSeeder::class);
        $this->call(OnBoardingFaqSeeder::class);
        $this->call(AddonSeeder::class);

    }
}
