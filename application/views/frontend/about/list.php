<?php
$page = strtolower($page);
//$action = '';
?>
<?php if ($found == false) {
    load_page("e404");
} else {
    load_page_part($page, $action, "heading");
    load_page_part($page, $action, "topcontent");
    load_page_part($page, $action, "testimonials");
} ?>
<?php $this->load->view('frontend/common/clients/clients'); ?>
