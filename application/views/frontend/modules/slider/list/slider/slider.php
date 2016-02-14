

<ul>
    <li data-transition="papercut" data-slotamount="7">
        <?php foreach($sliders as $slide) { ?>
        <!-- MAIN IMAGE -->
        <img src="<?php echo base_url('assets/frontend/images/new-slider/s1-bg.jpg'); ?>" alt="slidebg1"
             data-bgfit="cover" data-bgposition="left top" data-bgrepeat="no-repeat">
        <!-- LAYERS -->
        <!-- LAYER NR. 1 -->
        <div class="tp-caption lfb skewtoright imed-sl1"
             data-x="left"
             data-y="bottom"
             data-hoffset="0"
             data-speed="1000"
             data-start="1000"
             data-easing="Power4.easeOut"
             data-endspeed="400"
             data-endeasing="Power1.easeIn"
            ><img src="<?php echo base_url('uploads/slider/'.$slide['image']); ?>" alt=""
                  class="img-responsive">
        </div>

        <!-- LAYER NR. 5 -->
        <div id="bluebg-t1" class="tp-caption bluebg-t1 sfr skewtoright imed-sl1"
             data-x="right"
             data-y="115"
             data-hoffset="-60"
             data-speed="1000"
             data-start="2400"
             data-easing="Back.easeOut"
             data-endspeed="400"
             data-endeasing="Power1.easeIn"
            ><?php echo $this->lang->line('slider_content_1');?>
        </div>


        <!-- LAYER NR. 6 -->
        <div class="tp-caption bluebg-t2 sfr skewtoright imed-sl1"
             data-x="right"
             data-y="222"
             data-hoffset="-10"
             data-speed="1000"
             data-start="2900"
             data-easing="Back.easeOut"
             data-endspeed="400"
             data-endeasing="Power1.easeIn"
            ><?php echo $this->lang->line('slider_content_2');?>
        </div>


        <!-- LAYER NR. 7 -->
        <div class="tp-caption bluebg-t3 sfr skewtoright imed-sl1"
             data-x="right"
             data-y="280"
             data-hoffset="-60"
             data-speed="1000"
             data-start="3400"
             data-easing="Back.easeOut"
             data-endspeed="400"
             data-endeasing="Power1.easeIn"
            ><?php echo $this->lang->line('slider_content_3');?>
        </div>

        <!-- LAYER NR. 8 -->
        <div class="tp-caption s1-but customin skewtoright imed-sl1"
             data-x="center"
             data-y="365"
             data-hoffset="205"
             data-speed="1000"
             data-customin="x:0;y:0;z:0;rotationX:0;rotationY:0;rotationZ:0;scaleX:0;scaleY:0;skewX:0;skewY:0;opacity:0;transformPerspective:600;transformOrigin:50% 50%;"
             data-start="3900"
             data-easing="Back.easeOut"
             data-endspeed="400"
             data-endeasing="Power1.easeIn"
            ><?php if($this->session->userdata('login')){?>
                <a href="<?php echo base_url('user/user_order/add'); ?>">
            <?php } else{ ?>
                <a href="<?php echo base_url('order'); ?>">
            <?php } ?><?php echo $this->lang->line('slider_content_4');?></a>
        </div>

    </li>
    <?php } ?>
</ul>


