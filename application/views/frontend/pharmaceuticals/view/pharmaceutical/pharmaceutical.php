
<div class="about-intro-wrap pull-left">
    <div class="bread-crumb-wrap ibc-wrap-5">
        <div class="container">
            <!--Title / Beadcrumb-->
            <div class="inner-page-title-wrap col-xs-12 col-md-12 col-sm-12">
                <div class="bread-heading"><h1><?php echo ucfirst($pharmaceuticals[0]['name']);?></h1></div>
                <div class="bread-crumb pull-right">
                    <ul>
                        <li><a href="<?php echo base_url();?>"><?php echo $this->lang->line('home');?></a></li>
                        <li><a href=""><?php echo ucfirst($page);?></a></li>
                        <li><a href=""><?php echo ucfirst($pharmaceuticals[0]['name']);?></a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>

    <div class="container">

        <div class="row">

            <?php if($this->session->flashdata('message')){?>
                <div class="alert alert-danger text-center">
                <a href="#" class="close" data-dismiss="alert">�</a>
                <i class="fa fa-flag flag-icon pull-left"></i> <?php echo $this->session->flashdata('message');?>
                </div><?php } ?>

            <div class="mid-widgets-serices col-xs-12 col-sm-12 col-md-12 col-lg-12 no-pad pull-left services-page">
                <?php foreach($pharmaceuticals as $ph){?>
                    <div class="col-sm-5 col-xs-12 col-md-3 col-lg-3 service-box no-pad wow fadeInLeft animated" data-wow-delay="1s" data-wow-offset="150">
                        <div class="service-title"><div class="service-icon-container rot-y"><i class="icon-medkit panel-icon"></i></div><?php echo $ph['medicine_name'];?></div>
                        <p>Category : <?php echo $ph['category_name'];?><br>
                            Composition : <?php echo $ph['composition'];?></p>
                    </div>
                <?php } ?>

            </div>


        </div>
    </div>
</div>