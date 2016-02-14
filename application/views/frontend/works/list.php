<?php
$page = strtolower($page);
//$action = '';
?>
<div class="about-intro-wrap pull-left">
    <?php //load_module("slider", "list");?>
    <?php load_page_part($page, $action, "flowchart"); ?>
    <?php load_page_part($page, $action, "refill_management"); ?>
</div>




