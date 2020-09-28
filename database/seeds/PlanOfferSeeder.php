<?php

use Illuminate\Database\Seeder;
use App\PlanOffer;

class PlanOfferSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // $plan1offers = [
        //   '1 Page Custom Website ',
        //   '30 Mins Maintenance ',
        //   'Social Media Links Icons ',
        //   'Booking Link ',
        //   '2 Stock Image  ',
        //   'Basic Search Engine Submissions ',
        //   'Content Creation (Upon Request) '
        // ];
        // $plan2offers = [
        //   '3 Page Custom Website ',
        //   '40 Mins Maintenance ',
        //   'Social Media Links Integration ',
        //   'Booking Link ',
        //   '5 Stock Images ',
        //   'Basic Search Engine Submissions ',
        //   'Content Creation (Upon Request) ',
        //   'Home Page Slider ',
        //   'Logo Design ',
        //   'Blog ',
        //   'Photo Gallery ',
        //   'Instagram Feed '
        // ];
        // $plan3offers = [
        //   '5 Page Custom Website ',
        //   '60 Mins Maintenance ',
        //   'Social Media Links Integration ',
        //   'Booking Integration ',
        //   '10 Stock Images ',
        //   'Basic Search Engine Submissions ',
        //   'Content Creation (Upon Request) ',
        //   'Home Page Slider ',
        //   'Logo Design ',
        //   'Blog ',
        //   'Photo Gallery ',
        //   'Instagram Feed ',
        //   'Newsletter Setup ',
        //   'Google Business Setup ',
        //   'Google Analytics ',
        //   'Google Map ',
        //   'SEO On Page Setup '
        // ];
        // $plan4offers = [
        //   '10 Page Custom Website ',
        //   '60 Mins Maintenance ',
        //   'Social Media Links Integration ',
        //   'Booking Integration ',
        //   '10 Stock Images ',
        //   'Basic Search Engine Submissions ',
        //   'Content Creation (Upon Request) ',
        //   'Home Page Slider ',
        //   'Logo Design ',
        //   'Blog ',
        //   'Photo Gallery ',
        //   'Instagram Feed ',
        //   'Newsletter Setup ',
        //   'Google Business Setup  ',
        //   'Goggle Analytics ',
        //   'Goggle Map ',
        //   'SEO On Page Setup  ',
        //   'Shopping Cart  ',
        //   'Payment Gateway Setup '
        // ];
        $plan1offers = [
          '1 Page Custom Website ',
          'Website Maintenance',
          'Social Media Integration ',
          'Booking Link ',
          'Stock Images  ',
          'Search Engine Submissions ',
          'SEO On Page Setup',
          'Content Creation (Upon Request) ',
          'Website Redesign',
          'CMS Installation',
          'Logo Design',
          'Favicon Design',
          'Local & Directory Listing',
          'Photo Gallery',
          'Instagram Feed',
          'Google Business Setup',
          // 'Google Analytics',
          // 'Google Map',
          // 'Newsletter Setup',
          // 'Shopping Cart',
          // 'Payment Gateway Setup',
          // 'Booking Software Set Up',
        ];
        $plan2offers = [
          '1-5 Page Custom Website ',
          'Website Maintenance',
          'Social Media Integration ',
          'Booking Link ',
          'Stock Images  ',
          'Search Engine Submissions ',
          'SEO On Page Setup',
          'Content Creation (Upon Request) ',
          'Website Redesign',
          'CMS Installation',
          'Logo Design',
          'Favicon Design',
          'Local & Directory Listing',
          'Photo Gallery',
          'Instagram Feed',
          'Google Business Setup',
          'Google Analytics',
          'Google Map',
          'Newsletter Setup',
          // 'Shopping Cart',
          // 'Payment Gateway Setup',
          // 'Booking Software Set Up',
        ];
        $plan3offers = [
          '1-10 Page Custom Website ',
          'Website Maintenance',
          'Social Media Integration ',
          'Booking Link ',
          'Stock Images  ',
          'Search Engine Submissions ',
          'SEO On Page Setup',
          'Content Creation (Upon Request) ',
          'Website Redesign',
          'CMS Installation',
          'Logo Design',
          'Favicon Design',
          'Local & Directory Listing',
          'Photo Gallery',
          'Instagram Feed',
          'Google Business Setup',
          'Google Analytics',
          'Google Map',
          'Newsletter Setup',
          // 'Shopping Cart',
          // 'Payment Gateway Setup',
          // 'Booking Software Set Up',
        ];
        $plan4offers = [
          '1-10 Page Custom Website ',
          'Website Maintenance',
          'Social Media Integration ',
          'Booking Link ',
          'Stock Images  ',
          'Search Engine Submissions ',
          'SEO On Page Setup',
          'Content Creation (Upon Request) ',
          'Website Redesign',
          'CMS Installation',
          'Logo Design',
          'Favicon Design',
          'Local & Directory Listing',
          'Photo Gallery',
          'Instagram Feed',
          'Google Business Setup',
          'Google Analytics',
          'Google Map',
          'Newsletter Setup',
          'Shopping Cart',
          'Payment Gateway Setup',
          'Booking Software Set Up',
        ];


        foreach ($plan1offers as $offer) {
          PlanOffer::create([
            'planId'=> 1,
            'title' => $offer
          ]);
        }
        foreach ($plan2offers as $offer) {
          PlanOffer::create([
            'planId'=> 2,
            'title' => $offer
          ]);
        }
        foreach ($plan3offers as $offer) {
          PlanOffer::create([
            'planId'=> 3,
            'title' => $offer
          ]);
        }
        foreach ($plan4offers as $offer) {
          PlanOffer::create([
            'planId'=> 4,
            'title' => $offer
          ]);
        }



    }
}
