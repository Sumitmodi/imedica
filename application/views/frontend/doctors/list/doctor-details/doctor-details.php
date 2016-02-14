<div class="container" id="all_doc">
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12 pull-left doctors-3col-tabs no-pad">
            <div class="content-tabs tabs col-xs-12 col-sm-12">
                <!-- Tab panes -->
                <div class="tab-content">
                    <div class="tab-pane fade fade-slow in active" id="all-doc">
                        <?php if($doctors == NULL){?>
                                <div class="alert alert-danger alert-error text-center">
                                <a href="#" class="close" data-dismiss="alert">×</a>
                                <i class="fa fa-exclamation-triangle icons pull-left"></i> <?php echo $msg;?>
                                </div>
                        <?php }else{ foreach($doctors as $doc){?>

                        <div class="doctor-box col-md-4 col-sm-6 col-xs-12 wow fadeInUp animated" data-wow-delay="0.5s" data-wow-offset="200">
                            <div class="col-md-4 col-sm-12 col-xs-12 no-pad">
                                <div class="zoom-wrap">
                                    <img alt="" width="300" height="150" src="<?php echo base_url('uploads/doctors/'.$doc['profile_img']);?>" />
                                </div>
                            </div><!--sub col-md-4 end-->
                            <div class="col-md-8 col-sm-8 col-xs-12">
                                <div class="doc-name">
                                    <div class="doc-name-class"><?php echo $doc['name'];?></div><div class="doc-title"><?php echo $doc['category_name'];?></div>
                                    <br><a href="<?php echo base_url().$doc['url'];?>">View More  &raquo;</a>
                                </div>
                            </div><!--sub col-md-8 end-->
                        </div>
                        <?php } } ?>
                            </div><!--sub col-md-8 end-->

                        </div>
                    </div>
                </div>
            </div> <!--Mid Services End-->
        </div>
