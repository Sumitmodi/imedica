<div class="parallax-out wpb_row vc_row-fluid ihome-parallax">

    <div id="second" class="upb_row_bg vcpb-hz-jquery" data-upb_br_animation="" data-parallax_sense="30"
         data-bg-override="ex-full">

        <div class="container">
            <div class="row">

                <div class="bg col-lg-4 col-sm-4 col-md-5 col-xs-12 notViewed wow fadeInUp" data-wow-delay="1.5s"
                     data-wow-offset="200"></div>

                <div class="float-right col-lg-7 col-sm-7 col-md-7 col-xs-12">

                    <div class="iconlist-wrap">
                        <div class="subtitle notViewed wow fadeInRight" data-wow-delay="0.5s" data-wow-offset="20"><?php echo $this->lang->line('home_why');?>
                            <span class="iconlist-mid-title"><?php echo $this->lang->line('home_choose');?></span> <?php echo $this->lang->line('home_us');?>
                        </div>
                        <ul>
                            <?php $icon = array('icon-hospital2','fa fa-user-md','fa fa-ambulance');
                            $choose = array_slice($why_choose_us, 0, 3);
                            foreach ($choose as $key=>$c) {?>
                                <li class="notViewed wow fadeInDown" data-wow-delay="0.5s" data-wow-offset="50">
                                    <i class="<?php echo $icon[$key%count($icon)];?> icon-list-icons"></i>

                                    <div class="iconlist-content">

                                        <div class="iconlist-title"><?php echo $c['title']; ?></div>
                                        <p class="iconlist-text"><?php echo substr($c['description'], 0, 125) . "<br>" .
                                                substr($c['description'], 125, 200); ?></p>
                                    </div>
                                </li>
                            <?php } ?>
                        </ul>
                    </div>


                </div>
            </div> <!--.story-->
        </div>
    </div> <!--#second-->

</div>