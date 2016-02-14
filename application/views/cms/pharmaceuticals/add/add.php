<div class="col-md-3"></div>
<div class="row col-md-6">
    <div class="block" >
        <div class="block-title">
            <h2>Add Pharmaceuticals</h2>
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
                <label class="col-md-3 control-label" for="pharmaceuticals_name">Name</label>
                <div class="col-md-9">
                    <input type="text" id="pharmaceuticals_name" name="pharmaceuticals_name" class="form-control" placeholder="Enter pharmaceuticals name"required>

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
                <label class="col-md-3 control-label" for="pharmaceuticals_location">Location</label>
                <div class="col-md-9">
                    <input type="text" id="pharmaceuticals_location" name="pharmaceuticals_location" class="form-control" placeholder="Enter pharmaceuticals location" required>

                </div>
            </div>

            <div class="form-group">
                <label class="col-md-3 control-label" for="pharmaceuticals_email">Email</label>
                <div class="col-md-9">
                    <input type="email" id="pharmaceuticals_email" name="pharmaceuticals_email" class="form-control" placeholder="Enter pharmaceuticals email">

                </div>
            </div>


            <div class="form-group">
                <label class="col-md-3 control-label" for="pharmaceuticals_phone">Phone No.</label>
                <div class="col-md-9">
                    <input type="text" id="pharmaceuticals_phone" name="pharmaceuticals_phone" class="form-control" placeholder="Enter pharmaceuticals phone" required>

                </div>
            </div>

            <div class="form-group form-actions">
                <div class="col-md-9 col-md-offset-3">
                    <button type="submit" class="btn btn-effect-ripple btn-primary" name="submit"><i class="fa fa-check"></i> Submit</button>
                    <button type="reset" href="<?php echo base_url('admin/pharmaceuticals/add');?>" class="btn btn-effect-ripple btn-danger"><i class="fa fa-times"></i> Reset</button>
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

