<div class="col-md-3"></div>
<div class="row col-md-6">
    <div class="block">

        <div class="block-title">
            <h2>Add Services</h2>
        </div>

        <?php if (isset($message)) { ?>
            <div class="alert alert-success alert-dismissable">
                <?php
                echo $message;
                ?>
            </div>
            <?php
        } ?>

        <form action="" method="post" class="form-horizontal form-bordered">
            <div class="form-group">
                <label class="col-md-3 control-label" for="services_title">Title</label>
                <div class="col-md-9">
                    <input type="text" id="services_title" name="services_title" class="form-control col-md-9"
                           placeholder="Enter title" required>
                </div>
            </div>

            <div class="form-group">
                <label class="col-md-3 control-label" for="services_content">Content</label>
                <div class="col-md-9">
                   <textarea required id="services_content" name="services_content" class="form-control"  onKeyDown="limitText(this.form.services_content,this.form.countdown,160);"
                             onKeyUp="limitText(this.form.services_content,this.form.countdown,160);" placeholder="Enter Description" cols="47"></textarea><br>
                    <font size="1">(Maximum characters: 160)<br>
                        You have <input readonly type="text" name="countdown" size="3" value="160"> characters left.</font>
                </div>
            </div>

            <div class="form-group">
                <label class="col-md-3 control-label" for="services_status">Status</label>

                <div class="col-md-4">
                    <select id="services_status" name="services_status" class="form-control" size="1">
                        <option value="1">Enable</option>
                        <option value="0">Disable</option>
                    </select>
                </div>
            </div>

            <div class="form-group form-actions">
                <div class="col-md-9 col-md-offset-3">
                    <button type="submit" class="btn btn-effect-ripple btn-primary"><i class="fa fa-check"></i> Submit
                    </button>
                    <button href="<?php echo base_url('admin/services/form'); ?>" type="reset"
                            class="btn btn-effect-ripple btn-danger"><i class="fa fa-times"></i> Reset
                    </button>
                </div>
            </div>
        </form>
    </div>
</div>

<script language="javascript" type="text/javascript">
    function limitText(limitField, limitCount, limitNum) {
        if (limitField.value.length > limitNum) {
            limitField.value = limitField.value.substring(0, limitNum);
        } else {
            limitCount.value = limitNum - limitField.value.length;
        }
    }
</script>
