<div class="col-md-3"></div>
<div class="row col-md-6">
    <div class="block">

        <div class="block-title">
            <h2>Add Slider</h2>
        </div>

        <?php if (isset($message)) { ?>
            <div class="alert alert-success alert-dismissable">
                <?php
                echo $message;
                ?>
            </div>
            <?php
        } ?>

        <form action="" method="post" class="form-horizontal form-bordered" enctype="multipart/form-data">

            <div class="form-group">
                <label class="col-md-3 control-label" for="slider_title">Title</label>

                <div class="col-md-9">
                    <input type="text" id="slider_title" name="slider_title" class="form-control"
                           placeholder="Enter title">
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
                <label class="col-md-3 control-label" for="slider_link">Link</label>

                <div class="col-md-9">
                    <input type="text" id="slider_link" name="slider_link" class="form-control"
                           placeholder="Enter link">
                </div>
            </div>

            <div class="form-group">
                <label class="col-md-3 control-label" for="description">Description</label>

                <div class="col-md-9">
                    <textarea id="description" rows="3" cols="47" name="description" class="form-control"
                              placeholder="Enter description"></textarea>
                </div>
            </div>

            <div class="form-group">
                <label class="col-md-3 control-label" for="status">Status</label>

                <div class="col-md-9">
                    <select id="status" name="status" class="form-control" size="1">
                        <option value="1">Enable</option>
                        <option value="0">Disable</option>
                    </select>
                </div>
            </div>

            <div class="form-group form-actions">
                <div class="col-md-9 col-md-offset-3">
                    <button type="submit" class="btn btn-effect-ripple btn-primary"><i class="fa fa-check"></i> Submit
                    </button>
                    <button href="<?php echo base_url('admin/slider/form'); ?>" type="reset"
                            class="btn btn-effect-ripple btn-danger"><i class="fa fa-times"></i> Reset
                    </button>
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

