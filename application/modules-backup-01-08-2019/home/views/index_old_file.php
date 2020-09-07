<?php $this->load->view('common/header'); ?>

<section class="top_slider hero-area app-slider pos-rel full-height d-flex align-items-center parallax" id="home" data-speed="3" data-bg-image="assets/images/thumb2.png">
    <div class="slider_overlay"></div>
    <div class="container">
        <div class="slider-area d-flex align-items-center" id="slider_firefly" data-zs-src='["assets/images/gift1.jpg", "assets/images/gift2.jpg", "assets/images/gift3.jpg"]'>
            <div class="container">
                <div class="music-content">
                    <h2>Buy <span>Gift Cards</span>
                        <br> Starts Here</h2>
                        <a href="https://player.vimeo.com/video/325281277" class="expand-video">
                            <i class="fa fa-play"></i>
                        </a>
                    </div>
                </div>
            </div>

        </div>
        <a href="#app-feature" class="scrl_me_down">
            <span class="fa fa-angle-down"></span>
        </a>
    </section>
    <!-- hero area end -->
    <!-- service area start -->
    <div class="service-area pt--30 pb--50 bg-theme">
        <div class="container">
            <div class="row">
                <div class="col-md-4">
                    <div class="single-service">
                        <div class="icon">
                            <img src="<?php echo base_url(); ?>assets/images/PricesImg.png" alt="image">
                        </div>
                        <h4>Unbelievable Prices</h4>
                        <p>Our prices are the cheapest in the market, starting at 0.01$.</p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="single-service">
                        <div class="icon">
                            <img src="<?php echo base_url(); ?>assets/images/MinutesImg.png" alt="image">
                        </div>
                        <h4>Delivered Within Minutes</h4>
                        <p>Our delivery is automated and usually it takes minutes if not seconds to deliver your order.</p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="single-service">
                        <div class="icon">
                            <img src="<?php echo base_url(); ?>assets/images/SupportImg.png" alt="image">
                        </div>
                        <h4>TSupport 24/7</h4>
                        <p>We are proud to have the best support in the SMM World, replying to your tickets 24/7.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- service area end -->

    <!-- trainer area start -->
    <section class="trainer-area ptb--70" id="trainers">
        <div class="container">
            <div class="section-title">
                <span>SMM</span>
                <h2>Gift Cards</h2>
            </div>
            <div class="row">

                <?php foreach ($cards as $card) { ?>

                    <?php if (get_available_voucher($card['id']) > 0) { ?>

                    <div class="col-lg-4 col-md-6">
                        <div class="single-trainer">
                            <div class="thumb">
                                <img src="<?php echo base_url(); ?>assets/images/<?php echo $card['gift_card_value'];?>.jpg" alt="image">
                            </div>
                            <div class="content">
                                <h4>SMM</h4>
                                <p><?php echo ucwords($card['gift_card_title']);?></p>

                                <ul class="meta-info">
                                    <li>
                                        <a href="#">
                                            <i class="fa fa-money"></i>Actual Price: <span> <?php echo CURRENCY.$card['actual_price'];?></span>
                                        </a>
                                    </li>
                                </ul>
                                <div class="text-center">
                                    <a class="button btn btn-block btn-lg" id="btn_buy_now" data-toggle="modal" data-target="#buyModal" data-id="<?php echo $card['id'];?>">Buy Now</a>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php } ?>
            <?php } ?>

        </div>
    </div>
</section>
<!-- trainer area end -->

<!-- app-cta area start -->
<div class="app-cta-area ptb--70 bg-theme">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-md-7">
                <div class="appcta-content">
                    <h2>Best Service Provider</h2>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Ratione voluptates a quibusdam dicta deleniti
                        beatae?
                    </p>
                    <div class="links links-right">
                        <a href="#">Learn More</a>
                        <a class="active" href="#">Get Voucher</a>
                    </div>
                </div>
            </div>
            <div class="col-md-5">
                <div class="mscreen-right effectupdown">
                    <img src="<?php echo base_url(); ?>assets/images/service-provider.png" alt="image">
                </div>
            </div>
        </div>
    </div>
</div>
<!-- app-cta area end -->
<!-- app-cta area start -->
<div class="app-cta-area pb--100 bg-theme mb--100" id="app-feature">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-md-5">
                <div class="mscreen-left effectupdown2">
                    <img src="<?php echo base_url(); ?>assets/images/promotion.png" alt="image">
                </div>
            </div>
            <div class="col-md-7">
                <div class="appcta-content appcta-right">
                    <h2>It’s all about Promoting your Business</h2>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Ratione voluptates a quibusdam dicta deleniti
                        beatae?
                    </p>
                    <div class="links links-left">
                        <a class="active" href="#">Learn More</a>
                        <a href="#">Get Voucher</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- app-cta area end -->
<!-- Vouchers area start -->
<section class="" id="pricing">
    <div class="container">
        <div class="section-title">
            <span>Gift Cards</span>
            <h2>Hot Pricing</h2>
        </div>
    </div>
