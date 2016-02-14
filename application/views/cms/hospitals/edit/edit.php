<div class="col-md-3"></div>
<div class="row col-md-6">
    <div class="block" >
        <div class="block-title">
            <h2>Edit Hospital</h2>
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

        <form action="" method="post" class="form-horizontal form-bordered" enctype="multipart/form-data">
            <input type="hidden" name="hospital_id" id="hospital_id" value="<?php echo $query[0]->id;?> "/>

            <div class="form-group">
                <label class="col-md-3 control-label" for="hospital_name">Name</label>
                <div class="col-md-9">
                    <input type="text" id="hospital_name" name="hospital_name" class="form-control" value="<?php echo $query[0]->hospital_name;?>" required>
                    <span class="help-block">Please enter Hospital name</span>
                </div>
            </div>

            <div class="form-group">
                <label class="col-md-3 control-label" for="logo">Logo</label>
                <div class="col-md-9">
                    <input type="file" id="userfile" name="userfile" class="form-control" >
                    <img id="preview" src="<?php echo base_url('uploads/hospitals/'.$query[0]->logo);?>" alt="select image" height="150" width="150" />
                </div>
            </div>

            <div class="form-group">
                <label class="col-md-3 control-label" for="hospital_location">Location</label>
                <div class="col-md-9">
                    <input type="text" id="hospital_location" name="hospital_location" class="form-control" value="<?php echo $query[0]->location;?>" required>
                    <span class="help-block">Please enter Hospital location</span>
                </div>
            </div>

            <div class="form-group">
                <label class="col-md-3 control-label">Emergency Service</label>
                <div class="col-md-9">
                    <?php if(($query[0]->emergency_service) == 'yes'){?>
                    <label class="radio-inline" for="yes">
                        <input type="radio" id="yes" name="emergency_service" checked="checked" value="yes"> YES
                    </label>
                        <label class="radio-inline" for="no">
                            <input type="radio" id="no" name="emergency_service" value="no"> NO
                        </label>
                    <?php  }else {?>
                        <label class="radio-inline" for="yes">
                            <input type="radio" id="yes" name="emergency_service" value="yes"> YES
                        </label>
                    <label class="radio-inline" for="no">
                        <input type="radio" id="no" name="emergency_service" checked="checked" value="no"> NO
                    </label>
                    <?php } ?>
                </div>
            </div>

            <div class="form-group">
                <label class="col-md-3 control-label" for="ambulance">Ambulance Number</label>
                <div class="col-md-9">
                    <input type="number" id="ambulance" name="ambulance" class="form-control" value="<?php echo $query[0]->ambulance;?>">
                    <span class="help-block">Please enter Ambulance number</span>
                </div>
            </div>

            <div class="form-group">
                <label class="col-md-3 control-label" for="hospital_phone">Phone No.</label>
                <div class="col-md-9">
                    <input type="text" id="hospital_phone" name="hospital_phone" class="form-control" value="<?php echo $query[0]->phone_no;?>" required>
                    <span class="help-block">Please enter Hospital phone number</span>
                </div>
            </div>

            <div class="form-group">
                <label class="col-md-3 control-label" for="hospital_email">Email</label>
                <div class="col-md-9">
                    <input type="email" id="hospital_email" name="hospital_email" class="form-control" value="<?php echo $query[0]->email;?>" required>
                    <span class="help-block">Please enter Hospital email</span>
                </div>
            </div>

            <!--<div class="form-group">
                <label class="col-md-3 control-label">Doctors</label>
                <div class="col-md-9">
                    <?php //$doctors=$this->admin_model->show_all_doctors();
                    //foreach($doctors as $key=>$doctor){?>
                        <label class="checkbox-inline" for="<?php //echo $doctor->name;?>">
                            <input type="checkbox" id="doctor<?php //echo $key+1;?>" name="doctor[]" value="<?php //echo $doctor->id;?>"><?php //echo $doctor->name;?>
                        </label>
                    <?php //}?>
                </div>
            </div>-->

            <div class="form-group form-actions">
                <div class="col-md-9 col-md-offset-3">
                    <button type="submit" class="btn btn-effect-ripple btn-primary" name="submit"><i class="fa fa-check"></i> Submit</button>
                </div>
            </div>
        </form>
    </div>
</div>

<script type="text/javascript">
    function readIMG(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function (e) {
                $('#preview').attr('src', e.target.result);
                $('#preview').show();
            }

            reader.readAsDataURL(input.files[0]);
        }
    }

    $("#userfile").change(function () {
        readIMG(this);
    });

</script>

