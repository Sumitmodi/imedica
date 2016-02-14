<h1 class="h2 text-light text-center push-top-bottom animation-slideDown">
    <img src="<?php echo base_url('assets/frontend/images/favicon.png');?>"/> <strong><?php echo $this->lang->line('home_imedica');?></strong>
</h1>


<div class="block animation-fadeInQuickInv">

    <div class="block-title">
            <div class="block-options pull-right">
                <a href="<?php echo base_url('googlelogin');?>" class="btn btn-effect-ripple btn-primary" data-toggle="tooltip"
                   data-placement="left" title="Login with google"><i class="fa fa-google"></i></a>

                <a href="<?php echo base_url('fblogin');?>" class="btn btn-effect-ripple btn-primary" data-toggle="tooltip"
                   data-placement="left" title="Login with facebook"><i class="fa fa-facebook-square"></i></a>

                <a href="<?php //echo base_url('twitterlogin');?>" class="btn btn-effect-ripple btn-primary" data-toggle="tooltip"
                   data-placement="left" title="Login with twitter"><i class="fa fa-twitter"></i></a>
            </div>

        <h2>Please Login</h2>
    </div>


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


    <?php echo form_open("user_login/verify",'class="form-horizontal"'); ?>
    <input type="hidden" name="user_login" id="user_login" value="user"/>

    <div class="form-group">
        <div class="col-xs-12">
            <input type="text" id="user_email" name="user_email" class="form-control" placeholder="Your email..">
        </div>
    </div>
    <div class="form-group">
        <div class="col-xs-12">
            <input type="password" id="user_password" name="user_password" class="form-control" placeholder="Your password..">
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

</div>


