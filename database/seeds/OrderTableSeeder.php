<?php

use Illuminate\Database\Seeder;
use App\SupportOrder;

class OrderTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $orders = [
            [
              'title'=> 'Logo Design',
              'price'=> 150,
              'img'=> 'mawaisnow\sp\order\logoOrder.png',
              'description'=> 'We will design a professional logo for your business. You will receive two design concepts for your review and feedback.Once you have decided on the design that you would like to go with. The revisions process starts. You will have three revision opportunities. Below please add the details for your design project.'
            ],
            [
              'title'=> 'Flyer Design',
              'price'=> 200,
              'img' => 'mawaisnow\sp\order\6.jpg',
              'description'=> 'We will design a professional one-page flyer for your business.  You will receive one design concept based on provided instructions.  You will have three revision opportunities.  Below please add the details for your design project.'
            ],
            [
              'title'=> 'Business Card Design',
              'price'=> 150,
              'img' => 'mawaisnow\sp\order\Amazing Lash Loft-1.jpg',
              'description'=> 'We will design a set of professional business cards for your business. This includes both front and back.  You will receive two design concepts for your review and feedback.  You will have three revision opportunities.   In the box below, add the details for your design project.'
            ],
            [
              'title'=> 'Social Media Design',
              'price'=> 150,
              'img' => 'mawaisnow/sp/order/socialmediaexample.jpg',
              'description'=> 'We will design your social media banner and profile for any channel or two social media design posts for either Facebook or Instagram for your business.  You will receive one design concept based on your instructions. You will have three revision opportunities. In the box below, add the details for your design project.'
            ],
            [
              'title'=> 'Website Design',
              'price'=> "39-129 a month",
              'img' => 'mawaisnow\sp\order\Screen Shot 2020-04-20 at 11.29.10 AM.png',
              'description'=> 'We will create a new website for your business. You have the option of choosing from one of our monthly plans. '
            ]
        ];

        foreach ($orders as $key => $order) {
            $supportOrder = new SupportOrder;

            $supportOrder->id = $key + 1;

            $supportOrder->title = $order['title'];
            $supportOrder->price = $order['price'];
            $supportOrder->img = $order['img'];
            $supportOrder->description = $order['description'];
            $supportOrder->save();
        }

    }



}
