<div class="col-md-3"></div>
<div class="row col-md-6">
    <div class="block" >
        <div class="block-title">
            <h2>Add Clients</h2>
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
                <label class="col-md-3 control-label" for="client_name">Name</label>
                <div class="col-md-9">
                    <input type="text" id="client_name" name="client_name" class="form-control" placeholder="Enter client name">
                </div>
            </div>

            <div class="form-group">
                <label class="col-md-3 control-label" for="client_phone">Phone No</label>
                <div class="col-md-9">
                    <input type="text" id="client_phone" name="client_phone" class="form-control" placeholder="Enter contact number" >
                </div>
            </div>

            <div class="form-group">
                <label class="col-md-3 control-label" for="client_email">Email</label>
                <div class="col-md-9">
                    <input type="email" id="client_email" name="client_email" class="form-control" placeholder="Enter email" >

                </div>
            </div>

            <div class="form-group">
                <label class="col-md-3 control-label" for="userfile">Logo</label>
                <div class="col-md-9">
                    <input type="file" id="userfile" name="userfile" class="form-control" required>
                    <img id="preview" src="#" alt="Select image" height="150" width="150" style="display:none;"/>
                </div>
            </div>

            <div class="form-group form-actions">
                <div class="col-md-9 col-md-offset-3">
                    <button type="submit" class="btn btn-effect-ripple btn-primary" name="submit"><i class="fa fa-check"></i> Submit</button>
                    <button type="reset" href="<?php echo base_url('admin/clients/form');?>" class="btn btn-effect-ripple btn-danger"><i class="fa fa-times"></i> Reset</button>
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

    $("#userfile").change(function(){
        readIMG(this);
    });


</script>

