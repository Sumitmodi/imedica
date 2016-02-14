<div class="col-md-3"></div>
<div class="row col-md-6">
    <div class="block" >
        <div class="block-title">
            <h2>Add User</h2>
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
            <div class="form-group">
                <label class="col-md-3 control-label" for="user_name">Name</label>
                <div class="col-md-9">
                    <input type="text" id="user_name" name="user_name" class="form-control" placeholder="Enter full name" required>
                </div>
            </div>

            <div class="form-group">
                <label class="col-md-3 control-label" for="user_username">Username</label>
                <div class="col-md-9">
                    <input type="text" id="user_username" name="user_username" class="form-control" placeholder="Enter Username" required>
                </div>
            </div>

            <div class="form-group">
                <label class="col-md-3 control-label" for="user_location">Password</label>
                <div class="col-md-9">
                    <input type="password" id="user_password" name="user_password" class="form-control" placeholder="Enter User password" required >
                </div>
            </div>

            <div class="form-group">
                <label class="col-md-3 control-label" for="confirm_password">Confirm Password</label>
                <div class="col-md-9">
                    <input type="password" id="confirm_password" name="confirm_password" class="form-control" placeholder="Enter Password again" required >
                </div>
            </div>


            <div class="form-group">
                <label class="col-md-3 control-label" for="user_location">Location</label>
                <div class="col-md-9">
                    <input type="text" id="user_location" name="user_location" class="form-control" placeholder="Enter User location" required>

                </div>
            </div>

            <div class="form-group">
                <label class="col-md-3 control-label" for="user_email">Email</label>
                <div class="col-md-9">
                    <input type="email" id="user_email" name="user_email" class="form-control" placeholder="Enter User email" required>

                </div>
            </div>


            <div class="form-group">
                <label class="col-md-3 control-label" for="user_phone">Phone No.</label>
                <div class="col-md-9">
                    <input type="text" id="user_phone" name="user_phone" class="form-control" placeholder="Enter User phone" required>

                </div>
            </div>


            <div class="form-group">
                <label class="col-md-3 control-label" for="user_status">Status</label>
                <div class="col-md-9">
                    <select id="user_status" name="user_status" class="form-control" size="1">
                        <option value="1">Enable</option>
                        <option value="0">Disable</option>
                    </select>
                </div>
            </div>

            <div class="form-group form-actions">
                <div class="col-md-9 col-md-offset-3">
                    <button type="submit" class="btn btn-effect-ripple btn-primary" name="submit"><i class="fa fa-check"></i> Submit</button>
                    <button type="reset" href="<?php echo base_url('admin/user/add');?>" class="btn btn-effect-ripple btn-danger"><i class="fa fa-times"></i> Reset</button>
                </div>
            </div>
        </form>
    </div>
</div>

