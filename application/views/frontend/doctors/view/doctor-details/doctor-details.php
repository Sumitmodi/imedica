<div id="doctor-second-style">
    <div class="about-intro-wrap pull-left">
        <div class="container">
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12 pull-left doctors-3col-tabs no-pad">
                    <div class="content-tabs tabs col-xs-12 col-sm-12">
                        <div class="tab-content">
                            <div class="tab-pane fade fade-slow in active" id="all-doc">
                                <div class="doctor-box col-lg-8 col-md-6 col-sm-6 col-xs-12 wow fadeInUp animated" data-wow-delay="0.5s " data-wow-offset="200">
                                    <div class="col-md-4 col-sm-12 col-xs-12 no-pad">
                                        <div class="zoom-wrap">
                                            <img alt="" width="200" height="150" src="<?php echo base_url('uploads/doctors/'.$doctors['profile_img']);?>" />
                                        </div>
                                    </div><!--sub col-md-4 end-->
                                    <div class="col-md-8 col-sm-12 col-xs-12">
                                        <div class="doc-name">
                                            <div class="doc-name-class"><?php echo $doctors['name'];?></div>
                                            <span class="bottom-border col-md-6"></span>
                                        </div><!--doc name-->

                                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 no-pad wow fadeInUp animated" data-wow-delay="0.5s " data-wow-offset="200">
                                            <ul class="details" >
                                                <li>
                                                    <div class="detail-section">
                                                        <div class="feature">Specification</div>
                                                        <div class="feature-details"><?php echo $doctors['category_name'];?></div></div>
                                                </li>
                                                <li>
                                                    <div class="detail-section">
                                                        <div class="feature">Speciality</div>
                                                        <div class="feature-details"><?php echo $doctors['specialization'];?></div></div>
                                                </li>

                                                <li class="border-btm">
                                                    <div class="detail-section">
                                                        <div class="feature">Degrees</div>
                                                        <div class="feature-details"><?php echo $doctors['degree'];?></div></div>
                                                </li>

                                                <li class="padd-bottom padd-top border-btm">
                                                    <div class="detail-section">
                                                        <div class="feature">Work days</div>
                                                        <?php $workingdays = $this->front_model->working_days($doctors['id']);?>
                                                        <div class="feature-details">
                                                        <?php if($workingdays != NULL){
                                                            $dayss = null;
                                                                foreach($workingdays as $wd){
                                                                    $dayss[]=$wd['day'];}?>
                                                        <?php echo implode(',',$dayss);}else{echo "---";}?></div>
                                                    </div>
                                                </li>

                                                <li class="border-btm">
                                                    <div class="detail-section">
                                                        <div class="col-md-12 col-lg-12 col-sm-12 col-xs-12">
                                                        <div id="imedica-dep-accordion" class="ui-accordion ui-widget ui-helper-reset">
                                                            <h3 class="ui-accordion-header ilast-child-acc ui-helper-reset ui-state-default ui-corner-all ui-accordion-icons" role="tab" id="ui-accordion-imedica-dep-accordion-header-0" aria-controls="ui-accordion-imedica-dep-accordion-panel-0" aria-selected="true" tabindex="0">
                                                                <span class="ui-accordion-header-icon ui-icon"></span>
                                                                <i class="fa fa-clock-o dept-icon"></i><span class="dep-txt"><strong>Timetable</strong></span></h3>
                                                            <div class="ui-accordion-content ui-helper-reset ui-widget-content ui-corner-bottom ui-accordion-content-active accordion-height" id="ui-accordion-imedica-dep-accordion-panel-0" aria-labelledby="ui-accordion-imedica-dep-accordion-header-0" role="tabpanel" aria-expanded="true" aria-hidden="false" style="display: block;height:204px;">
                                                                <table class="table table-bordered table-striped table-responsive">
                                                                        <thead>
                                                                        <tr>
                                                                            <th style="text-align: center">Hospital</th>
                                                                            <th style="text-align: center">Day</th>
                                                                            <th style="text-align: center">From</th>
                                                                            <th style="text-align: center">To</th>
                                                                        </tr>
                                                                        </thead>
                                                                        <tbody>
                                                                        <?php if($workingdays != NULL){
                                                                        foreach($workingdays as $wd){?>
                                                                            <tr>
                                                                            <td><?php echo $wd['hospital_name'];?></td>
                                                                            <td><?php echo $wd['day'];?></td>
                                                                            <td><?php echo $wd['start_time'];?></td>
                                                                            <td><?php echo $wd['end_time'];?></td>

                                                                        <?php }}else{?>
                                                                            <td><?php echo "---";?></td>
                                                                            <td><?php echo "---";?></td>
                                                                            <td><?php echo "---";?></td>
                                                                            <td><?php echo "---";?></td>
                                                                            </tr>
                                                                        <?php }?>
                                                                        </tbody>
                                                                    </table>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    </div>
                                                </li>
                                                <div><a href="<?php echo base_url().'doctors';?>"><span class="dept-details-butt medium-but">Back</span></a></div>
                                            </ul>
                                        </div>
                                    </div><!--sub col-md-8 end-->
                                </div>
                            </div>
                        </div>

                    </div> <!--Mid Services End-->

                </div>
        </div>
        <!--Mid Content End-->
    </div>
</div><!--doctor-second-style-->