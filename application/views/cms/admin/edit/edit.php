<div class="row col-md-6">
           <div class="block" >
            <div class="block-title">
                <h2>Edit Administrator</h2>
            </div>

            <?php if(isset($message)){ ?>
                <div class="alert alert-success alert-dismissable">
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


            <form action="" method="post" class="form-horizontal form-bordered">
                <input type="hidden" name="admin_id" id="admin_id" value="<?php echo $query[0]->id;?> "/>
                <div class="form-group">
                    <label class="col-md-3 control-label" for="admin_name">Full Name</label>
                    <div class="col-md-9">
                        <input required type="text" id="admin_name" name="admin_name" class="form-control" value="<?php echo $query[0]->admin_name;?>">
                        <span class="help-block">Please enter your name</span>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-md-3 control-label" for="admin_name">Username</label>
                    <div class="col-md-9">
                        <input required type="text" id="admin_username" name="admin_username" class="form-control" value="<?php echo $query[0]->admin_username;?>">
                        <span class="help-block">Please enter your username</span>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-md-3 control-label" for="admin_email">Email</label>
                    <div class="col-md-9">
                        <input required type="email" id="admin_email" name="admin_email" class="form-control" value="<?php echo $query[0]->admin_email;?>">
                        <span class="help-block">Please enter your email</span>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-md-3 control-label" for="admin_password">Password</label>
                    <div class="col-md-9">
                        <input required type="password" id="admin_password" name="admin_password" class="form-control" value="">
                        <span class="help-block">Please enter your password</span>
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-md-3 control-label" for="confirm_admin_password">Confirm Password</label>
                    <div class="col-md-9">
                        <input type="password" id="confirm_admin_password" name="confirm_admin_password" class="form-control" value="">
                        <span class="help-block">Re-enter your password</span>

                    </div>
                </div>

                <div class="form-group">
                    <label class="col-md-3 control-label" for="admin_status">Status</label>
                    <div class="col-md-4">
                        <select id="admin_status" name="admin_status" class="form-control">

                            <?php
                            if($query[0]->admin_status == 1)
                            {?>
                                <option value="1" selected="selected">Enable</option>
                                <option value="0">Disable</option>
                            <?php }
                            else
                            {?>
                                <option value="1">Enable</option>
                                <option value="0" selected="selected">Disable</option>

                            <?php } ?>
                        </select>
                    </div>
                </div>
                <div class="form-group form-actions">
                    <div class="col-md-9 col-md-offset-3">
                        <button type="submit" class="btn btn-effect-ripple btn-primary" name="submit">Submit</button>
                    </div>
                </div>
            </form>
           </div>
    </div>
