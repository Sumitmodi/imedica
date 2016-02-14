<?php @session_start(); ?>
<!-- Alternative Sidebar -->
<div id="sidebar-alt" tabindex="-1" aria-hidden="true">
    <!-- Toggle Alternative Sidebar Button (visible only in static layout) -->
    <a href="javascript:void(0)" id="sidebar-alt-close" onclick="App.sidebar('toggle-sidebar-alt');"><i class="fa fa-times"></i></a>

    <!-- Wrapper for scrolling functionality -->
    <div id="sidebar-scroll-alt">
        <!-- Sidebar Content -->
        <div class="sidebar-content">
            <!-- Profile -->
            <div class="sidebar-section">
                <h2 class="text-light">Profile</h2>
                <?php if($this->session->userdata('logged_in')){ ?>
                <form action="<?php echo base_url('admin/admin/edit/'.$admin->id);?>" method="post" class="form-control-borderless">
                    <div class="form-group">
                        <label for="admin_name">Full Name</label>
                        <input type="text" id="admin_name" name="admin_name" class="form-control" value="<?php echo $admin->admin_name;?>">
                    </div>
                    <div class="form-group">
                        <label for="admin_username">Username</label>
                        <input type="text" id="admin_username" name="admin_username" class="form-control" value="<?php echo $admin->admin_username;?>">
                    </div>
                    <div class="form-group">
                        <label for="admin_email">Email</label>
                        <input type="email" id="admin_email" name="admin_email" class="form-control" value="<?php echo $admin->admin_email;?>">
                    </div>
                    <div class="form-group">
                        <label for="admin_password">New Password</label>
                        <input type="password" id="admin_password" name="admin_password" class="form-control">
                    </div>
                    <input type="hidden" name="status" value="1"/>

                    <div class="form-group remove-margin">
                        <button type="submit" class="btn btn-effect-ripple btn-primary" onclick="App.sidebar('close-sidebar-alt');">Save</button>
                    </div>
                </form>
                <?php } else { ?>
                    <form action="<?php echo base_url('user/user/edit/'.$user->id);?>" method="post" class="form-control-borderless">
                        <?php $data = $this->admin_model->table_fetch_row('user',array('id'=>$user->id));?>
                        <div class="form-group">
                            <label  for="user_name">Full Name</label>
                            <input type="text" id="user_name" name="user_name" class="form-control" value="<?php echo $data[0]->name;?>">
                        </div>

                        <div class="form-group">
                            <label for="username">Username</label>
                            <input type="text" id="user_username" name="user_username" class="form-control" value="<?php echo $data[0]->username;?>">
                        </div>

                        <div class="form-group">
                            <label  for="user_email">Email</label>
                            <input type="email" id="user_email" name="user_email" class="form-control" value="<?php echo $data[0]->email;?>">
                        </div>

                        <div class="form-group">
                            <label  for="user_password">Password</label>
                            <input type="password" id="user_password" name="user_password" class="form-control" value="">
                        </div>

                        <div class="form-group">
                            <label  for="confirm_user_password">Confirm Password</label>
                            <input type="password" id="confirm_password" name="confirm_password" class="form-control">
                        </div>

                        <div class="form-group">
                            <label for="username">Location</label>
                            <input type="text" id="user_location" name="user_location" class="form-control" value="<?php echo $data[0]->location;?>">
                        </div>

                        <div class="form-group">
                            <label for="username">Phone Number</label>
                            <input type="number" id="user_phone" name="user_phone" class="form-control" value="<?php echo $data[0]->phone_no;?>">
                        </div>

                        <div class="form-group remove-margin">
                            <button type="submit" class="btn btn-effect-ripple btn-primary" onclick="App.sidebar('close-sidebar-alt');">Save</button>
                        </div>
                    </form>

                <?php } ?>
            </div>
            <!-- END Profile -->
        </div>
        <!-- END Sidebar Content -->
    </div>
    <!-- END Wrapper for scrolling functionality -->
</div>
<!-- END Alternative Sidebar -->

