<?php
$template = $this->config->item('template');
$primary_nav = $this->config->item('admin_nav');
$this->load->view('inc/template_start.php',array('template'=>$template));//load css files
$this->load->view('inc/page_head.php',array('primary_nav'=>$primary_nav,'template'=>$template));
?>

<!-- Page content -->
<div id="page-content">
    <?php
    $this->load->view($this->template,$this->data);?>
</div>

<!-- load js files -->
<?php $this->load->view('inc/template_scripts.php',array('template'=>$template)); ?>

<!-- Load and execute javascript code used only in this page -->
<?php $this->load->view('inc/template_end.php',array('template'=>$template)); ?>








