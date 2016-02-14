<?php
$page = strtolower($page);
//$action = '';
?>

<?php load_page_part($page,$action,"allnews");?>
<?php $this->load->view('frontend/common/clients/clients'); ?>