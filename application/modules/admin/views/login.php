<!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>JAP | Administrator Login</title>

    <link href="<?php echo base_url(); ?>admin_assets/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>admin_assets/font-awesome/css/font-awesome.css" rel="stylesheet">

    <link href="<?php echo base_url(); ?>admin_assets/css/animate.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>admin_assets/css/style.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>admin_assets/css/custom.css" rel="stylesheet">

</head>

<body class="gray-bg">

    <div class="middle-box text-center loginscreen animated fadeInDown">
        <div>
            <div class="col-lg-12 text-center" style="margin-top: 70px;">
                <img class="img-responsive" src="<?php echo base_url(); ?>admin_assets/img/logo.png" alt="" style="width: 241px;">
            </div>

           <!--  <div style="margin-top: 100px;">
                <h2 class="admin_login_st"> Gift Cards </h2>
            </div> -->
            
            <h3 class="admin_login_st">Administrator Login</h3>
            <?php if($this->session->flashdata('login_error')) { ?>
                <div class="alert alert-danger">
                    <?php echo $this->session->flashdata('login_error'); ?>
                </div>
            <?php } ?>

            <form class="m-t" role="form" method="post" action="<?php echo admin_url(); ?>login/login_verify">
                <div class="form-group">
                    <input type="email" class="form-control" placeholder="Email" name="email" value="<?php echo $this->session->flashdata('email');?>">
                </div>
                <div class="form-group">
                    <input type="password" name="password" class="form-control" placeholder="Password">
                </div>
                <button type="submit" class="btn btn-primary block full-width m-b">Login</button>

                <a href="<?php echo admin_url(); ?>forgot_password"><small>Forgot password?</small></a>
                
            </form>
            <p class="m-t"> <small>JAP &copy; <?php echo date("Y"); ?></small> </p> 
        </div>
    </div>

    <!-- Mainly scripts -->
    <script src="<?php echo base_url(); ?>admin_assets/js/jquery-3.1.1.min.js"></script>
    <script src="<?php echo base_url(); ?>admin_assets/js/popper.min.js"></script>
    <script src="<?php echo base_url(); ?>admin_assets/js/bootstrap.js"></script>

</body>

</html>
