<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
    <ul class="nav navbar-nav navbar-right">
        <!--        <li class="--><?php //echo get_active($page, 'home'); ?><!--"><a href="-->
        <?php //echo base_url(); ?><!--">Home</a></li>-->
<!--        <li class="--><?php //echo get_active($page, 'knowledgebase'); ?><!--"><a-->
<!--                href="--><?php //echo base_url('knowledgebase'); ?><!--">--><?php //echo $this->lang->line('home_knowledgebase'); ?><!--</a>-->
<!--        </li>-->
        <!--        <li class="--><?php //echo get_active($page, 'doctors'); ?><!--"><a href="-->
        <?php //echo base_url('doctors'); ?><!--">Doctors</a></li>-->
        <li class="<?php echo get_active($page, 'news'); ?>"><a
                href="<?php echo base_url('news'); ?>"><?php echo $this->lang->line('home_news'); ?></a></li>

        <li class="<?php echo get_active($page, 'order'); ?>">
                <?php if($this->session->userdata('login')){?>
                <a href="<?php echo base_url('user/user_order/add'); ?>">
                        <?php }else { ?>
                        <a href="<?php echo base_url('order'); ?>"><?php } ?>
                                <?php echo $this->lang->line('home_order'); ?></a></li>

        <li class="<?php echo get_active($page, 'blogs'); ?>"><a
                href="<?php echo base_url('blogs'); ?>"><?php echo $this->lang->line('home_blogs'); ?></a></li>
        <li class="<?php echo get_active($page, 'works'); ?>"><a
                href="<?php echo base_url('works'); ?>"><?php echo $this->lang->line('home_works'); ?></a></li>
        <li class="<?php echo get_active($page, 'faq'); ?>"><a
                href="<?php echo base_url('faq'); ?>"><?php echo $this->lang->line('home_faq'); ?></a></li>
        <li class="<?php echo get_active($page, 'contact-us'); ?>"><a
                href="<?php echo base_url('contact-us'); ?>"><?php echo $this->lang->line('home_contactus'); ?></a></li>
    </ul>
</div>

