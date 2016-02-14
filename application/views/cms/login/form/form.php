<!-- Login Header -->
<h1 class="h2 text-light text-center push-top-bottom animation-slideDown">
    <!--    <i class="fa fa-cube"></i> <strong>iMedica | Login</strong>-->
    <img src="<?php echo base_url('assets/frontend/images/favicon.png');?>"/> <strong><?php echo $this->lang->line('home_imedica');?></strong>
</h1>
<!-- END Login Header -->

<!-- Login Block -->
<div class="block animation-fadeInQuickInv">
    <!-- Login Title -->
    <div class="block-title">
        <div class="block-options pull-right">

            <a href="<?php //echo base_url('googlelogin');?>" class="btn btn-effect-ripple btn-primary" data-toggle="tooltip"
               data-placement="left" title="Login with google"><i class="fa fa-google"></i></a>

            <a href="<?php //echo base_url('fblogin');?>" class="btn btn-effect-ripple btn-primary" data-toggle="tooltip"
               data-placement="left" title="Login with facebook"><i class="fa fa-facebook-square"></i></a>

            <a href="<?php //echo base_url('twitterlogin');?>" class="btn btn-effect-ripple btn-primary" data-toggle="tooltip"
               data-placement="left" title="Login with twitter"><i class="fa fa-twitter"></i></a>
        </div>

        <h2>Login</h2>
    </div>
    <!-- END Login Title -->

    <?php if(isset($message)){ ?>
        <div class="alert alert-danger alert-dismissable">
            <?php
            echo $message;
            ?>
        </div>
        <?php
    }?>

    <?php if(validation_errors()){?>
        <div class="alert alert-danger alert-dismissable">
            <?php
            echo validation_errors();
            ?>
        </div>
    <?php }?>

    <!-- Login Form -->
    <?php echo form_open("login/verify",'class="form-horizontal"'); ?>

    <div class="form-group">
        <div class="col-xs-12">
            <input type="text" id="admin_email" name="admin_email" class="form-control" placeholder="Your email..">
        </div>
    </div>
    <div class="form-group">
        <div class="col-xs-12">
            <input type="password" id="admin_password" name="admin_password" class="form-control" placeholder="Your password..">
        </div>
    </div>
    <div class="form-group form-actions">
        <div class="col-xs-8">
            <label class="csscheckbox csscheckbox-primary">
                <input type="checkbox" id="login-remember-me" name="login-remember-me">
                <span></span>
            </label>
            Remember Me?
        </div>
        <div class="col-xs-4 text-right">
            <button type="submit" class="btn btn-effect-ripple btn-sm btn-primary"><i class="fa fa-check"></i> Let's Go</button>
        </div>
    </div>
    </form>
    <!-- END Login Form -->
</div>
<!-- END Login Block -->

