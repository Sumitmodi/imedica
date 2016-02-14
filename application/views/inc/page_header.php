<?php

@session_start();
?>
<header class="navbar<?php if ($template['header_navbar']) { echo ' ' . $template['header_navbar']; } ?><?php if ($template['header']) { echo ' '. $template['header']; } ?>">
    <!-- Left Header Navigation -->
    <ul class="nav navbar-nav-custom">
        <!-- Main Sidebar Toggle Button -->
        <li>
            <a href="javascript:void(0)" onclick="App.sidebar('toggle-sidebar');">
                <i class="fa fa-ellipsis-v fa-fw animation-fadeInRight" id="sidebar-toggle-mini"></i>
                <i class="fa fa-bars fa-fw animation-fadeInRight" id="sidebar-toggle-full"></i>
            </a>
        </li>
        <!-- END Main Sidebar Toggle Button -->


        <?php if ($template['header_link']) { ?>
        <?php if($this->session->userdata('logged_in')){ ?>
        <li class="hidden-xs animation-fadeInQuick">
            <a href=""><strong><?php echo $template['header_link'].'!! '.strtoupper($admin->admin_name); ?></strong></a>
        </li>
        <?php }elseif($this->session->userdata('fb_login')) {
                $session_data = $this->session->userdata('fb_login');?>
                <li class="hidden-xs animation-fadeInQuick">
                    <a href=""><strong><?php echo $template['header_link'].' '.strtoupper($session_data['name']); ?></strong></a>
                </li>
            <?php }else{ ?>
                <li class="hidden-xs animation-fadeInQuick">
                    <a href=""><strong><?php echo $template['header_link'].' '.strtoupper($user->email); ?></strong></a>
                </li>
        <?php } }?>
    </ul>
    <!-- END Left Header Navigation -->

    <!-- Right Header Navigation -->
    <ul class="nav navbar-nav-custom pull-right">
        <?php if($this->session->userdata('logged_in')) { ?>
        <!-- Search Form -->
        <li>
            <form action="<?php echo base_url('admin/search');?>" method="post" class="navbar-form-custom" role="search">
                <input type="text" id="keyword" name="keyword" class="form-control" placeholder="Search..">
            </form>
        </li>
        <!-- END Search Form -->
<!--        <li>-->
<!--            <a href="--><?php //echo base_url('fblogin');?><!--">-->
<!--                <i class="fa fa-facebook-square"></i></a>-->
<!--        </li>-->
<!---->
<!--        <li>-->
<!--            <a href="--><?php //echo base_url('googlelogin');?><!--">-->
<!--                <i class="fa fa-google"></i></a>-->
<!--        </li>-->

        <li class="dropdown">
            <a href="javascript:void(0)" class="dropdown-toggle" data-toggle="dropdown">
                <i class="fa fa-windows"></i> Site
            </a>
            <ul class="dropdown-menu dropdown-menu-right">
                <li>
                    <a href="<?php echo base_url('admin/site/edit');?>">
                        <i class="fa fa-pencil fa-fw pull-right"></i>
                        Edit
                    </a>
                </li>
                <li class="divider"><li>
                <li>
                    <a href="<?php echo base_url('admin/site/list');?>">
                        <i class="fa fa-eye fa-fw pull-right"></i>
                        Overview
                    </a>
                </li>
                <li class="divider"><li>
                <li>
                    <a href="<?php echo base_url();?>">
                        <i class="fa fa-globe fa-fw pull-right"></i>
                        Visit Site
                    </a>
                </li>
            </ul>
        </li>
        <?php } ?>
        <!-- Alternative Sidebar Toggle Button -->
        <li>
            <a href="javascript:void(0)" onclick="App.sidebar('toggle-sidebar-alt');">
                <i class="fa fa-users"> My Account</i>
            </a>
        </li>
        <!-- END Alternative Sidebar Toggle Button -->
        <li><?php if($this->session->userdata('logged_in')) { ?>
            <a href="<?php echo base_url('admin/logout');?>">
                <i class="fa fa-power-off"></i> Log out
            </a>
            <?php } else{?>
            <a href="<?php echo base_url('user/logout');?>">
                <i class="fa fa-power-off"></i> Log out
            </a>
            <?php } ?>
        </li>
    </ul>
    <!-- END Right Header Navigation -->
</header>
<!-- END Header -->
