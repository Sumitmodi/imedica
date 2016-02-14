<div class="col-md-3"></div>
<div class="row col-md-6">
    <div class="row">
        <div class="block">
            <div class="block-title">
                <h2>Edit Services</h2>
            </div>

            <?php if (isset($message)) { ?>
                <div class="alert alert-success alert-dismissable">
                    <?php
                    echo $message;
                    ?>
                </div>
                <?php
            } ?>
            <?php $count=strlen($query[0]->content);?>

            <form action="" method="post" class="form-horizontal form-bordered">
                <input type="hidden" name="services_id" id="services_id" value="<?php echo $query[0]->id; ?> "/>

                <div class="form-group">
                    <label class="col-md-3 control-label" for="services_title">Title</label>

                    <div class="col-md-9">
                        <input required type="text" id="services_title" name="services_title"
                               class="form-control col-md-9" value="<?php echo $query[0]->title; ?> ">
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-md-3 control-label" for="services_content">Content</label>
                    <div class="col-md-9">
                   <textarea required id="services_content" name="services_content" class="form-control"  onKeyDown="limitText(this.form.services_content,this.form.countdown,160);"
                             onKeyUp="limitText(this.form.services_content,this.form.countdown,160);" cols="47"><?php echo $query[0]->content;?></textarea><br>
                        <font size="1">(Maximum characters: 160)<br>
                            You have <input readonly type="text" name="countdown" size="3" value="<?php echo (160-$count);?>"> characters left.</font>
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-md-3 control-label" for="slider_status">Status</label>

                    <div class="col-md-4">
                        <select id="services_status" name="services_status" class="form-control" size="1">
                            <?php
                            if ($query[0]->status == 1) {
                                ?>
                                <option value="1" selected="selected">Enable</option>
                                <option value="0">Disable</option>
                            <?php } else {
                                ?>
                                <option value="1">Enable</option>
                                <option value="0" selected="selected">Disable</option>

                            <?php } ?>
                        </select>
                    </div>
                </div>

                <div class="form-group form-actions">
                    <div class="col-md-9 col-md-offset-3">
                        <button type="submit" class="btn btn-effect-ripple btn-primary"><i class="fa fa-check"></i>
                            Submit
                        </button>
                    </div>
                </div>
            </form>
        </div>
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








