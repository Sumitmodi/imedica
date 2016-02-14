<div class="row">
    <!-- Form Validation Block -->
    <div class="block">
        <!-- Form Validation Title -->
        <div class="block-title">
            <h2>Edit News</h2>
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

        <form action="" method="post" class="form-horizontal form-bordered">
            <input type="hidden" name="news_id" id="news_id" value="<?php echo $query[0]->id;?> "/>
            <div class="form-group">
                <label class="col-xs-2 control-label" for="title">Title</label>
                <div class="col-xs-6">
                    <input required type="text" id="title" name="title" class="form-control" value="<?php echo $query[0]->title;?>">
                    <span class="help-block">Please enter news title</span>
                </div>
            </div>

            <div class="form-group">
                <label class="col-xs-2 control-label" for="start_date">Date</label>
                <div class="col-xs-6">
                    <input required type="text" id="date" name="date" class="form-control input-datepicker" data-date-format="yyyy-mm-dd" value="<?php echo date('Y-m-d',$query[0]->date);?> ">
                    <span class="help-block">Please enter news date</span>
                </div>
            </div>

            <div class="form-group">
                <label class="col-xs-2 control-label" for="reporter">Reporter</label>
                <div class="col-xs-6">
                    <input required type="text" id="reporter" name="reporter" class="form-control" value="<?php echo $query[0]->reporter;?>">
                    <span class="help-block">Please enter Reporter</span>
                </div>
            </div>

            <div class="form-group">
                <label class="col-xs-2 control-label" for="reporter">Source</label>
                <div class="col-xs-6">
                    <input required type="text" id="source" name="source" class="form-control" value="<?php echo $query[0]->source;?>">
                    <span class="help-block">Please enter Source</span>
                </div>
            </div>

            <div class="form-group">
                <label class="col-xs-2 control-label"for="content">Description</label>
                <div class="col-xs-10">
                    <textarea required id="description" name="description" class="ckeditor"><?php echo $query[0]->description;?></textarea>
                </div>
            </div>

            <div class="form-group">
                <label class="col-xs-2 control-label" for="status">Status</label>
                <div class="col-md-4">
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

            <div class="form-group">
                <label class="col-xs-2 control-label" for="header_image">Image</label>
                <div class="col-xs-6">
                    <input type="file" id="userfile" name="userfile" class="form-control" >
                    <img id="preview" src="<?php echo $query[0]->img;?>" alt="select image" height="150" width="150" />
                    <!--<img id="preview" src="<?php //echo base_url('uploads/page/'.$query[0]->img);?>" alt="select image" height="150" width="150" />-->
                </div>
            </div>

            <div class="form-group">
                <label class="col-xs-2 control-label" for="reporter">News Source</label>
                <div class="col-xs-6">
                    <input required type="text" id="news_source" name="news_source" class="form-control" value="<?php echo $query[0]->news_source;?>">
                    <span class="help-block">Please enter Source</span>
                </div>
            </div>

            <div class="form-group form-actions">
                <div class="col-xs-6 col-md-offset-3">
                    <button type="submit" class="btn btn-effect-ripple btn-primary" name="submit"><i class="fa fa-check"></i> Submit</button>
                </div>
            </div>
        </form>
    </div>
</div>


<script src="<?php echo base_url('assets/js/plugins/ckeditor/ckeditor.js');?>"></script>
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