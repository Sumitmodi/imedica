<div class="col-md-3"></div>
<div class="row col-md-6">
    <div class="block" >
        <div class="block-title">
            <h2>Edit Author</h2>
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
            <input type="hidden" id="project_id" name="project_id" class="form-control" value="<?php echo $query[0]->id;?>">

            <div class="form-group">
                <label class="col-md-3 control-label" for="project_name">Author</label>
                <div class="col-md-9">
                    <input type="text" id="title" name="title" class="form-control" value="<?php echo $query[0]->title;?>">
                </div>
            </div>

            <div class="form-group">
                <label class="col-md-3 control-label" for="name">Post</label>
                <div class="col-md-9">
                    <input type="text" id="post" name="post" class="form-control" value="<?php echo $query[0]->post;?>">
                </div>
            </div>


            <div class="form-group">
                <label class="col-md-3 control-label" for="project_phone">Description</label>
                <div class="col-md-9">
                    <textarea class="form-control" name="description" id = "description" ><?php echo $query[0]->description;?></textarea>
                </div>
            </div>

            <div class="form-group">
                <label class="col-md-3 control-label" for="userfile">Image</label>
                <div class="col-md-9">
                    <input type="file" id="userfile" name="userfile" class="form-control">
                    <img id="preview" src="<?php echo base_url('uploads/author'.$query[0]->image);?>" alt="Select image" height="150" width="150" />
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

