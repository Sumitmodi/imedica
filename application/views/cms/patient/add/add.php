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
            <div class="form-group">
                <label class="col-md-3 control-label" for="patient">Name</label>
                <div class="col-md-9">
                    <input type="text" id="patient" name="patient" class="form-control" placeholder="Enter Patient Name" required>
                </div>
            </div>

            <div class="form-group">
                <label class="col-md-3 control-label" for="patient_age">Age</label>
                <div class="col-md-9">
                    <input type="number" id="patient_age" name="patient_age" class="form-control" placeholder="Enter patient age" required>
                </div>
            </div>

            <div class="form-group">
                <label class="col-md-3 control-label" for="patient_location">Location</label>
                <div class="col-md-9">
                    <input type="text" id="patient_location" name="patient_location" class="form-control" placeholder="Enter patient location" required>
                </div>
            </div>

            <div class="form-group">
                <label class="col-md-3 control-label" for="patient_email">Email</label>
                <div class="col-md-9">
                    <input type="email" id="patient_email" name="patient_email" class="form-control" placeholder="Enter patient email" required>

                </div>
            </div>


            <div class="form-group">
                <label class="col-md-3 control-label" for="patient_phone">Phone No.</label>
                <div class="col-md-9">
                    <input type="text" id="patient_phone" name="patient_phone" class="form-control" placeholder="Enter patient phone" required>
                </div>
            </div>

            <div class="form-group form-actions">
                <div class="col-md-9 col-md-offset-3">
                    <button type="submit" class="btn btn-effect-ripple btn-primary" name="submit"><i class="fa fa-check"></i> Submit</button>
                    <button type="reset" href="<?php echo base_url('admin/patient/add');?>" class="btn btn-effect-ripple btn-danger"><i class="fa fa-times"></i> Reset</button>
                </div>
            </div>
        </form>
    </div>
</div>

