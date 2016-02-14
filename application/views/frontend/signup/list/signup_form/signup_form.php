<div class="about-intro-wrap pull-left">

    <div class="bread-crumb-wrap ibc-wrap-4">
        <div class="container">
            <div class="inner-page-title-wrap col-xs-12 col-md-12 col-sm-12">
                <div class="bread-heading"><h1><?php echo strtoupper($page);?></h1></div>
                <div class="bread-crumb pull-right">
                    <ul>
                        <li><a href="<?php echo base_url();?>"><?php echo $this->lang->line('home');?></a></li>
                        <li><a href=""><?php echo strtoupper($page);?></a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>

    <div class="container">
        <div class="row">
                <div class="col-xs-12 col-lg-12 col-sm-12 col-md-12 pull-left no-pad">
                    <div class="subtitle col-xs-12 no-pad col-sm-12 col-md-12 pull-left news-sub icontact-widg">SignUp Form</div>
                    <div class="col-lg-6 col-sm-12 col-md-12 col-xs-12 no-pad wow fadeInUp" data-wow-delay="0.5s" data-wow-offset="160">

                        <?php if($this->session->flashdata('message')){?>
                        <div class="alert alert-success text-center">
                            <a href="#" class="close" data-dismiss="alert">×</a>
                            <i class="fa fa-flag flag-icon pull-left"></i> <?php echo $this->session->flashdata('message');?>
                        </div><?php } ?>

                            <form action="<?php echo base_url('signup_process');?>" method="post" class="contact2-page-form col-lg-6 col-sm-12 col-md-12 col-xs-12 no-pad contact-v1" id="contactForm">


                                <div class="col-lg-12 col-sm-12 col-md-4 col-xs-12 control-group">
                                    <label for="email"><strong>Email</strong></label>
                                    <input type="email" class="contact2-textbox" placeholder="Email*" name="email" id="email"  value="<?php if($this->session->flashdata('email')){echo $this->session->flashdata('email');}?>"/>
                                </div>

                                <div class="col-lg-12 col-sm-12 col-md-4 col-xs-12 control-group">
                                    <label for="password"><strong>Password</strong></label>
                                    <input type="password" class="contact2-textbox" placeholder="Password*" name="password" id="password"/>
                                </div>

                                <div class="col-lg-12 col-sm-12 col-md-4 col-xs-12 control-group">
                                    <label for="retype_password"><strong>Retype Password</strong></label>
                                    <input type="password" class="contact2-textbox" placeholder="Retype Password" name="retype_password" id="retype_password"/>
                                </div>

                                <section class="color-7" id="btn-click">
                                    <button id="submit" class="btn btn-primary tiny-but" style="float: left;"><i class="fa fa-pencil"></i> Sign UP</button>
                                </section></div>
                        </form>
                    </div>
            </div>

            <div style="margin-top: 10px;">
                OR Login With
                <a href="<?php echo base_url('fblogin');?>" class="btn btn-effect-ripple btn-primary" data-toggle="tooltip"
                   data-placement="left" title="Login with facebook"><i class="fa fa-facebook-square"></i></a>

                <a href="<?php echo base_url('googlelogin');?>" class="btn btn-effect-ripple btn-primary" data-toggle="tooltip"
                   data-placement="left" title="Login with google"><i class="fa fa-google"></i></a>

                <a href="<?php //echo base_url('twitterlogin');?>" class="btn btn-effect-ripple btn-primary" data-toggle="tooltip"
                   data-placement="left" title="Login with twitter"><i class="fa fa-twitter"></i></a>
            </div>

        </div>

    </div>
    </div>


