<!--Icon Boxes 1-->
<div class="container">
    <div class="row">
        <div class="no-pad icon-boxes-1">

            <!--Icon-box-start-->
            <?php $delay = array('0.6s','0.9s','1.2s');
            $icon = array('fa fa-medkit','icon-stethoscope','fa fa-ambulance');
            $services_slice = array_slice($services, 0, 3);
            foreach($services_slice as $key=>$s){?>
                <div class="col-sm-6 col-xs-12 col-md-3 col-lg-3">
                    <div class="icon-box-3 wow fadeInUp" data-wow-delay="<?php echo $delay[$key%count($delay)];?>" data-wow-offset="150">
                        <div class="icon-boxwrap2"><i class="<?php echo $icon[$key%count($icon)];?> icon-box-back2"></i></div>
                        <div class="icon-box2-title"><?php echo $s['title'];?></div>
                        <p><?php echo $s['content'];?></p>
                        <!--                    <div class="iconbox-readmore"><a href="#">Read More</a></div>-->
                    </div>
                </div>
            <?php } ?>

            <!--Icon-box-start-->
            <div class="col-sm-6 col-xs-12 col-md-3 col-lg-3">
                <div class="icon-box-3 notViewed wow fadeInUp" data-wow-delay="1.5s" data-wow-offset="150">
                    <div class="icon-boxwrap2"><i class="fa fa-clock-o icon-box-back2"></i></div>
                    <div class="icon-box2-title"><?php echo $this->lang->line('home_opening_hours');?></div>
                    <ul>
                        <li><?php echo $site_infos['opening_day'];?><span class="ibox-right-span"><?php echo $site_infos['opening_hour'];?></span></li>
                        <li>Saturday <span class="ibox-right-span">8.00  - 16.00</span></li>
                        <li>Sunday <span class="ibox-right-span">8.00 - 13.00</span></li>
                    </ul>
                </div>
            </div>

        </div>
    </div>
</div><!--Icon Boxes 1 end-->