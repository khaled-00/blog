
<!-- jQuery -->
    <script src="<?php echo base_url();?>style/admin/bower_components/jquery/dist/jquery.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="<?php echo base_url();?>style/admin/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>

    <!-- Metis Menu Plugin JavaScript -->
    <script src="<?php echo base_url();?>style/admin/bower_components/metisMenu/dist/metisMenu.min.js"></script>

    <!-- Morris Charts JavaScript -->
    <script src="<?php echo base_url();?>style/admin/bower_components/raphael/raphael-min.js"></script>
    <script src="<?php echo base_url();?>style/admin/bower_components/morrisjs/morris.min.js"></script>
    <script src="../../style/admin/js/morris-data.js"></script>
    <!-- Custom Theme JavaScript -->
    <script src="<?php echo base_url();?>style/admin/dist/js/sb-admin-2.js"></script>
    <script src="<?php echo base_url();?>style/jquery.js" ></script>
    <script>
        $(document).ready(function() {
            
            $(".vir_up_sec").click(function() {
                $(".hd_up_sec").toggle();
                $(".swo_up_sec").toggle();
            });
            
            $("#update_post").click(function() {
                $("#update_btn").toggle();
                $("#post_btn").toggle();
            });
            
        });
        initSample();

    </script>
    </body>
</html>
