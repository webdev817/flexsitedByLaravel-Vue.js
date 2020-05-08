<?php

use Illuminate\Database\Seeder;
use App\Plan;

class PlanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      $projectName = "Flexsited ";
      Plan::create([
        'id'=> 1,
        'stripePlanMonthId' => 'basicPlanMonthly',
        'stripePlanYearId' => 'basicPlanYearly',
        'stripePlanNumber' => 1,
        'name' => 'basic plan',
        'price' => 69.95,
        'priceYearlyMonthly' => 49.95,
        'priceYearly' => 599.00,
        'description' =>  'For beauty professionals who just need an online presence.',
        'image' =>  'mawaisnow/sp/plan/Group 18@2x.png',
        'productName' => $projectName . "Basic Subscription Plan"
      ]);
      Plan::create([
        'id'=> 2,
        'stripePlanMonthId' => 'essentialPlanMonthly',
        'stripePlanYearId' => 'essentialPlanYearly',
        'stripePlanNumber' => 2,
        'name' => 'essential plan',
        'price' => 89.95,
        'priceYearlyMonthly' =>  69.95,
        'priceYearly' =>  839.00,
        'description' =>  'For beauty professionals looking to grow their business online and engage clients.',
        'image' =>  'mawaisnow/sp/plan/Group 167@2x.png',
        'productName' => $projectName . "Essential Subscription Plan"
      ]);
      Plan::create([
        'id'=> 3,
        'stripePlanMonthId' => 'activePlanMonthly',
        'stripePlanYearId' => 'activePlanYearly',
        'stripePlanNumber' => 3,
        'name' => 'active plan',
        'price' => 129.95,
        'priceYearlyMonthly' =>  89.95,
        'priceYearly' =>  1079.00,
        'description' =>  'For beauty professionals looking to grow their business online and get more clients.',
        'image' =>  'mawaisnow/sp/plan/Path 1920@2x.png',
        'productName' => $projectName . "Active Subscription Plan"
      ]);
      Plan::create([
        'id'=> 4,
        'stripePlanMonthId' => 'completePlanMonthly',
        'stripePlanYearId' => 'completePlanYearly',
        'stripePlanNumber' => 4,
        'name' => 'active plan',
        'price' => 179.95,
        'priceYearlyMonthly' =>  139.95,
        'priceYearly' => 1679.00,
        'description' =>  'For beauty professionals looking to scale their business by having an online store.',
        'image' =>  'mawaisnow/sp/plan/Group 7@2x.png',
        'productName' => $projectName . "Complete Subscription Plan"
      ]);

    }
}
