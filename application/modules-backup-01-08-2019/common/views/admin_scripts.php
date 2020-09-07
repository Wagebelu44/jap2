<!-- Mainly scripts -->
<script src="<?php echo base_url(); ?>admin_assets/js/jquery-3.1.1.min.js"></script>
<script src="<?php echo base_url(); ?>admin_assets/js/popper.min.js"></script>
<script src="<?php echo base_url(); ?>admin_assets/js/bootstrap.js"></script>
<script src="<?php echo base_url(); ?>admin_assets/js/plugins/metisMenu/jquery.metisMenu.js"></script>
<script src="<?php echo base_url(); ?>admin_assets/js/plugins/slimscroll/jquery.slimscroll.min.js"></script>

<!-- iCheck -->
<script src="<?php echo base_url(); ?>admin_assets/js/plugins/iCheck/icheck.min.js"></script>

<!-- Toastr script -->
<script src="<?php echo base_url(); ?>admin_assets/js/plugins/toastr/toastr.min.js"></script>



<!-- Custom and plugin javascript -->
<script src="<?php echo base_url(); ?>admin_assets/js/inspinia.js"></script>
<script src="<?php echo base_url(); ?>admin_assets/js/plugins/pace/pace.min.js"></script>

<!-- Sweet alert -->
<script src="<?php echo base_url(); ?>admin_assets/js/plugins/sweetalert/sweetalert.min.js"></script>

<!-- Sparkline -->
<script src="<?php echo base_url(); ?>admin_assets/js/plugins/sparkline/jquery.sparkline.min.js"></script>

<!-- Ladda -->
<script src="<?php echo base_url(); ?>admin_assets/js/plugins/ladda/spin.min.js"></script>
<script src="<?php echo base_url(); ?>admin_assets/js/plugins/ladda/ladda.min.js"></script>
<script src="<?php echo base_url(); ?>admin_assets/js/plugins/ladda/ladda.jquery.min.js"></script>
<script src="<?php echo base_url(); ?>admin_assets/js/jquery.validate.min.js"></script>

<script src="<?php echo base_url(); ?>admin_assets/js/jquery.maskedinput.min.js"></script>

<script>
    $(document).ready(function() {
        $('#cancel_btn').click(function(e){
            e.preventDefault();
            var url = $(this).data('url');
            window.location.href =  url;
        });

        $('.phone_mask').mask('99 9999 9999');

        var sparklineCharts = function(){
            $("#sparkline1").sparkline([34, 43, 43, 35, 44, 32, 44, 52], {
                type: 'line',
                width: '100%',
                height: '50',
                lineColor: '#1ab394',
                fillColor: "transparent"
            });

            $("#sparkline2").sparkline([32, 11, 25, 37, 41, 32, 34, 42], {
                type: 'line',
                width: '100%',
                height: '50',
                lineColor: '#1ab394',
                fillColor: "transparent"
            });

            $("#sparkline3").sparkline([34, 22, 24, 41, 10, 18, 16,8], {
                type: 'line',
                width: '100%',
                height: '50',
                lineColor: '#1C84C6',
                fillColor: "transparent"
            });
        };

        var sparkResize;

        $(window).resize(function(e) {
            clearTimeout(sparkResize);
            sparkResize = setTimeout(sparklineCharts, 500);
        });

        sparklineCharts();




        var data1 = [
        [0,4],[1,8],[2,5],[3,10],[4,4],[5,16],[6,5],[7,11],[8,6],[9,11],[10,20],[11,10],[12,13],[13,4],[14,7],[15,8],[16,12]
        ];
        var data2 = [
        [0,0],[1,2],[2,7],[3,4],[4,11],[5,4],[6,2],[7,5],[8,11],[9,5],[10,4],[11,1],[12,5],[13,2],[14,5],[15,2],[16,0]
        ];
        $("#flot-dashboard5-chart").length && $.plot($("#flot-dashboard5-chart"), [
            data1,  data2
            ],
            {
                series: {
                    lines: {
                        show: false,
                        fill: true
                    },
                    splines: {
                        show: true,
                        tension: 0.4,
                        lineWidth: 1,
                        fill: 0.4
                    },
                    points: {
                        radius: 0,
                        show: true
                    },
                    shadowSize: 2
                },
                grid: {
                    hoverable: true,
                    clickable: true,

                    borderWidth: 2,
                    color: 'transparent'
                },
                colors: ["#1ab394", "#1C84C6"],
                xaxis:{
                },
                yaxis: {
                },
                tooltip: false
            }
            );

    });
</script>