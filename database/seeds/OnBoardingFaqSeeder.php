<?php

use Illuminate\Database\Seeder;
use App\OnBoardingFaq;

class OnBoardingFaqSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      $faqs = [
        (object)[
          'q'=> 'What is a domain name?',
          'ans'=> 'domain name is a website address for your site. Ie.. yourcompany.com'
        ],
        (object)[
          'q'=> 'Will Flexsited purchase the domain for my website?',
          'ans'=> 'Flexsited will cover the purchase of all domains under its annual subscription.'
        ],
        (object)[
          'q'=> 'Will my domain be renewed annually?',
          'ans'=> 'Yes as long as you are subscribed to Flexsited.'
        ],
        (object)[
          'q'=> 'Can Flexsited use a domain that I already have?',
          'ans'=> 'Yes, we can use a domain that you already have.'
        ],
        (object)[
          'q'=> 'Can my domain be transferred to me?',
          'ans'=> 'Yes, it can after 60 days after purchase for a one-time fee of $40.'
        ],
        (object)[
          'q'=> 'When will you purchase the domain?',
          'ans'=> 'The domain is purchased right before your website goes live.  If you need for it to be purchased sooner, let you project manager know.'
        ],
        (object)[
          'q'=> 'Does Flexsited provide business email?',
          'ans'=> 'Flexsited doesn’t business email.  We recommend G-Suite.  Please review the support detail regarding G Suite <a href="https://gsuite.google.com/">here</a>. '
        ]
      ];
      foreach ($faqs as $obj) {
        OnBoardingFaq::create([
          'createdBy'=> 1,
          'category'=> 'domain',
          'question'=> $obj->q,
          'answer'=> $obj->ans,
          'status'=> 1
        ]);
      }

      $faqs = [
        (object)[
          'q'=> 'What is website design inspiration?',
          'ans'=> 'This is the part of the process to where you provide us with an idea of what design you like.'
        ],
        (object)[
          'q'=> 'Will my website be just like the design I selected?',
          'ans'=> 'No it won’t.  We will build you a custom website that includes your logo and content.'
        ],
        (object)[
          'q'=> 'Do you provide the images for my website?',
          'ans'=> 'You are welcome to provide your own images but we do offer stock images for FREE.'
        ],
        (object)[
          'q'=> 'Do you design custom logos?',
          'ans'=> 'Yes, we do.  Our one-time fee is $150.'
        ],
        (object)[
          'q'=> 'Where would I complete the details for my logo?',
          'ans'=> 'You will be provided this option later in the order process.'
        ],
        (object)[
          'q'=> 'Where do I send content and my vision for my website?',
          'ans'=> 'You will be provided this option later in the order process.'
        ]
      ];

      foreach ($faqs as $obj) {
        OnBoardingFaq::create([
          'createdBy'=> 1,
          'category'=> 'design',
          'question'=> $obj->q,
          'answer'=> $obj->ans,
          'status'=> 1
        ]);
      }


    }
}
