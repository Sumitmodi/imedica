<div id="search-overlay">
    <div class="container">
        <div id="close">X</div>
        <form action="<?php echo base_url('search'); ?>" method="post" class="navbar-form-custom" role="search">
            <input type="hidden" name="current_page" value="<?php echo $this->uri->segment(1); ?>"/>
            <input id="hidden-search" type="text" name="search" placeholder="Search..." autofocus autocomplete="off"/>
            <!--hidden input the user types into-->
            <input id="display-search" type="text" name="search" placeholder="Search..." autofocus autocomplete="off"/>
            <!--mirrored input that shows the actual input value-->
            <input type="submit" style="visibility: hidden;"/>
        </form>
    </div>
</div>
<!--Topbar-->
<div class="topbar-info no-pad">
    <div class="container">
        <div class="social-wrap-head col-md-2 no-pad">
            <ul>
                <li><a href="<?php echo $site_infos['facebook_link']; ?>"><i class="icon-facebook head-social-icon"
                                                                             id="face-head" data-original-title=""
                                                                             title=""></i></a></li>
                <li><a href="#"><i class="icon-social-twitter head-social-icon" id="tweet-head" data-original-title=""
                                   title=""></i></a></li>
                <li><a href="mailto:<?php echo $site_infos['google_link']; ?>"><i class="fa fa-google head-social-icon" id="gplus-head" data-original-title=""
                                   title=""></i></a></li>
                <li><a href="skype:<?php echo $site_infos['skype_link']; ?>?add "><i class="fa fa-skype head-social-icon"></i></a></li>
            </ul>
        </div>
        <div class="top-info-contact pull-right col-md-8">
                <?php if ($this->session->userdata('login')) { ?>
                    <a href="<?php echo base_url('user');?>">
                <?php $session_data = $this->session->userdata('login');
                echo "WELCOME," . strtoupper($session_data->username); ?></a>&nbsp;
                <a href="<?php echo base_url('logout'); ?>"><i class="fa fa-unlock-alt"></i> Logout</a>
            <?php }elseif($this->session->userdata('fb_login')){ ?>
                <a href="<?php echo base_url('user');?>">
                <?php $session_data = $this->session->userdata('fb_login');
                echo "WELCOME," . strtoupper($session_data['name']); ?></a>&nbsp;
                <a href="<?php echo base_url('logout'); ?>"><i class="fa fa-unlock-alt"></i> Logout</a>
            <?php } else { ?>
            <a href="<?php echo base_url('signup'); ?>"><i class="fa fa-pencil"></i> Sign Up</a>&emsp;
            <a href="<?php echo base_url('login'); ?>"><i class="fa fa-key"></i> Log In</a>
            <?php } ?>&nbsp;

           <?php echo $this->lang->line('home_callus');?><a href="tel:<?php echo $site_infos['phone']; ?>" style="text-decoration: none;">&nbsp;<i
                    class="fa fa-phone"></i> <?php echo $site_infos['phone']; ?>&nbsp;&nbsp;
            <a href="mailto:<?php echo $site_infos['email']; ?>" style="text-decoration: none;"> <i
                    class="fa fa-envelope"></i><?php echo $site_infos['email']; ?></a>
            <div id="search" class="fa fa-search search-head"></div>
        </div>
    </div>
</div><!--Topbar-info-close-->

<script type="text/javascript">
    $("#search").trigger('click');
</script>


