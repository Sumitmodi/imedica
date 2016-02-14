<div class="testimonial-wrap ihome-testi-wrap">
    <div class="container">
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 pull-left client-logo-flexx wow fadeInUp" data-wow-delay="0.3s" data-wow-offset="100">
                <i class="fa fa-quote-right testi-quote"></i>
                <div class="testimonial-content top"></div>

                <ul id="home-testimonials">
                    <?php $testimonial = array_slice($testimonials, 0, 4);
                    foreach($testimonial as $k=>$t){?>
                    <li>
                        <?php if($k == 0){?>
                        <a class="testi-one testi-1" data-toggle="popover" data-placement="top" data-original-title='<?php echo $t['description'];?>' data-content='<span class="testi-client-name"><?php echo $t['name'] ;?></span> <br> <span class="testi-client-pos"><?php echo $t['post'] ;?></span>'>
                            <?php } else { ?>
                            <a class="testi-one" data-toggle="popover" data-placement="top" data-original-title='<?php echo $t['description'];?>' data-content='<?php echo $t['name'] ;?> <br> <?php echo $t['post'] ;?>'>
                                <?php } ?>
                            <img src="<?php echo base_url('uploads/testimonials/'.$t['image']);?>" alt="" class="img-responsive client-logo-img" />
                        </a>
                    </li>
                    <?php } ?>
                </ul>
            </div>
        </div>
    </div>
</div>