<div class="col-xs-12 col-sm-12 col-md-12 pull-left doctors-3col-tabs no-pad">
    <div class="content-tabs tabs col-xs-12 col-sm-12">
        <ul class="nav nav-tabs tab-acc" id="myTab">
            <li class="active"><a href="#all_medicines" data-toggle="tab">All Medicines</a></li>
            <?php $category = $this->front_model->category();
            foreach($category as $c){?>
                <li><a href="#<?php echo $c['category_name'];?>" data-toggle="tab"><?php echo $c['category_name'];?></a></li>
            <?php } ?>
        </ul>
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
                <?php foreach($cims as $c){?>
                    <div class="col-sm-5 col-xs-12 col-md-3 col-lg-3 service-box no-pad wow fadeInLeft animated" data-wow-delay="1s" data-wow-offset="150">
                        <div class="service-title"><div class="service-icon-container rot-y"><i class="icon-medkit panel-icon"></i></div><?php echo $c['Medicine_name'];?></div>
                        <p>Category : <?php echo $c['category_name'];?><br>
                        Composition : <?php echo $c['Composition'];?></p>
                    </div>
                <?php } ?>

            </div>


        </div>
    </div>