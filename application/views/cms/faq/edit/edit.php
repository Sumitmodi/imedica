<div class="block">

    <div class="block-title">
        <h2>FAQ</h2>
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
        <input type="hidden" name="faq_id" id="faq_id" value="<?php echo $query[0]->id; ?> "/>

        <div class="form-group">
            <label class="col-xs-2 control-label" for="faq_question">Question</label>

            <div class="col-xs-6">
                <input type="text" id="faq_question" name="faq_question" class="form-control"
                       value="<?php echo $query[0]->faq_question; ?>">
                <span class="help-block">Please enter Question</span>
            </div>
        </div>

        <div class="form-group">
            <label class="col-xs-2 control-label" for="faq_answer">Answer</label>

            <div class="col-xs-10">
                <textarea id="description" rows="3" cols="47" name="faq_answer"
                          class="form-control ckeditor"><?php echo $query[0]->faq_answer; ?></textarea>
                <span class="help-block">Please enter answer</span>
            </div>
        </div>

        <div class="form-group">
            <label class="col-xs-2 control-label" for="faq_date">Date</label>

            <div class="col-xs-6">
                <input required type="text" id="faq_date" name="faq_date" class="form-control input-datepicker"
                       data-date-format="yyyy-mm-dd" value="<?php echo $query[0]->faq_date; ?>">
                <span class="help-block">Please enter date</span>
            </div>
        </div>

        <div class="form-group form-actions">
            <div class="col-md-9 col-md-offset-3">
                <button type="submit" class="btn btn-effect-ripple btn-primary"><i class="fa fa-check"></i> Submit
                </button>
            </div>
        </div>
    </form>
</div>


<script src="<?php echo base_url('assets/js/plugins/ckeditor/ckeditor.js'); ?>"></script>
