<!DOCTYPE html>
<html>

<head>
    <?php $this->load->view('common/admin_header'); ?>
</head>

<body>
    <div id="wrapper">
        <?php $this->load->view('common/admin_sidebar'); ?>
        <div id="page-wrapper" class="gray-bg">
            <div class="row border-bottom">
                <?php $this->load->view('common/admin_logoutbar'); ?>
            </div>

            <div class="wrapper wrapper-content animated fadeIn">
                <div class="row">
                    <div class="col-lg-3">
                        <div class="ibox float-e-margins">
                            <div class="ibox-title">
                                <span class="label label-success pull-right">Total</span>
                                <h5>Gift Cards</h5>
                            </div>
                            <div class="ibox-content">
                                <h1 class="no-margins"><?php echo number_format($cards);?></h1>
                                <div class="stat-percent font-bold text-primary"><a href="<?php echo admin_url()?>gift_cards"><span class="label label-primary">View</span></a></div>
                                <small>Gift Cards</small>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-3">
                        <div class="ibox float-e-margins">
                            <div class="ibox-title">
                                <span class="label label-success pull-right">Total</span>
                                <h5>Sales</h5>
                            </div>
                            <div class="ibox-content">
                                <h1 class="no-margins"><?php echo number_format($orders);?></h1>
                                <div class="stat-percent font-bold text-primary"><a href="<?php echo admin_url()?>reports"><span class="label label-primary">View</span></a></div>
                                <small>Sales</small>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-3">
                        <div class="ibox float-e-margins">
                            <div class="ibox-title">
                                <span class="label label-success pull-right">Last 10 Days</span>
                                <h5>Last 10 Days Sales</h5>
                            </div>
                            <div class="ibox-content">
                                <h1 class="no-margins"><?php echo number_format($last_ten_days_orders);?></h1>
                                <div class="stat-percent font-bold text-primary"><a href="<?php echo admin_url()?>reports"><span class="label label-primary">View</span></a></div>
                                <small>Last 10 Days Sales</small>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-3">
                        <div class="ibox float-e-margins">
                            <div class="ibox-title">
                                <span class="label label-success pull-right">Today</span>
                                <h5>Today Sales</h5>
                            </div>
                            <div class="ibox-content">
                                <h1 class="no-margins"><?php echo number_format($today_orders);?></h1>
                                <div class="stat-percent font-bold text-primary">
                                    <?php 
                                    $today = array('today' => date('d/m/Y')); 
                                    $today =  http_build_query($today) . "\n";
                                    ?>
                                    <a href="<?php echo admin_url()?>reports?<?php echo $today; ?>"><span class="label label-primary">View</span></a></div>
                                <small>Today Sales</small>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
            <?php $this->load->view('common/admin_footer'); ?>
        </div>
        
    </div>
    <?php $this->load->view('common/admin_scripts'); ?>
</body>
</html>