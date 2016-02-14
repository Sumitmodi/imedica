<div class="row col-md-6">
      <div class="block" >
           <div class="block-title">
                <h2>Add Administrator</h2>
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
                    <label class="col-md-3 control-label" for="admin_name">Full Name</label>
                    <div class="col-md-9">
                        <input type="text" id="admin_name" name="admin_name" class="form-control" placeholder="Enter admin name">

                    </div>
                </div>
                <div class="form-group">
                    <label class="col-md-3 control-label" for="admin_name">Username</label>
                    <div class="col-md-9">
                        <input type="text" id="admin_username" name="admin_username" class="form-control" placeholder="Enter username">

                    </div>
                </div>
                <div class="form-group">
                    <label class="col-md-3 control-label" for="admin_email">Email</label>
                    <div class="col-md-9">
                        <input type="email" id="admin_email" name="admin_email" class="form-control" placeholder="Enter admin email">

                    </div>
                </div>
                <div class="form-group">
                    <label class="col-md-3 control-label" for="admin_password">Password</label>
                    <div class="col-md-9">
                        <input type="password" id="admin_password" name="admin_password" class="form-control" placeholder="Enter admin password">

                    </div>
                </div>

                <div class="form-group">
                    <label class="col-md-3 control-label" for="confirm_admin_password">Confirm Password</label>
                    <div class="col-md-9">
                        <input type="password" id="confirm_admin_password" name="confirm_admin_password" class="form-control" placeholder="Retype password">

                    </div>
                </div>

                <div class="form-group">
                    <label class="col-md-3 control-label" for="status">Status</label>
                    <div class="col-md-4">
                        <select id="admin_status" name="admin_status" class="form-control" size="1">
                            <option value="1">Enable</option>
                            <option value="0">Disable</option>
                        </select>
                    </div>
                </div>
                <div class="form-group form-actions">
                    <div class="col-md-9 col-md-offset-3">
                        <button type="submit" class="btn btn-effect-ripple btn-primary" name="submit">Submit</button>
                        <button type="reset" href="<?php echo base_url('home?module=admin&action=add');?>" class="btn btn-effect-ripple btn-danger">Reset</button>
                    </div>
                </div>
            </form>
      </div>
    </div>
