<div class="col-md-3"></div>
<div class="row col-md-6">
    <div class="block" >
        <div class="block-title">
            <h2>Why Choose Us?</h2>
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
        <?php $count=strlen($query[0]->description);?>

        <form action="" method="post" class="form-horizontal form-bordered" enctype="multipart/form-data">
            <div class="form-group">
                <label class="col-md-3 control-label" for="hospital_name">Title</label>
                <div class="col-md-9">
                    <input type="text" id="title" name="title" class="form-control" value="<?php echo $query[0]->title;?>" required>
                </div>
            </div>

<!--            <div class="form-group">-->
<!--                <label class="col-md-3 control-label" for="image">Image</label>-->
<!--                <div class="col-md-9">-->
<!--                    <input type="file" id="userfile" name="userfile" class="form-control">-->
<!--                    <img id="preview" src="--><?php //echo base_url('uploads/why_choose_us/'.$query[0]->image);?><!--" alt="your image" height="150" width="150" />-->
<!--                </div>-->
<!--            </div>-->

            <div class="form-group">
                <label class="col-md-3 control-label" for="description">Description</label>
                <div class="col-md-9">
                   <textarea required id="description" name="description" class="form-control"  onKeyDown="limitText(this.form.description,this.form.countdown,200);"
                             onKeyUp="limitText(this.form.description,this.form.countdown,200);" cols="47"><?php echo $query[0]->description;?></textarea><br>
                    <font size="1">(Maximum characters: 200)<br>
                        You have <input readonly type="text" name="countdown" size="3" value="<?php echo (200-$count);?>"> characters left.</font>
                </div>
            </div>

            <div class="form-group form-actions">
                <div class="col-md-9 col-md-offset-3">
                    <button type="submit" class="btn btn-effect-ripple btn-primary" name="submit"><i class="fa fa-check"></i> Submit</button>
                    <button type="reset" href="<?php echo base_url('admin/why_choose_us/add');?>" class="btn btn-effect-ripple btn-danger"><i class="fa fa-times"></i> Reset</button>
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

<script language="javascript" type="text/javascript">
    function limitText(limitField, limitCount, limitNum) {
        if (limitField.value.length > limitNum) {
            limitField.value = limitField.value.substring(0, limitNum);
        } else {
            limitCount.value = limitNum - limitField.value.length;
        }
    }
</script>

