<div id="">
<?php
// echo 'name';
$page = strtolower($page);
$action = strtolower($action);

?>

    <?php if ($found == false) {
        load_page("e404");
    } else {
        // load_module($page, $action);

?>
<?php load_page_part($page, $action,  "heading"); ?>
<?php load_page_part($page, $action,  "blog"); ?>
       
 <?php   }
    ?>
</div>