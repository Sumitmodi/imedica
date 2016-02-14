
    <div class="block">

        <div class="block-title">
            <h2>FAQ</h2>
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

<!--            <div class="form-group">-->
<!--                <label class="col-md-3 control-label" for="faq_id">ID</label>-->
<!--                <div class="col-md-9">-->
<!--                    <input type="number" id="faq_id" name="faq_id" class="form-control" placeholder="Enter ID" >-->
<!--                </div>-->
<!--            </div>-->

            <div class="form-group">
                <label class="col-xs-2 control-label" for="faq_question">Question</label>
                <div class="col-xs-6">
                    <input type="text" id="faq_question" name="faq_question" class="form-control" placeholder="Enter Question" >
                </div>
            </div>

            <div class="form-group">
                <label class="col-xs-2 control-label" for="faq_answer">Answer</label>
                <div class="col-xs-10">
                    <textarea id="description" rows="3" cols="47" name="faq_answer" class="form-control ckeditor" placeholder="Enter Answer" ></textarea>
                </div>
            </div>

            <div class="form-group">
                <label class="col-xs-2 control-label" for="faq_date">Date</label>
                <div class="col-xs-6">
                    <input required type="text" id="faq_date" name="faq_date" class="form-control input-datepicker" data-date-format="yyyy-mm-dd" placeholder="yyyy-mm-dd">
                </div>
            </div>

            <div class="form-group form-actions">
                <div class="col-xs-2"></div>
                <div class="col-xs-4">
                    <button type="submit" class="btn btn-effect-ripple btn-primary"><i class="fa fa-check"></i> Submit</button>
                    <button href="<?php echo base_url('admin/faq/form');?>" type="reset" class="btn btn-effect-ripple btn-danger"><i class="fa fa-times"></i> Reset</button>
                </div>
            </div>
        </form>
    </div>


<script src="<?php echo base_url('assets/js/plugins/ckeditor/ckeditor.js');?>"></script>