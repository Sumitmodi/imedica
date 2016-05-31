<div class="complete-footer">
    <footer id="footer">

        <div class="container">
            <div class="row">
                <!--Foot widget-->
                <div class="col-xs-12 col-sm-6 col-md-3 foot-widget" style="margin-top: 20px;">

                    <address class="foot-address">
                        <div class="col-xs-12 no-pad"><i
                                class="icon-globe address-icons"></i><?php echo $this->lang->line('home_imedica'); ?>
                            <br/><?php echo $site_infos['footer']; ?></div>
                        <div class="col-xs-12 no-pad"><i
                                class="icon-phone2 address-icons"></i><?php echo $site_infos['phone']; ?></div>
                        <div class="col-xs-12 no-pad"><i class="icon-file address-icons"></i>+123 555 755</div>
                        <div class="col-xs-12 no-pad"><i
                                class="icon-mail address-icons"></i><?php echo $site_infos['email']; ?></div>
                    </address>
                    <div class="social-wrap">

                        <ul>
                            <li><a href="<?php echo $site_infos['facebook_link']; ?>"><i
                                        class="icon-facebook foot-social-icon" id="face-foot"
                                        data-toggle="tooltip" data-placement="bottom" title="Facebook"></i></a>
                            </li>

                            <li><a href="#"><i class="icon-social-twitter foot-social-icon" id="tweet-foot"
                                               data-toggle="tooltip" data-placement="bottom" title="Twitter"></i></a>
                            </li>

                            <li><a href="mailto:<?php echo $site_infos['google_link']; ?>"><i class="fa fa-google foot-social-icon" id="gplus-foot"
                                               data-toggle="tooltip" data-placement="bottom" title="Google"></i></a>
                            </li>
                        </ul>
                    </div>
<!--                    <div class="clearfix"></div>-->
<!--                    <div id="fb-root"></div>-->
<!--                    <div class="fb-like" data-href="--><?php //echo $site_infos['facebook_link']; ?><!--" style="margin-top: 20px;" data-layout="standard" data-action="like" data-show-faces="true" data-share="true"></div>-->

                </div>

                <div class="col-xs-12 col-sm-6 col-md-6 foot-widget">
                    <div class="fb-page" data-href="<?php echo $site_infos['facebook_link']; ?>" data-width="600px"
                         data-height="280" data-small-header="true" data-adapt-container-width="true"
                         data-hide-cover="true" data-show-facepile="true" data-show-posts="true">
                        <div class="fb-xfbml-parse-ignore">
                            <blockquote cite="<?php echo $site_infos['facebook_link']; ?>"><a
                                    href="<?php echo $site_infos['facebook_link']; ?>">Nurakan Technologies Pvt. Ltd.</a>
                            </blockquote>
                        </div>
                    </div>
                </div>

                <!--Foot widget-->
                <div class="col-xs-12 col-sm-6 col-md-3 recent-post-foot foot-widget">
                    <div class="foot-widget-title"><?php echo $this->lang->line('home_blog_post'); ?></div>
                    <ul>
                        <?php $count = count($blogs);
                        $blogs_slice = array_slice($blogs, $count - 6, 4);
                        foreach ($blogs_slice as $b) {
                            ?>
                            <li><a href="<?php echo base_url($b['url']); ?>" style="color: #107fc9;"><?php echo $b['title']; ?></a></li><br/>
                        <?php } ?>
                    </ul>
                </div>



            </div>
        </div>

    </footer>

    <div class="bottom-footer">
        <div class="container">

            <div class="row">
                <!--Foot widget-->
                <div class="col-xs-12 col-sm-12 col-md-12 foot-widget-bottom">
                    <p class="col-xs-12 col-md-5 no-pad"><?php echo $this->lang->line('home_copyright'); ?></p>
                    <ul class="foot-menu col-xs-12 col-md-7 no-pad">
                        <li>
                            <a href="<?php echo base_url('contact-us'); ?>"><?php echo $this->lang->line('home_contactus'); ?></a>
                        </li>
                        <li>
                            <a href="<?php echo base_url('about'); ?>"><?php echo $this->lang->line('home_aboutus'); ?></a>
                        </li>
                        <li>
                            <a href="<?php echo base_url('order'); ?>"><?php echo $this->lang->line('home_order'); ?></a>
                        </li>
                        <li><a href="<?php echo base_url('news'); ?>"><?php echo $this->lang->line('home_news'); ?></a>
                        </li>
                        <li>
                            <a href="<?php echo base_url('doctors'); ?>"><?php echo $this->lang->line('home_doctors'); ?></a>
                        </li>
                        <li>
                            <a href="<?php echo base_url('knowledgebase'); ?>"><?php echo $this->lang->line('home_knowledgebase'); ?></a>
                        </li>
                        <li><a href="<?php echo base_url(); ?>"><?php echo $this->lang->line('home'); ?></a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>

</div>
            
        	
        