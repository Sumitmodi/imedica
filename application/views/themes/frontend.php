<?php
$this->load->view('frontend/common/header/head/head');
?>

<body id="<?php echo $page ?>">

<div id="loader-overlay">
    <img src="<?php echo base_url('assets/frontend/images/loader.gif'); ?>" alt="Loading"/>
</div>

<div id="wrap" class="boxed">
    <?php $this->load->view('frontend/common/header/header'); ?>
    <?php $this->load->view('frontend/main'); ?>

    <?php $this->load->view('frontend/common/footer/footer/footer'); ?>
</div>
<?php
$this->load->view('frontend/common/footer/scripts/scripts');
?>
