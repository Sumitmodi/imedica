<!DOCTYPE HTML>
<!--[if gt IE 8]> <html class="ie9" lang="en"> <![endif]-->
<html xmlns="http://www.w3.org/1999/xhtml" class="ihome">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />

    <title>
        <?php if($page == 'home'){
            echo "Home | iMedica";
        }
        else{
            echo strtoupper($page);
        }?>
    </title>

    <link href='http://fonts.googleapis.com/css?family=Open+Sans:400,700,300' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Noto+Sans:400,700,400italic' rel='stylesheet' type='text/css'>

    <link href="<?php echo base_url('assets/frontend/css/jquery-ui-1.10.3.custom.css');?>" rel="stylesheet" />
    <link href="<?php echo base_url('assets/frontend/css/animate.css');?>" rel="stylesheet" />
    <link href="<?php echo base_url('assets/frontend/css/font-awesome.min.css');?>" rel="stylesheet" />
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/frontend/css/blue.css');?>" id="style-switch" />
    <!-- REVOLUTION BANNER CSS SETTINGS -->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/frontend/rs-plugin/css/settings.min.css');?>" media="screen" />
    <!--[if IE 9]>
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/frontend/css/ie9.css');?>" />
    <![endif]-->
    <link rel="icon" type="image/png" href="<?php echo base_url('assets/frontend/images/favicon.png');?>">

    <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/frontend/css/slides.css');?>" />
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/frontend/css/inline.min.css');?>" />
    <script type="text/javascript" src="<?php echo base_url('assets/frontend/js/jquery.min.js');?>"></script>

  </head>


