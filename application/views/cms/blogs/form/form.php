
    <div class="block" >
        <div class="block-title">
            <h2>Add Blogs</h2>
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
                <label class="col-md-3 control-label" for="partner_name">Title</label>
                <div class="col-md-9">
                    <input type="text" id="title" name="title" class="form-control" placeholder="Enter title">
                </div>
            </div>
            <div class="form-group">
                <label class="col-md-3 control-label" for="name">Category</label>
                <div class="col-md-9">
                    <input type="text" id="category" name="category" class="form-control" placeholder="Enter category">
                </div>
            </div>
            <div class="form-group">
                <label class="col-md-3 control-label" for="name">Author</label>
                <div class="col-md-9">
                <select id="author" name="author" class="form-control">
                <?php $authors =$this->admin_model->table_fetch_rows('author');
                foreach($authors as $author){ ?>
                    <option value="<?php echo $author->id;?>"><?php echo $author->title;?></option>
                <?php } ?>
                </select>
                </div>
            </div>

            <div class="form-group">
                <label class="col-md-3 control-label" for="date">Blog Date</label>
                <div class="col-md-9">
                    <input type="text" id="date" name="date" class="form-control input-datepicker" data-date-format="yyyy-mm-dd" placeholder="yyyy-mm-dd" required>
                </div>
            </div>

        
            <div class="form-group">
                <label class="col-md-3 control-label" for="project_description">Description</label>
                <div class="col-md-9">
                    <textarea class="ckeditor" name="description" id = "description" ></textarea>
                </div>
            </div>

            <div class="form-group">
                <label class="col-md-3 control-label" for="userfile">Image</label>
                <div class="col-md-9">
                    <input type="file" id="userfile" name="userfile" class="form-control">
                    <img id="preview" src="" alt="Select image" height="150" width="150" style="display:none"/>
                </div>
            </div>

            <div class="form-group form-actions">
                <div class="col-md-9 col-md-offset-3">
                    <button type="submit" class="btn btn-effect-ripple btn-primary" name="submit"><i class="fa fa-check"></i> Submit</button>
                    <button type="reset" href="<?php echo base_url('admin/blogs/form');?>" class="btn btn-effect-ripple btn-danger"><i class="fa fa-times"></i> Reset</button>
                </div>
            </div>
        </form>
    </div>

<script src="<?php echo base_url('assets/js/plugins/ckeditor/ckeditor.js');?>"></script>

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

