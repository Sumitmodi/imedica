<?php
$template = $this->config->item('template');
$this->load->view('inc/template_start.php',array('template'=>$template));//load css files
?>

    <!-- Page content -->
    <div id="login-container">
        <?php $this->load->view('user/login/form/form',$this->data);?>
    </div>
    <!-- load js files -->
<?php $this->load->view('inc/template_scripts.php',array('template'=>$template)); ?>

<?php $this->load->view('inc/template_end.php',array('template'=>$template)); ?>