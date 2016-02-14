<div class="row">
    <div class="col-md-3"></div>
    <div class="row col-md-6">
        <div class="block" >
            <div class="block-title">
                <h2>Update</h2>
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
                <input type="hidden" id="site_id" name="site_id" class="form-control" value="<?php echo $query[0]->id;?>">
                <div class="form-group">
                    <label class="col-md-3 control-label" for="logo">Logo</label>
                    <div class="col-md-9">
                        <input type="file" id="userfile" name="userfile" class="form-control">
                        <img id="preview" src="<?php echo base_url('uploads/site/'.$query[0]->logo);?>" alt="your image" height="150" width="150"/>
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-md-3 control-label" for="email">Email</label>
                    <div class="col-md-9">
                        <input type="email" id="email" name="email" class="form-control" value="<?php echo $query[0]->email;?>"required>
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-md-3 control-label" for="address">Address</label>
                    <div class="col-md-9">
                        <input type="text" id="address" name="address" class="form-control" value="<?php echo $query[0]->address;?>">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-md-3 control-label" for="phone">Phone No</label>
                    <div class="col-md-9">
                        <input type="text" id="phone" name="phone" class="form-control" value="<?php echo $query[0]->phone;?>"required>

                    </div>
                </div>
                <div class="form-group">
                    <label class="col-md-3 control-label" for="opening_day">Opening days</label>
                    <div class="col-md-9">
                        <input type="text" id="opening_day" name="opening_day" class="form-control" value="<?php echo $query[0]->opening_day;?>"required>

                    </div>
                </div>
               <div class="form-group">
                    <label class="col-md-3 control-label" for="opening_hour">Opening hour</label>
                    <div class="col-md-9">
                        <input type="text" id="opening_hour" name="opening_hour" class="form-control" value="<?php echo $query[0]->opening_hour;?>"required>

                    </div>
                </div>
                <div class="form-group">
                    <label class="col-md-3 control-label" for="facebook_link">Facebook Link</label>
                    <div class="col-md-9">
                        <input type="text" id="facebook_link" name="facebook_link" class="form-control" value="<?php echo $query[0]->facebook_link;?>">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-md-3 control-label" for="twitter_link">Twitter Link</label>
                    <div class="col-md-9">
                        <input type="text" id="twitter_link" name="twitter_link" class="form-control" value="<?php echo $query[0]->twitter_link;?>">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-md-3 control-label" for="youtube_link">Youtube Link</label>
                    <div class="col-md-9">
                        <input type="text" id="youtube_link" name="youtube_link" class="form-control" value="<?php echo $query[0]->youtube_link;?>">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-md-3 control-label" for="google_link">Google+ Link</label>
                    <div class="col-md-9">
                        <input type="text" id="google_link" name="google_link" class="form-control" value="<?php echo $query[0]->google_link;?>">
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-md-3 control-label" for="header">Homepage Header</label>
                    <div class="col-md-9">
                        <textarea id="header" name="header" rows="3" class="form-control"><?php echo $query[0]->homepage_header;?></textarea>
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-md-3 control-label" for="footer">Footer</label>
                    <div class="col-md-9">
                        <textarea id="footer" name="footer" rows="3" class="form-control"><?php echo $query[0]->footer;?></textarea>
                    </div>
                </div>

                <div class="form-group form-actions">
                    <div class="col-md-9 col-md-offset-3">
                        <button type="submit" class="btn btn-effect-ripple btn-primary" name="submit"><i class="fa fa-check"></i> Submit</button>
                    </div>
                </div>
            </form>
        </div>
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
