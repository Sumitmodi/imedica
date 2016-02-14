<div class="col-md-3"></div>
<div class="row col-md-6">
    <div class="block" >
        <div class="block-title">
            <h2>Add Doctors</h2>
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
                <label class="col-md-3 control-label" for="doctor_name">Name</label>
                <div class="col-md-9">
                   <input type="text" id="doctor_name" name="doctor_name" class="form-control" placeholder="Enter doctor name"required>
                </div>
            </div>

            <div class="form-group">
                <label class="col-md-3 control-label" for="profile_img">Profile image</label>
                <div class="col-md-9">
                    <input type="file" id="userfile" name="userfile" class="form-control" required>
                    <img id="preview" src="#" alt="your image" height="150" width="150" style="display:none;"/>
                </div>
            </div>

            <div class="form-group">
                <label class="col-md-3 control-label" for="category">Specification</label>
                <div class="col-md-9">
                    <select id="specification" name="specification" class="form-control" size="1">
                        <?php $a=$this->admin_model->table_fetch_rows('doctor_category');
                        $doc=(array)($a);
                        //print_r($cat);
                        foreach($doc as $d){ ?>
                            <option value="<?php echo $d->id;?>"><?php echo $d->category_name;?></option>
                        <?php }?>
                    </select>
                </div>
            </div>

            <div class="form-group">
                <label class="col-md-3 control-label" for="specialization">Specialization</label>
                <div class="col-md-9">
                    <input type="text" id="specialization" name="specialization" class="form-control" placeholder="Enter Doctor specialization" required>

                </div>
            </div>

            <div class="form-group">
                <label class="col-md-3 control-label" for="degree">Degree</label>
                <div class="col-md-9">
                    <input type="text" id="degree" name="degree" class="form-control" placeholder="Enter Doctor Degree" required>

                </div>
            </div>

            <div class="form-group">
                <label class="col-md-3 control-label" for="doctor_location">Location</label>
                <div class="col-md-9">
                    <input type="text" id="doctor_location" name="doctor_location" class="form-control" placeholder="Enter Doctor location" required>

                </div>
            </div>

            <div class="form-group">
                <label class="col-md-3 control-label" for="doctor_email">Email</label>
                <div class="col-md-9">
                    <input type="email" id="doctor_email" name="doctor_email" class="form-control" placeholder="Enter doctor email" required>

                </div>
            </div>


            <div class="form-group">
                <label class="col-md-3 control-label" for="doctor_phone">Phone No.</label>
                <div class="col-md-9">
                    <input type="text" id="doctor_phone" name="doctor_phone" class="form-control" placeholder="Enter Doctor phone" required>

                </div>
            </div>

            <div class="form-group form-actions">
                <div class="col-md-9 col-md-offset-3">
                    <button type="submit" class="btn btn-effect-ripple btn-primary" name="submit"><i class="fa fa-check"></i> Submit</button>
                    <button type="reset" href="<?php echo base_url('admin/doctors/add');?>" class="btn btn-effect-ripple btn-danger"><i class="fa fa-times"></i> Reset</button>
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


