<div class="col-md-3"></div>
<div class="row col-md-6">
    <div class="row">
        <div class="block" >

            <div class="block-title">
                <h2>Edit Slider</h2>
            </div>

            <?php if(isset($message)){ ?>
                <div class="alert alert-success alert-dismissable">
                    <?php
                    echo $message;
                    ?>
                </div>
                <?php
            }?>

            <form action="" method="post" class="form-horizontal form-bordered" enctype="multipart/form-data">
                <input type="hidden" name="slider_id" id="slider_id" value="<?php echo $query[0]->id;?> "/>
                <div class="form-group">
                    <label class="col-md-3 control-label" for="slider_title">Title</label>
                    <div class="col-md-9">
                        <input type="text" id="slider_title" name="slider_title" class="form-control col-md-9" value="<?php echo $query[0]->title;?> ">
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-md-3 control-label" for="userfile">Image</label>
                    <div class="col-md-9">
                        <input type="file" id="userfile" name="userfile" class="form-control" >
                        <img id="preview" src="<?php echo base_url('uploads/slider/'.$query[0]->image);?>" alt="Select image" height="150" width="150" />
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-md-3 control-label" for="slider_link">Link</label>
                    <div class="col-md-9">
                        <input type="text" id="slider_link" name="slider_link" class="form-control" value="<?php echo $query[0]->link;?> ">
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-md-3 control-label" for="description">Description</label>
                    <div class="col-md-9">
                        <textarea id="description" rows="3" cols="47" name="description" class="form-control" required><?php echo $query[0]->description;?></textarea>
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-md-3 control-label" for="status">Status</label>
                    <div class="col-md-9">
                        <select id="status" name="status" class="form-control">

                            <?php
                            if($query[0]->status == 1)
                            {?>
                                <option value="1" selected="selected">Enable</option>
                                <option value="0">Disable</option>
                            <?php }
                            else
                            {?>
                                <option value="1">Enable</option>
                                <option value="0" selected="selected">Disable</option>

                            <?php } ?>
                        </select>
                    </div>
                </div>

                <div class="form-group form-actions">
                    <div class="col-md-9 col-md-offset-3">
                        <button type="submit" class="btn btn-effect-ripple btn-primary"><i class="fa fa-check"></i> Submit</button>
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
                }

            reader.readAsDataURL(input.files[0]);
        }
    }

    $("#userfile").change(function(){
        readIMG(this);
    });
</script>









