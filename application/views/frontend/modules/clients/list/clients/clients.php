<div class="cl-wrap icl-wrap">
    <div class="container">

        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 pull-left client-logo-flex wow flipInX"
             data-wow-delay="0.5s" data-wow-offset="100">

            <ul id="clients-carousel" class="icl-carousel">
                <?php foreach ($clients as $c) {?>
                    <li><a href="#"><img src="<?php echo base_url('uploads/clients/' . $c['logo']); ?>" alt=""
                                         class="img-responsive client-logo-img"/></a></li>
                <?php } ?>
            </ul>

        </div>

    </div>
</div>