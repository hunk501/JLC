<?php

use Illuminate\Database\Seeder;
use App\MdlSettings;

class UpdateSettings extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $values = [
            'homepage_slider' => "&lt;!-- slide 1 here --&gt;
            &lt;div data-src=&quot;/img/slides/camera/slide1/img1.jpg&quot;&gt;
              &lt;div class=&quot;camera_caption fadeFromLeft&quot;&gt;
                &lt;div class=&quot;container&quot;&gt;
                  &lt;div class=&quot;row&quot;&gt;
                    &lt;div class=&quot;span6&quot;&gt;
                      &lt;h2 class=&quot;animated fadeInDown&quot;&gt;&lt;strong&gt;Vim porro dicam reprehendunt &lt;span class=&quot;colored&quot;&gt;multi usage&lt;/span&gt;&lt;/strong&gt;&lt;/h2&gt;
                      &lt;p class=&quot;animated fadeInUp&quot;&gt; Vim porro dicam reprehendunt te, populo quodsi dissentiet cum ad. Ne natum deseruisse vis. Iisque deseruisse sententiae mel ne, dolores appetere vim ut. Sea no tamquam reprimique.&lt;/p&gt;
                      &lt;a href=&quot;#&quot; class=&quot;btn btn-success btn-large animated fadeInUp&quot;&gt;
                          &lt;i class=&quot;icon-link&quot;&gt;&lt;/i&gt; Read more
                        &lt;/a&gt;
                      &lt;a href=&quot;#&quot; class=&quot;btn btn-theme btn-large animated fadeInUp&quot;&gt;
                          &lt;i class=&quot;icon-download&quot;&gt;&lt;/i&gt; Download
                        &lt;/a&gt;
                    &lt;/div&gt;
                    &lt;div class=&quot;span6&quot;&gt;
                      &lt;img src=&quot;/img/slides/camera/slide1/screen.png&quot; alt=&quot;&quot; class=&quot;animated bounceInDown delay1&quot; /&gt;
                    &lt;/div&gt;
                  &lt;/div&gt;
                &lt;/div&gt;
              &lt;/div&gt;
            &lt;/div&gt;
        
            &lt;!-- slide 2 here --&gt;
            &lt;div data-src=&quot;/img/slides/camera/slide2/img1.jpg&quot;&gt;
              &lt;div class=&quot;camera_caption fadeFromLeft&quot;&gt;
                &lt;div class=&quot;container&quot;&gt;
                  &lt;div class=&quot;row&quot;&gt;
                    &lt;div class=&quot;span6&quot;&gt;
                      &lt;img src=&quot;/img/slides/camera/slide2/iMac.png&quot; alt=&quot;&quot; /&gt;
                    &lt;/div&gt;
                    &lt;div class=&quot;span6&quot;&gt;
                      &lt;h2 class=&quot;animated fadeInDown&quot;&gt;&lt;strong&gt;Put your &lt;span class=&quot;colored&quot;&gt;Opt in form&lt;/span&gt;&lt;/strong&gt;&lt;/h2&gt;
                      &lt;p class=&quot;animated fadeInUp&quot;&gt; Vim porro dicam reprehendunt te, populo quodsi dissentiet cum ad. Ne natum deseruisse vis. Iisque deseruisse sententiae mel ne, dolores appetere vim ut. Sea no tamquam reprimique.&lt;/p&gt;
                      &lt;form&gt;
                        &lt;div class=&quot;input-append&quot;&gt;
                          &lt;input class=&quot;span3 input-large&quot; type=&quot;text&quot;&gt;
                          &lt;button class=&quot;btn btn-theme btn-large&quot; type=&quot;submit&quot;&gt;Subscribe&lt;/button&gt;
                        &lt;/div&gt;
                      &lt;/form&gt;
                    &lt;/div&gt;
        
                  &lt;/div&gt;
                &lt;/div&gt;
              &lt;/div&gt;
            &lt;/div&gt;
        
            &lt;!-- slide 3 here --&gt;
            &lt;div data-src=&quot;/img/slides/camera/slide2/img1.jpg&quot;&gt;
              &lt;div class=&quot;camera_caption fadeFromLeft&quot;&gt;
                &lt;div class=&quot;container&quot;&gt;
                  &lt;div class=&quot;row&quot;&gt;
                    &lt;div class=&quot;span12 aligncenter&quot;&gt;
                      &lt;h2 class=&quot;animated fadeInDown&quot;&gt;&lt;strong&gt;&lt;span class=&quot;colored&quot;&gt;Responsive&lt;/span&gt; and &lt;span class=&quot;colored&quot;&gt;cross broswer&lt;/span&gt; compatibility&lt;/strong&gt;&lt;/h2&gt;
                      &lt;p class=&quot;animated fadeInUp&quot;&gt;Pellentesque habitant morbi tristique senectus et netus et malesuada&lt;/p&gt;
                      &lt;img src=&quot;img/slides/camera/slide3/browsers.png&quot; alt=&quot;&quot; class=&quot;animated bounceInDown delay1&quot; /&gt;
                    &lt;/div&gt;
                  &lt;/div&gt;
                &lt;/div&gt;
              &lt;/div&gt;
            &lt;/div&gt;",
            'homepage_main_content' => "&lt;div class=&quot;row&quot;&gt;
            &lt;div class=&quot;span12&quot;&gt;
              &lt;div class=&quot;cta-box&quot;&gt;
                &lt;div class=&quot;row&quot;&gt;
                  &lt;div class=&quot;span8&quot;&gt;
                    &lt;div class=&quot;cta-text&quot;&gt;
                      &lt;h2&gt;Special price in very &lt;span&gt;limited&lt;/span&gt; times&lt;/h2&gt;
                    &lt;/div&gt;
                  &lt;/div&gt;
                &lt;/div&gt;
              &lt;/div&gt;
            &lt;/div&gt;
          &lt;/div&gt;
          &lt;div class=&quot;row&quot;&gt;
            &lt;div class=&quot;span12&quot;&gt;
              &lt;div class=&quot;row&quot;&gt;
                &lt;div class=&quot;span4&quot;&gt;
                  &lt;div class=&quot;box flyLeft&quot;&gt;
                    &lt;div class=&quot;icon&quot;&gt;
                      &lt;i class=&quot;ico icon-circled icon-bgdark icon-star icon-3x&quot;&gt;&lt;/i&gt;
                    &lt;/div&gt;
                    &lt;div class=&quot;text&quot;&gt;
                      &lt;h4&gt;Products&lt;/h4&gt;
                      &lt;p&gt;
                        Lorem ipsum dolor sit amet, has ei ipsum scaevola deseruisse am sea facilisis.
                      &lt;/p&gt;
                      &lt;a href=&quot;/products&quot;&gt;Learn More&lt;/a&gt;
                    &lt;/div&gt;
                  &lt;/div&gt;
                &lt;/div&gt;
                &lt;div class=&quot;span4&quot;&gt;
                  &lt;div class=&quot;box flyIn&quot;&gt;
                    &lt;div class=&quot;icon&quot;&gt;
                      &lt;i class=&quot;ico icon-circled icon-bglight icon-dropbox icon-3x&quot;&gt;&lt;/i&gt;
                    &lt;/div&gt;
                    &lt;div class=&quot;text&quot;&gt;
                      &lt;h4&gt;Rental&lt;/h4&gt;
                      &lt;p&gt;
                        Lorem ipsum dolor sit amet, has ei ipsum scaevola deseruisse am sea facilisis.
                      &lt;/p&gt;
                      &lt;a href=&quot;/rental&quot;&gt;Learn More&lt;/a&gt;
                    &lt;/div&gt;
                  &lt;/div&gt;
                &lt;/div&gt;
                &lt;div class=&quot;span4&quot;&gt;
                  &lt;div class=&quot;box flyRight&quot;&gt;
                    &lt;div class=&quot;icon&quot;&gt;
                      &lt;i class=&quot;ico icon-circled icon-bgdark icon-laptop active icon-3x&quot;&gt;&lt;/i&gt;
                    &lt;/div&gt;
                    &lt;div class=&quot;text&quot;&gt;
                      &lt;h4&gt;Services&lt;/h4&gt;
                      &lt;p&gt;
                        Lorem ipsum dolor sit amet, has ei ipsum scaevola deseruisse am sea facilisis.
                      &lt;/p&gt;
                      &lt;a href=&quot;/services&quot;&gt;Learn More&lt;/a&gt;
                    &lt;/div&gt;
                  &lt;/div&gt;
                &lt;/div&gt;
              &lt;/div&gt;
  
              &lt;div class=&quot;row&quot;&gt;
                &lt;div class=&quot;span4&quot;&gt;
                  &lt;div class=&quot;box flyLeft&quot;&gt;
                    &lt;div class=&quot;icon&quot;&gt;
                      &lt;i class=&quot;ico icon-circled icon-bgprimary icon-code icon-3x&quot;&gt;&lt;/i&gt;
                    &lt;/div&gt;
                    &lt;div class=&quot;text&quot;&gt;
                      &lt;h4&gt;Projects&lt;/h4&gt;
                      &lt;p&gt;
                        Lorem ipsum dolor sit amet, has ei ipsum scaevola deseruisse am sea facilisis.
                      &lt;/p&gt;
                      &lt;a href=&quot;/projects&quot;&gt;Learn More&lt;/a&gt;
                    &lt;/div&gt;
                  &lt;/div&gt;
                &lt;/div&gt;
              &lt;/div&gt;
            &lt;/div&gt;
          &lt;/div&gt;",
            'homepage_comment_slider' => "&lt;div class=&quot;span12 aligncenter&quot;&gt;
            &lt;h3 class=&quot;title&quot;&gt;What people &lt;strong&gt;saying&lt;/strong&gt; about us&lt;/h3&gt;
            &lt;div class=&quot;blankline30&quot;&gt;&lt;/div&gt;

            &lt;ul class=&quot;bxslider&quot;&gt;
              &lt;li&gt;
                &lt;blockquote&gt;
                  Aliquam a orci quis nisi sagittis sagittis. Etiam adipiscing, justo quis feugiat.Suspendisse eu erat quam. Vivamus porttitor eros quis nisi lacinia sed interdum lorem vulputate. Aliquam a orci quis nisi sagittis sagittis. Etiam adipiscing, justo quis
                  feugiat
                &lt;/blockquote&gt;
                &lt;div class=&quot;testimonial-autor&quot;&gt;
                  &lt;img src=&quot;img/dummies/testimonial/1.png&quot; alt=&quot;&quot; /&gt;
                  &lt;h4&gt;Hillary Doe&lt;/h4&gt;
                  &lt;a href=&quot;#&quot;&gt;www.companyname.com&lt;/a&gt;
                &lt;/div&gt;
              &lt;/li&gt;
              &lt;li&gt;
                &lt;blockquote&gt;
                  Aliquam a orci quis nisi sagittis sagittis. Etiam adipiscing, justo quis feugiat.Suspendisse eu erat quam. Vivamus porttitor eros quis nisi lacinia sed interdum lorem vulputate. Aliquam a orci quis nisi sagittis sagittis. Etiam adipiscing, justo quis
                  feugiat
                &lt;/blockquote&gt;
                &lt;div class=&quot;testimonial-autor&quot;&gt;
                  &lt;img src=&quot;img/dummies/testimonial/2.png&quot; alt=&quot;&quot; /&gt;
                  &lt;h4&gt;Michael Doe&lt;/h4&gt;
                  &lt;a href=&quot;#&quot;&gt;www.companyname.com&lt;/a&gt;
                &lt;/div&gt;
              &lt;/li&gt;
              &lt;li&gt;
                &lt;blockquote&gt;
                  Aliquam a orci quis nisi sagittis sagittis. Etiam adipiscing, justo quis feugiat.Suspendisse eu erat quam. Vivamus porttitor eros quis nisi lacinia sed interdum lorem vulputate. Aliquam a orci quis nisi sagittis sagittis. Etiam adipiscing, justo quis
                  feugiat
                &lt;/blockquote&gt;
                &lt;div class=&quot;testimonial-autor&quot;&gt;
                  &lt;img src=&quot;img/dummies/testimonial/3.png&quot; alt=&quot;&quot; /&gt;
                  &lt;h4&gt;Mark Donovan&lt;/h4&gt;
                  &lt;a href=&quot;#&quot;&gt;www.companyname.com&lt;/a&gt;
                &lt;/div&gt;
              &lt;/li&gt;
              &lt;li&gt;
                &lt;blockquote&gt;
                  Aliquam a orci quis nisi sagittis sagittis. Etiam adipiscing, justo quis feugiat.Suspendisse eu erat quam. Vivamus porttitor eros quis nisi lacinia sed interdum lorem vulputate. Aliquam a orci quis nisi sagittis sagittis. Etiam adipiscing, justo quis
                  feugiat
                &lt;/blockquote&gt;
                &lt;div class=&quot;testimonial-autor&quot;&gt;
                  &lt;img src=&quot;img/dummies/testimonial/4.png&quot; alt=&quot;&quot; /&gt;
                  &lt;h4&gt;Marry Doe Elliot&lt;/h4&gt;
                  &lt;a href=&quot;#&quot;&gt;www.companyname.com&lt;/a&gt;
                &lt;/div&gt;
              &lt;/li&gt;
            &lt;/ul&gt;

          &lt;/div&gt;",
            'footer' => "&lt;div class=&quot;container&quot;&gt;
            &lt;div class=&quot;row&quot;&gt;
              &lt;div class=&quot;span4&quot;&gt;
                &lt;div class=&quot;widget&quot;&gt;
                  &lt;h5 class=&quot;widgetheading&quot;&gt;Browse pages - Test&lt;/h5&gt;
                  &lt;ul class=&quot;link-list&quot;&gt;
                    &lt;li&gt;&lt;a href=&quot;#&quot;&gt;Our company&lt;/a&gt;&lt;/li&gt;
                    &lt;li&gt;&lt;a href=&quot;#&quot;&gt;Terms and conditions&lt;/a&gt;&lt;/li&gt;
                    &lt;li&gt;&lt;a href=&quot;#icon-rocket icon-white&quot;&gt;Privacy policy&lt;/a&gt;&lt;/li&gt;
                    &lt;li&gt;&lt;a href=&quot;#&quot;&gt;Press release&lt;/a&gt;&lt;/li&gt;
                    &lt;li&gt;&lt;a href=&quot;#&quot;&gt;What we have done&lt;/a&gt;&lt;/li&gt;
                    &lt;li&gt;&lt;a href=&quot;#&quot;&gt;Our support forum&lt;/a&gt;&lt;/li&gt;
                  &lt;/ul&gt;
    
                &lt;/div&gt;
              &lt;/div&gt;
              &lt;div class=&quot;span4&quot;&gt;
                &lt;div class=&quot;widget&quot;&gt;
                  &lt;h5 class=&quot;widgetheading&quot;&gt;Get in touch&lt;/h5&gt;
                  &lt;address&gt;
                                &lt;strong&gt;JLC.&lt;/strong&gt;&lt;br&gt;
                                Somestreet 200 VW, Suite Village A.001&lt;br&gt;
                                street 13426 Manila
                            &lt;/address&gt;
                  &lt;p&gt;
                    &lt;i class=&quot;icon-phone&quot;&gt;&lt;/i&gt; 09123456789 &lt;br&gt;
                    &lt;i class=&quot;icon-envelope-alt&quot;&gt;&lt;/i&gt; email@domainname.com
                  &lt;/p&gt;
                &lt;/div&gt;
              &lt;/div&gt;
            &lt;/div&gt;
          &lt;/div&gt;
          &lt;div id=&quot;sub-footer&quot;&gt;
            &lt;div class=&quot;container&quot;&gt;
              &lt;div class=&quot;row&quot;&gt;
                &lt;div class=&quot;span6&quot;&gt;
                  &lt;div class=&quot;copyright&quot;&gt;
                    &lt;p&gt;&lt;span&gt;&amp;copy; JLC. All right reserved - XD&lt;/span&gt;&lt;/p&gt;
                  &lt;/div&gt;
                &lt;/div&gt;
              &lt;/div&gt;
            &lt;/div&gt;
          &lt;/div&gt;",
            'services' => "&lt;div class=&quot;span12&quot;&gt;
            &lt;h4 class=&quot;title&quot;&gt;What we do - Services&lt;/h4&gt;
            &lt;p&gt;
              Ei mel semper vocent persequeris, nominavi patrioque vituperata id vim, cu eam gloriatur philosophia deterruisset. Meliore perfecto repudiare ea nam, ne mea duis temporibus. Id quo accusam consequuntur, eum ea debitis urbanitas. Nibh reformidans vim ne.
            &lt;/p&gt;
          &lt;/div&gt;",
            'projects' => "&lt;div class=&quot;span12&quot;&gt;
            &lt;h4 class=&quot;title&quot;&gt;What we do - Projects&lt;/h4&gt;
            &lt;p&gt;
              Ei mel semper vocent persequeris, nominavi patrioque vituperata id vim, cu eam gloriatur philosophia deterruisset. Meliore perfecto repudiare ea nam, ne mea duis temporibus. Id quo accusam consequuntur, eum ea debitis urbanitas. Nibh reformidans vim ne.
            &lt;/p&gt;
          &lt;/div&gt;"
        ];


        foreach($values as $key => $value) {

            $record = new App\MdlSettings;
            $record->key = $key;
            $record->value = $value;
            $record->save();
            
        }

    }
}
