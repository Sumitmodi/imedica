<div class="col-md-3"></div>
<div class="row col-md-6">
<div class="block">

    <div class="block-title">
        <h2>Add Testimonials</h2>
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
        <div class="form-group">
            <label class="col-md-3 control-label" for="name">Name</label>
            <div class="col-md-9">
                <input type="text" id="name" name="name" class="form-control col-md-9" placeholder="Enter name" required>
            </div>
        </div>
        <div class="form-group">
            <label class="col-md-3 control-label" for="post">Post</label>
            <div class="col-md-9">
                <input type="text" id="post" name="post" class="form-control col-md-9" placeholder="Enter post" required>
            </div>
        </div>
        <input type="hidden" id="url" name="url" class="form-control" >

        <div class="form-group">
            <label class="col-md-3 control-label" for="description">Description</label>
            <div class="col-md-9">
                <textarea id="content" rows="3" cols="47" name="description" required></textarea>
            </div>
        </div>
        <div class="form-group">
            <label class="col-md-3 control-label" for="userfile">Image</label>
            <div class="col-md-9">
                <input type="file" id="userfile" name="userfile" class="form-control" required>
                <img id="preview" src="#" alt="Select image" height="150" width="150" style="display:none;"/>
            </div>
        </div>

        <div class="form-group">
            <label class="col-md-3 control-label" for="status">Status</label>
            <div class="col-md-4">
                <select id="status" name="status" class="form-control" size="1">
                    <option value="1">Enable</option>
                    <option value="0">Disable</option>
                </select>
            </div>
        </div>

        <div class="form-group form-actions">
            <div class="col-md-9 col-md-offset-3">
                <button type="submit" class="btn btn-effect-ripple btn-primary"><i class="fa fa-check"></i> Submit</button>
                <button href="<?php echo base_url('admin/testimonials/form');?>"type="reset" class="btn btn-effect-ripple btn-danger"><i class="fa fa-times"></i> Reset</button>
            </div>
        </div>
    </form>
</div>
</div>

<script type="text/javascript">
    $(function () {
        $('#testimonials_title').keyup(function () {
            var title = $(this).val();
            if (title === '')
            {
                return;
            }

            title = title.toLowerCase();
            title = title.replace(/[^a-z0-9 ]+/g, '');
            title = title.replace('  ', ' ');

            var url = '/testimonials-' + title.replace(/\s/g, '-') + '.html';
            $('#url').val(url);
        });
    });
</script>
