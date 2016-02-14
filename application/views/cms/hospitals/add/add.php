<div class="col-md-3"></div>
<div class="row col-md-6">
    <div class="block" >
        <div class="block-title">
            <h2>Add Hospital</h2>
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
            <div class="form-group">
                <label class="col-md-3 control-label" for="hospital_name">Name</label>
                <div class="col-md-9">
                    <input type="text" id="hospital_name" name="hospital_name" class="form-control" placeholder="Enter Hospital name"required>
                </div>
            </div>

            <div class="form-group">
                <label class="col-md-3 control-label" for="logo">Logo</label>
                <div class="col-md-9">
                    <input type="file" id="userfile" name="userfile" class="form-control" required>
                    <img id="preview" src="#" alt="your image" height="150" width="150" style="display:none;"/>
                </div>
            </div>

            <div class="form-group">
                <label class="col-md-3 control-label" for="hospital_location">Location</label>
                <div class="col-md-9">
                    <input type="text" id="hospital_location" name="hospital_location" class="form-control" placeholder="Enter Hospital location" required>

                </div>
            </div>

            <div class="form-group">
                <label class="col-md-3 control-label">Emergency Service</label>
                <div class="col-md-9">
                    <label class="radio-inline" for="yes">
                        <input type="radio" id="yes" name="emergency_service" checked="checked" value="yes"> YES
                    </label>
                    <label class="radio-inline" for="no">
                        <input type="radio" id="no" name="emergency_service" value="no"> NO
                    </label>
                </div>
            </div>

            <div class="form-group">
                <label class="col-md-3 control-label" for="ambulance">Ambulance Number</label>
                <div class="col-md-9">
                    <input type="number" id="ambulance" name="ambulance" class="form-control" placeholder="Enter Ambulance Number" >
                </div>
            </div>

            <div class="form-group">
                <label class="col-md-3 control-label" for="hospital_phone">Phone No.</label>
                <div class="col-md-9">
                    <input type="text" id="hospital_phone" name="hospital_phone" class="form-control" placeholder="Enter Hospital phone" required>

                </div>
            </div>

            <div class="form-group">
                <label class="col-md-3 control-label" for="hospital_email">Email</label>
                <div class="col-md-9">
                    <input type="email" id="hospital_email" name="hospital_email" class="form-control" placeholder="Enter Hospital email" required>

                </div>
            </div>

            <div class="form-group form-actions">
                <div class="col-md-9 col-md-offset-3">
                    <button type="submit" class="btn btn-effect-ripple btn-primary" name="submit"><i class="fa fa-check"></i> Submit</button>
                    <button type="reset" href="<?php echo base_url('admin/hospitals/add');?>" class="btn btn-effect-ripple btn-danger"><i class="fa fa-times"></i> Reset</button>
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

