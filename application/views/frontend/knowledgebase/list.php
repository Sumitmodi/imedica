<?php
$page = strtolower($page);
//$action = '';
?>

<div class="about-intro-wrap pull-left" ng-controller="KnowledgeBase">
    <?php load_page_part($page, $action, "heading"); ?>
    <?php load_page_part($page, $action, "knowledgebase"); ?>
</div>
