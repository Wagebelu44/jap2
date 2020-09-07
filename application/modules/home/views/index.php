<?php $this->load->view('common/header'); ?>

<section class="top_slider hero-area app-slider pos-rel full-height d-flex align-items-center parallax" id="home" data-speed="3" data-bg-image="assets/images/thumb2.png">
    <div class="slider_overlay"></div>
    <div class="container">
        <div class="slider-area d-flex align-items-center" id="slider_firefly" data-zs-src='["assets/images/gift1.jpg", "assets/images/gift2.jpg", "assets/images/gift3.jpg"]'>
            <div class="container">
                <div class="music-content">
                    <h2>Buy <span>Gift Cards</span><br> Starts Here</h2>
                    <a href="https://player.vimeo.com/video/325281277" class="expand-video">
                        <i class="fa fa-play"></i>
                    </a>
                </div>
            </div>
        </div>

    </div>
    <a href="#trainers" class="scrl_me_down">
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
                    <p>Get a voucher code to add funds on your JAP account at a discounted price.</p>
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
                    <h4>Gift Your Loved Ones</h4>
                    <p>Now you can gift your loved ones the best gift they can ever wish for! A JAP voucher code!</p>
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
                    <h2>JAP Voucher Code</h2>
                    <p> The wait is now over, get your JustAnotherPanel.com Voucher Code and add it on JAP by opening a ticket and choosing the "I Have A Voucher Code" subject and sending your code via Message!
                    </p>
                    <div class="links links-right">
                        <a href="https://justanotherpanel.com/tickets">Send A Ticket</a>
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
<div class="app-cta-area pb--100 bg-theme" id="app-feature">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-md-5">
                <div class="mscreen-left effectupdown2">
                    <img src="<?php echo base_url(); ?>assets/images/promotion.png" alt="image">
                </div>
            </div>
            <div class="col-md-7">
                <div class="appcta-content appcta-right">
                    <h2>It’s all about Sharing the love</h2>
                    <p>Get the voucher code now for a price cheaper than adding funds directly on JAP and gift it to your family and friends!
                    </p>
                    <div class="links links-left">
                        <a href="https://justanotherpanel.com">Go to JAP</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- app-cta area end -->
<?php $this->load->view('common/footer'); ?>
