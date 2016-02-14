

<!-- Include Jquery library from Google's CDN but if something goes wrong get Jquery from local file (Remove 'http:' if you have SSL) -->
<script>!window.jQuery && document.write(decodeURI('%3Cscript src="<?php echo base_url('assets/js/vendor/jquery-2.1.1.min.js');?>."%3E%3C/script%3E'));</script>

<!-- Bootstrap.js, Jquery plugins and Custom JS code -->
<script src="<?php echo base_url('assets/js/vendor/bootstrap.min.js');?>"></script>
<script src="<?php echo base_url('assets/js/plugins.js');?>"></script>
<script src="<?php echo base_url('assets/js/app.js');?>"></script>

<script src="<?php echo base_url('assets/js/pages/uiTables.js');?>"></script>
<script>$(function(){ UiTables.init(); });</script>
