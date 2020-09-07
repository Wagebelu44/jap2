<!-- footer area start -->
<div class="footer-area ptb--20">
    <div class="container">
        <div class="footer-content">
            <p>Copyright &copy; JAP. All Rights Reserved.</p>
            <p>Designed & Developed By:
                <strong><a href="https://explorelogics.com/" target="_blank">Explore Logics</a></strong>
            </p>
        </div>
    </div>
</div>
<!-- footer area end -->

<!-- jquery latest version -->
<script src="<?php echo base_url(); ?>assets/js/vendor/jquery-2.2.4.min.js"></script>
<!-- bootstrap 4 js -->
<script src="<?php echo base_url(); ?>assets/js/bootstrap.min.js"></script>
<!-- others plugins -->
<script src="<?php echo base_url(); ?>assets/js/jquery.slicknav.min.js"></script>
<script src="<?php echo base_url(); ?>assets/js/counterup.min.js"></script>
<script src="<?php echo base_url(); ?>assets/js/waypoints.js"></script>
<script src="<?php echo base_url(); ?>assets/js/imagesloaded.pkgd.min.js"></script>
<script src="<?php echo base_url(); ?>assets/js/isotope.pkgd.min.js"></script>
<script src="<?php echo base_url(); ?>assets/js/jquery.magnific-popup.min.js"></script>
<script src="<?php echo base_url(); ?>assets/js/countdown.js"></script>
<script src="<?php echo base_url(); ?>assets/js/swiper.min.js"></script>
<script src="<?php echo base_url(); ?>assets/js/plugins.js"></script>
<script src="<?php echo base_url(); ?>assets/js/jquery.zoomslider.min.js"></script>
<script src="<?php echo base_url(); ?>assets/js/jquery.firefly.js"></script>
<!-- google map -->
<script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDIlJ7fUjXXKNFyTwOU9m6vKmAWU1FsHd0&callback=initMap"></script>
<script src="<?php echo base_url(); ?>assets/js/scripts.js"></script>

<!-- Toastr script -->
<script src="<?php echo base_url(); ?>admin_assets/js/plugins/toastr/toastr.min.js"></script>

<!-- Buy modal start -->
<div class="modal fade" id="buyModal" tabindex="-1" role="dialog" aria-labelledby="buyModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">

            <div class="modal-body p-0" id="buyModal_body"></div>

        </div>
    </div>
</div>
<!-- Buy modal End -->
<script>
// Example starter JavaScript for disabling form submissions if there are invalid fields
(function() {
    'use strict';
    window.addEventListener('load', function() {
// Fetch all the forms we want to apply custom Bootstrap validation styles to
var forms = document.getElementsByClassName('needs-validation');
// Loop over them and prevent submission
var validation = Array.prototype.filter.call(forms, function(form) {
    form.addEventListener('submit', function(event) {
        if (form.checkValidity() === false) {
            event.preventDefault();
            event.stopPropagation();
        }
        form.classList.add('was-validated');
    }, false);
});
}, false);
})();



$(document).on("click" , "#btn_buy_now" , function() 
{
    var gift_card_id = $(this).attr('data-id');
    $.ajax({
        url:'<?php echo base_url(); ?>home/buy_gift_card',
        type: 'POST',
        dataType:'json',
        data: {gift_card_id: gift_card_id},
        success:function(status){
            $("#buyModal_body").html(status.response);
            $("#buyModal").modal('show');
        }
    });
});

$(document).on("change" , ".btn_change_gift_card" , function(){
    var gift_card_id = $(this).attr('data-id');
    $.ajax({
        url:'<?php echo base_url(); ?>home/change_gift_card',
        type: 'POST',
        dataType:'json',
        data: {gift_card_id: gift_card_id},
        success:function(status){
            $("#change_gift_card").html(status.response);
            $('#actual_price').val(status.actual_price);
        }
    });
});

$(document).on("click" , "#btn_buy_continue" , function() {

    var first_name = $('#first_name').val();
    var last_name = $('#last_name').val();
    var buyer_email = $('#buyer_email').val();
    var city = $('#city').val();
    var phone_no = $('#phone_no').val();
    var state = $('#state').val();
    var zip_code = $('#zip_code').val();
    var actual_price = $('#actual_price').val();
    var gift_card_id = $("input[name='gift_card']:checked").val();

    var value = $("#buy_now_form").serialize();
    $.ajax({
        url:'<?php echo base_url(); ?>home/add_sell_out_card',
        type: 'POST',
        dataType:'json',
        data: {gift_card_id: gift_card_id, first_name: first_name, last_name: last_name, buyer_email: buyer_email, city: city, phone_no: phone_no, zip_code: zip_code, state: state, actual_price: actual_price},
        success:function(status){
            if(status.msg=='success') {
                $('#buy_now_form')[0].reset();
                toastr.success(status.response,"Success");
                setTimeout(function(){ location.reload(); }, 2000);
            } else if(status.msg == 'error') {
                toastr.error(status.response,"Error");
            }
        }
    });
});
</script>



<script>

    $(document).on("click" , "#btn_send" , function() {

        var value = $("#contact_us_form").serialize();
        $.ajax({
            url:'<?php echo base_url(); ?>home/send_contact_email',
            type:'post',
            data:value,
            dataType:'json',
            success:function(status){
                if(status.msg=='success') {
                    $('#contact_us_form')[0].reset();
                    toastr.success(status.response,"Success");
                } else if(status.msg == 'error') {
                    toastr.error(status.response,"Error");
                }
            }
        });
    });
</script>
<script>
$(document).mouseup(function(e){
    var container = $("#mobile_navs");

    if(!container.is(e.target) && container.has(e.target).length === 0){
        container.hide();
    }
});
</script>


</body>

</html>