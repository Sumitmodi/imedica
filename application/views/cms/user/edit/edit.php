<div class="col-md-3"></div>
<div class="row col-md-6">
    <div class="block" >
        <div class="block-title">
            <h2>Edit User</h2>
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
            <input type="hidden" name="user_id" id="user_id" value="<?php echo $query[0]->id;?> "/>
            <div class="form-group">
                <label class="col-md-3 control-label" for="user_name">Name</label>
                <div class="col-md-9">
                    <input type="text" id="user_name" name="user_name" class="form-control" value="<?php echo $query[0]->name;?>" required>
                    <span class="help-block">Please enter full name</span>
                </div>
            </div>

            <div class="form-group">
                <label class="col-md-3 control-label" for="user_username">Username</label>
                <div class="col-md-9">
                    <input type="text" id="user_username" name="user_username" class="form-control" value="<?php echo $query[0]->username;?>" required>
                    <span class="help-block">Please enter username</span>
                </div>
            </div>

            <div class="form-group">
                <label class="col-md-3 control-label" for="user_location">Password</label>
                <div class="col-md-9">
                    <input type="password" id="user_password" name="user_password" class="form-control" value="" >
                    <span class="help-block">Please enter Password</span>
                </div>
            </div>

            <div class="form-group">
                <label class="col-md-3 control-label" for="confirm_password">Confirm Password</label>
                <div class="col-md-9">
                    <input type="password" id="confirm_password" name="confirm_password" class="form-control" value="" >
                    <span class="help-block">Please enter user location</span>
                </div>
            </div>

            <div class="form-group">
                <label class="col-md-3 control-label" for="user_location">Location</label>
                <div class="col-md-9">
                    <input type="text" id="user_location" name="user_location" class="form-control" value="<?php echo $query[0]->location;?>" required>
                    <span class="help-block">Please enter user location</span>
                </div>
            </div>

            <div class="form-group">
                <label class="col-md-3 control-label" for="user_email">Email</label>
                <div class="col-md-9">
                    <input type="email" id="user_email" name="user_email" class="form-control" value="<?php echo $query[0]->email;?>" required>
                    <span class="help-block">Please enter user email</span>
                </div>
            </div>


            <div class="form-group">
                <label class="col-md-3 control-label" for="user_phone">Phone No.</label>
                <div class="col-md-9">
                    <input type="text" id="user_phone" name="user_phone" class="form-control" value="<?php echo $query[0]->phone_no;?>" required>
                    <span class="help-block">Please enter user phone</span>
                </div>
            </div>

            <div class="form-group">
                <label class="col-md-3 control-label" for="user_status">Status</label>
                <div class="col-md-9">
                    <select id="user_status" name="user_status" class="form-control" size="1">
                        <?php
                        if($query[0]->status == 1)
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
                    <button type="submit" class="btn btn-effect-ripple btn-primary" name="submit"><i class="fa fa-check"></i> Submit</button>
                </div>
            </div>
        </form>
    </div>
</div>

