<?php if (isset($sliders) && !empty($sliders)){ ?>

    <div class="container full-width-container ihome-banner">
    <div class="banner col-sm-12 col-xs-12 col-md-12">
            <?php load_module_part("slider", "list", "slider");?>
        </div>
    </div>

<?php } ?>