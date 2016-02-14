
<div class="container">

    <div class="row">
        <!--About-us top-content-->

        <div class="col-md-12 col-xs-12 col-sm-12 pull-left subtitle ibg-transparent">Hospitals</div>



        <div class="col-xs-12 col-sm-12 col-md-12 pull-left doctors-3col-tabs no-pad">
            <div class="content-tabs tabs col-xs-12 col-sm-12">
                <!-- Tab panes -->
                <div class="tab-content">
                    <div class="tab-pane fade fade-slow in active" id="all-doc">
                        <?php foreach($hospitals as $hos){?>
                            <!--Doc intro-->
                            <div class="doctor-box col-md-6 col-sm-6 col-xs-12 wow fadeInUp animated" data-wow-delay="0.5s" data-wow-offset="200">
                                <div class="col-md-4 col-sm-12 col-xs-12 no-pad">
                                    <div class="zoom-wrap">
                                        <img alt="" class="img-responsive" src="<?php echo base_url('uploads/hospitals/'.$hos['logo']);?>" />
                                    </div>
                                </div><!--sub col-md-4 end-->
                                <div class="col-md-8 col-sm-8 col-xs-12">
                                    <div class="doc-name">
                                        <div class="doc-name-class"><?php echo $hos['hospital_name'];?></div>
                                        <div style="clear:both"></div>
                                        <p>Location : <?php echo $hos['location'];?><br>
                                        <p>Emergency Service : <?php echo $hos['emergency_service'];?><br>
                                        <p>Ambulance Number : <?php echo $hos['ambulance'];?><br>
                                        <p>Contact Number : <?php echo $hos['phone_no'];?><br>
                                        <p>Email : <?php echo $hos['email'];?></p>
                                        <p>Doctors Involved : <?php $hosp_doc = $this->front_model->hospital_doctors($hos['id']);
                                            if($hosp_doc !=NULL){
                                                $doctor = null;
                                                foreach($hosp_doc as $h){
                                                    $doctor[]=$h['name'];
                                                }
                                                echo implode(',',$doctor);}else
                                            {echo "---";}?>
                                        </p>
                                    </div>
                                </div><!--sub col-md-8 end-->
                            </div>
                        <?php } ?>
                    </div><!--sub col-md-8 end-->

                </div>
            </div>
        </div>
    </div> <!--Mid Services End-->
</div>