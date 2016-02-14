<?php
$template = $this->config->item('template');
$this->load->view('inc/template_start.php',array('template'=>$template));//load css files
?>

    <!-- Page content -->
    <div id="login-container">
        <?php $this->load->view('cms/login/form/form',$this->data);?>
    </div>
    <!-- load js files -->
<?php $this->load->view('inc/template_scripts.php',array('template'=>$template)); ?>

    <!-- Load and execute javascript code used only in this page -->
    <script src="<?php echo base_url('assets/js/page/readyLogin.js');?>"></script>
<?php $this->load->view('inc/template_end.php',array('template'=>$template)); ?>