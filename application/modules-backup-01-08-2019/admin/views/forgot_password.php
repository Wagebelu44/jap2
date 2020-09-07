<!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>JAP | Forgot Password</title>

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
            
            <h2 class="font-bold">Forgot password</h2>

            <p>
                Enter your email address and your password will be reset and emailed to you.
            </p>

            <div class="alert alert-danger" id="error_msg" style="display: none;">

            </div>

            <div class="alert alert-success" id="success_msg" style="display: none;">

            </div>

            <form class="m-t" role="form" id="forgot_form">
                <div class="form-group">
                    <input type="email" class="form-control" name="email" id="email" placeholder="Email address" required="">
                </div>
                <button type="button" class="btn btn-primary block full-width m-b" id="forgot_btn">Send new password</button>
            </form>

            <p class="text-inverse b-b-default text-right">Back to <a href="<?php echo admin_url(); ?>login">Login.</a></p>

            <p class="m-t"> <small>JAP &copy; <?php echo date("Y"); ?></small> </p> 
        </div>
    </div>

    <!-- Mainly scripts -->
    <script src="<?php echo base_url(); ?>admin_assets/js/jquery-3.1.1.min.js"></script>
    <script src="<?php echo base_url(); ?>admin_assets/js/popper.min.js"></script>
    <script src="<?php echo base_url(); ?>admin_assets/js/bootstrap.js"></script>

</body>

</html>


<script>

  $('#forgot_btn').click(function(){

      if($("#email").val() == ''){
        $('#error_msg').text("Email field is required.").show();
        return false;
    } else {
        $('#error').hide();
    }

    var btn = $(this);

    $(btn).button('loading');
    var value = $("#forgot_form").serialize();

    $.ajax({

        url:'<?php echo admin_url(); ?>forgot_password/retrieve_password',

        type:'post',

        data:value,

        dataType:'json',

        success:function(status){

          console.log(status);

          if(status.msg=='success'){
            $('#error_msg').hide();
            $('#success_msg').text(status.response).show();
            $(btn).button('reset');

        }

        else if(status.msg == 'error'){
            $('#error_msg').html(status.response).show();
            $(btn).button('reset');
        }

    }

});

});
</script>