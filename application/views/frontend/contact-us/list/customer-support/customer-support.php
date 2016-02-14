
<div class="container">

    <!--About-us top-content-->

    <div class="row">


        <div class="col-xs-12 col-lg-12  col-sm-12 col-md-12 pull-left contact2-wrap no-pad">



            <!--contact widgets-->
            <div class="col-xs-12 col-lg-12 col-sm-12 col-md-12 pull-left no-pad">


                <!--Contact form-->
                <div class="col-lg-12 col-sm-12 col-md-12 col-xs-12 no-pad wow fadeInUp" data-wow-delay="0.5s" data-wow-offset="160">

                    <div></div>

                    <div class="col-lg-12 col-sm-12 col-md-12 col-xs-12 no-pad">

                        <?php if($this->session->flashdata('message')){?>
                        <div class="alert alert-success text-center">
                            <a href="#" class="close" data-dismiss="alert">×</a>
                            <i class="fa fa-flag flag-icon pull-left"></i> <?php echo $this->session->flashdata('message');?>
                        </div><?php } ?>


                        <form class="contact2-page-form col-lg-12 col-sm-12 col-md-12 col-xs-12 no-pad contact-v1" name="contactForm" id="contactForm" action="<?php echo base_url('process'); ?>" method="post">


                            <div class="col-lg-3 col-sm-12 col-md-3 col-xs-12 control-group">
                                <input type="text" class="contact2-textbox" placeholder="First Name*" name="contact_name" id="contact_name" />

                            </div>

                            <div class="col-lg-3 col-sm-12 col-md-3 col-xs-12 control-group">
                                <input type="text" class="contact2-textbox" placeholder="Phone Number" name="contact_phone" id="contact_phone" />

                            </div>

                            <div class="col-lg-3 col-sm-12 col-md-3 col-xs-12 control-group">
                                <input type="email" class="contact2-textbox" placeholder="Email*" name="contact_email" id="contact_email"/>
                            </div>

                            <div class="col-lg-3 col-sm-12 col-md-3 col-xs-12 control-group">
                                <input type="text" class="contact2-textbox" placeholder="Subject" name="contact_subject" id="contact_subject"/>
                            </div>

                            <div class="col-lg-12 col-sm-12 col-md-12 col-xs-12">
                                <textarea class="contact2-textarea" placeholder="Message" name="contact_message" id="contact_message"></textarea>
                            </div>

                            <div class="col-lg-12 col-sm-12 col-md-12 col-xs-12">
                                    <input type="submit" id="submit" class="btn btn-info" name="submit" value="Submit" />
                             </div>

                        </form>
                    </div>



                </div>



            </div>

        </div>

    </div>





</div>