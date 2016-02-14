<div id="sidebar">

    <div id="sidebar-brand" class="themed-background">

        <?php if($this->session->userdata('logged_in')){ ?>
        <a href="<?php echo base_url('admin'); ?>" class="sidebar-title">
            <i class="fa fa-cube"></i><span class="sidebar-nav-mini-hide"><strong><?php echo lang('site_title');?></strong></span>
        </a>
        <?php } else { ?>
            <a href="<?php echo base_url('user'); ?>" class="sidebar-title">
                <i class="fa fa-cube"></i><span class="sidebar-nav-mini-hide"><strong><?php echo lang('site_title');?></strong></span>
            </a>
        <?php } ?>
    </div>


    <div id="sidebar-scroll">

        <div class="sidebar-content">

            <?php if ($primary_nav) { ?>
                <ul class="sidebar-nav">
                    <?php foreach ($primary_nav as $key => $link) {
                        $link_class = '';
                        $li_active = '';
                        $menu_link = '';
                        $url = (isset($link['url']) && $link['url']) ? $link['url'] : '#';
                        $active = '';
                        $icon = (isset($link['icon']) && $link['icon']) ? '<i class="' . $link['icon'] . ' sidebar-nav-icon"></i>' : '';
                        if (isset($link['sub']) && $link['sub']) {
                            foreach ($link['sub'] as $sub_link) {
                                if (strtolower($this->uri->segment(2)) == strtolower($sub_link['name'])) {
                                    $li_active = ' class="active"';
                                    break;
                                }
                            }
                            $menu_link = 'sidebar-nav-menu';
                        }
                        if ($menu_link || $active) {
                            $link_class = ' class="' . $menu_link . $active . '"';
                        }
                        ?>
                        <?php if ($url == 'separator') { // if it is a separator and not a link ?>
                            <li class="sidebar-separator">
                                <i class="fa fa-ellipsis-h"></i>
                            </li>
                        <?php } else { // If it is a link ?>
                            <li<?php echo $li_active; ?>>
                                <a href="<?php echo base_url($url); ?>"<?php echo $link_class; ?>>
                                    <?php if (isset($link['sub']) && $link['sub']) { ?>
                                        <i class="fa fa-chevron-left sidebar-nav-indicator sidebar-nav-mini-hide"></i>
                                    <?php }
                                    echo $icon; ?>
                                    <span class="sidebar-nav-mini-hide"><?php echo $link['name']; ?></span>
                                </a>
                                <?php if (isset($link['sub']) && $link['sub']) { // if the link has a submenu ?>
                                    <ul>
                                        <?php foreach ($link['sub'] as $sub_link) {
                                            $link_class = '';
                                            $li_active = '';
                                            $submenu_link = '';
                                            $url = (isset($sub_link['url']) && $sub_link['url']) ? $sub_link['url'] : '#';
                                            $active = (isset($sub_link['url']) && ($template['active_page'] == $sub_link['url'])) ? ' active' : '';

                                            if (strtolower($this->uri->segment(2)) == strtolower($sub_link['name'])) {
                                                $li_active = ' class="active"';
                                            }
                                            if (isset($sub_link['sub']) && $sub_link['sub']) {
                                                $submenu_link = 'sidebar-nav-submenu';
                                            }

                                            if ($submenu_link || $active) {
                                                $link_class = ' class="' . $submenu_link . $active . '"';
                                            }
                                            ?>
                                            <li<?php echo $li_active; ?>>
                                                <a href="<?php echo base_url($url); ?>"<?php echo $link_class; ?>>
                                                    <?php if (isset($sub_link['sub']) && $sub_link['sub']) { ?>
                                                        <i class="fa fa-chevron-left sidebar-nav-indicator"></i>
                                                    <?php }
                                                    echo (isset($sub_link['icon']) ? '<i class="' . $sub_link['icon'] . ' sidebar-nav-icon"></i> ' : NULL) . $sub_link['name']; ?>
                                                </a>
                                                <?php if (isset($sub_link['sub']) && $sub_link['sub']) { ?>
                                                    <ul>
                                                        <?php foreach ($sub_link['sub'] as $sub2_link) {

                                                            $url = (isset($sub2_link['url']) && $sub2_link['url']) ? $sub2_link['url'] : '#';
                                                           $active = '';
                                                            if (strtolower($this->uri->segment(2)) == strtolower($sub_link['name'])) {
                                                                $seg = $this->uri->segment(3);
                                                                if (strtolower($sub2_link['name']) == 'add') {
                                                                    $l = strtolower($sub2_link['name']);
                                                                    if ($seg == 'add' || $seg == 'form' || $seg == 'edit' || $seg == $l) {
                                                                        $active = ' class="active"';
                                                                    }
                                                                }
                                                                if (strtolower($sub2_link['name']) == 'overview') {
                                                                    $l = strtolower($sub2_link['name']);
                                                                    if ($seg == 'list' || $seg == $l) {
                                                                        $active = ' class="active"';

                                                                    }
                                                                }
                                                                if (strtolower($sub2_link['name']) == 'edit') {
                                                                    $l = strtolower($sub2_link['name']);
                                                                    if ($seg == 'edit' || $seg == $l) {
                                                                        $active = ' class="active"';

                                                                    }
                                                                }
                                                            }
                                                            ?>
                                                            <li>
                                                                <a href="<?php echo base_url($url); ?>"<?php echo $active ?>><?php echo '<i class="' . $sub2_link['icon'] . ' sidebar-nav-icon"></i> ' . $sub2_link['name']; ?></a>
                                                            </li>
                                                        <?php } ?>
                                                    </ul>
                                                <?php } ?>
                                            </li>
                                        <?php } ?>
                                    </ul>
                                <?php } ?>
                            </li>
                        <?php } ?>
                    <?php } ?>
                </ul>

            <?php } ?>
        </div>

    </div>

</div>