</section>
<section class="xs-section-padding hr-timeline-section">
    <div class="container">
        <div class="row hr-timeline-group">
            <div class="col-md-6 col-lg-3">
                <div class="hr-single-timeline wow bounceIn animated" style="visibility: visible; animation-name: bounceIn;">
                    <span class="number-count"></span>
                    <div class="hr-timeline-content-wraper">
                        <a href="#">
                            <div class="hr-timeline-content">
                                <i class="icon icon-working_process_icons_1"></i>
                                <p>$20</p>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-lg-3">
                <div class="hr-single-timeline color-1 wow bounceIn animated" data-wow-delay=".5s" style="visibility: visible; animation-delay: 0.5s; animation-name: bounceIn;">
                    <span class="number-count"></span>
                    <div class="hr-timeline-content-wraper">
                        <div class="hr-timeline-content">
                            <i class="icon icon-working_process_icons_2"></i>
                            <p>$50</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-lg-3">
                <div class="hr-single-timeline color-2 wow bounceIn animated" data-wow-delay=".7s" style="visibility: visible; animation-delay: 0.7s; animation-name: bounceIn;">
                    <span class="number-count"></span>
                    <div class="hr-timeline-content-wraper">
                        <div class="hr-timeline-content">
                            <i class="icon icon-working_process_icons_3"></i>
                            <p>$100</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-lg-3">
                <div class="hr-single-timeline color-3 wow bounceIn animated" data-wow-delay=".9s" style="visibility: visible; animation-delay: 0.9s; animation-name: bounceIn;">
                    <span class="number-count"></span>
                    <div class="hr-timeline-content-wraper">
                        <div class="hr-timeline-content">
                            <i class="icon icon-working_process_icons_4"></i>
                            <p>$250</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="timeline-wave">
        <img src="<?php echo base_url(); ?>assets/images/timeline-wave-shape.png" alt="" draggable="false">
    </div>
</section> 

<!-- appdemo-video area start -->
<div class="appdemo-video-area pt--100">
    <div class="container">
        <div class="row">
            <div class="col-md-10 offset-md-1">
                <div class="ad-video-box">
                    <a class="expand-video" href="https://player.vimeo.com/video/325281277">
                        <i class="fa fa-play"></i>
                    </a>
                    <h3>Watch Video</h3>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- appdemo-video area end -->
<!-- screenshot area start -->
<div class="screenshot-area ptb--70">
    <div class="container">
        <div class="section-title">
            <span>JAP</span>
            <h2>Gift Cards</h2>
        </div>
        <div class="screenshot-carousel swiper-container">
            <div class="swiper-wrapper">
                <div class="swiper-slide">
                    <img src="<?php echo base_url(); ?>assets/images/v1.png" alt="screenshot">
                </div>
                <div class="swiper-slide">
                    <img src="<?php echo base_url(); ?>assets/images/v2.png" alt="screenshot">
                </div>
                <div class="swiper-slide">
                    <img src="<?php echo base_url(); ?>assets/images/v3.png" alt="screenshot">
                </div>
                <div class="swiper-slide">
                    <img src="<?php echo base_url(); ?>assets/images/v4.png" alt="screenshot">
                </div>
                <div class="swiper-slide">
                    <img src="<?php echo base_url(); ?>assets/images/v5.png" alt="screenshot">
                </div>
                <div class="swiper-slide">
                    <img src="<?php echo base_url(); ?>assets/images/v6.png" alt="screenshot">
                </div>
                <div class="swiper-slide">
                    <img src="<?php echo base_url(); ?>assets/images/v1.png" alt="screenshot">
                </div>
                <div class="swiper-slide">
                    <img src="<?php echo base_url(); ?>assets/images/v2.png" alt="screenshot">
                </div>
                <div class="swiper-slide">
                    <img src="<?php echo base_url(); ?>assets/images/v3.png" alt="screenshot">
                </div>
            </div>
            <div class="screenshot-pagination"></div>
        </div>
    </div>
</div>
<!-- screenshot area end -->

<!-- contact area start -->
<section class="contact-area h5-contact ptb--70" id="contact">
    <div class="container">
        <div class="section-title">
            <span>Locate Us</span>
            <h2>Contact</h2>
        </div>
        <div class="row align">
            <div class="col-md-6">
                <div class="contact-content cnt-form">
                    <form method="post" id="contact_us_form">
                        <div class="row">
                            <div class="col-md-6">
                                <input type="text" placeholder="Enter Your Name" name="name" id="name">
                            </div>
                            <div class="col-md-6">
                                <input type="email" placeholder="Enter Your Email" name="email" id="email">
                            </div>
                            <div class="col-md-12">
                                <textarea name="message" id="message" placeholder="Enter Your Message"></textarea>
                            </div>
                            <div class="col-12">
                                <button class="btn button btn-block" type="button" id="btn_send" style="font-size: medium;"> Send </button>
                              
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <div class="col-md-6">
                <div id="google_map"></div>
            </div>
        </div>
    </div>
</section>
<!-- contact area end -->
<?php $this->load->view('common/footer'); ?>
