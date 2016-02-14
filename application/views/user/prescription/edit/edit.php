<div class="col-md-3"></div>
<div class="row col-md-6">
    <div class="block" >
        <div class="block-title">
            <h2>Add Patient</h2>
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
            <input type="hidden" name="patient_id" id="patient_id" value="<?php echo $query[0]->id;?> "/>
            <div class="form-group">
                <label class="col-md-3 control-label" for="parent_id">Parent</label>
                <div class="col-md-9">
                    <select id="parent_id" name="parent_id" class="form-control" size="1">
                        <?php $session_data=$this->session->userdata('login');
                        $id = $session_data->id;
                        $name = $session_data->name;?>
                        <option value="<?php echo $id;?>"><?php echo $name;?></option>
                    </select>
                </div>
            </div>

            <div class="form-group">
                <label class="col-md-3 control-label" for="patient">Name</label>
                <div class="col-md-9">
                    <input type="text" id="patient" name="patient" class="form-control" value="<?php echo $query[0]->patient;?>" required>
                    <span class="help-block">Please enter patient name</span>
                </div>
            </div>

            <div class="form-group">
                <label class="col-md-3 control-label" for="patient_age">Age</label>
                <div class="col-md-9">
                    <input type="number" id="patient_age" name="patient_age" class="form-control" value="<?php echo $query[0]->age;?>" required>
                    <span class="help-block">Please enter Patient age</span>
                </div>
            </div>

            <div class="form-group">
                <label class="col-md-3 control-label" for="patient_location">Location</label>
                <div class="col-md-9">
                    <input type="text" id="patient_location" name="patient_location" class="form-control" value="<?php echo $query[0]->location;?>" required>
                    <span class="help-block">Please enter Patient location</span>
                </div>
            </div>

            <div class="form-group">
                <label class="col-md-3 control-label" for="patient_email">Email</label>
                <div class="col-md-9">
                    <input type="email" id="patient_email" name="patient_email" class="form-control" value="<?php echo $query[0]->email;?>" required>
                    <span class="help-block">Please enter Patient email</span>
                </div>
            </div>


            <div class="form-group">
                <label class="col-md-3 control-label" for="patient_phone">Phone No.</label>
                <div class="col-md-9">
                    <input type="text" id="patient_phone" name="patient_phone" class="form-control" value="<?php echo $query[0]->phone_no;?>" required>
                    <span class="help-block">Please enter Patient phone</span>
                </div>
            </div>

            <div class="form-group form-actions">
                <div class="col-md-9 col-md-offset-3">
                    <button type="submit" class="btn btn-effect-ripple btn-primary" name="submit"><i class="fa fa-check"></i> Submit</button>
                    <button type="reset" href="<?php echo base_url('user/patient/add');?>" class="btn btn-effect-ripple btn-danger"><i class="fa fa-times"></i> Reset</button>
                </div>
            </div>
        </form>
    </div>
</div>

