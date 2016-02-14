
<div id="page-wrapper"<?php if ($template['page_preloader']) { echo ' class="page-loading"'; } ?>>
    <!-- Preloader -->
    <!-- Preloader functionality (initialized in js/app.js) - pageLoading() -->
    <!-- Used only if page preloader enabled from inc/config (PHP version) or the class 'page-loading' is added in #page-wrapper element (HTML version) -->
    <div class="preloader">
        <div class="inner">
            <!-- Animation spinner for all modern browsers -->
            <div class="preloader-spinner themed-background hidden-lt-ie10"></div>

            <!-- Text for IE9 -->
            <h3 class="text-primary visible-lt-ie10"><strong>Loading..</strong></h3>
        </div>
    </div>

    <?php
        $page_classes = '';

        if ($template['header'] == 'navbar-fixed-top') {
            $page_classes = 'header-fixed-top';
        } else if ($template['header'] == 'navbar-fixed-bottom') {
            $page_classes = 'header-fixed-bottom';
        }

        if ($template['sidebar']) {
            $page_classes .= (($page_classes == '') ? '' : ' ') . $template['sidebar'];
        }

        if ($template['layout'] == 'fixed-width' && $template['header'] == '') {
            $page_classes .= (($page_classes == '') ? '' : ' ') . $template['layout'];
        }

        if ($template['cookies'] === 'enable-cookies') {
            $page_classes .= (($page_classes == '') ? '' : ' ') . $template['cookies'];
        }
    ?>
    <div id="page-container"<?php if ($page_classes) { echo ' class="' . $page_classes . '"'; } ?>>
        <?php if ($template['inc_sidebar_alt']) {
            $this->load->view('inc/' . $template['inc_sidebar_alt'] . '.php'); } ?>
        <?php if ($template['inc_sidebar']) {
            $this->load->view('inc/' . $template['inc_sidebar'] . '.php'); } ?>

        <!-- Main Container -->
        <div id="main-container">
            <?php if ($template['inc_header']) { $this->load->view('inc/' . $template['inc_header'] . '.php'); } ?>
