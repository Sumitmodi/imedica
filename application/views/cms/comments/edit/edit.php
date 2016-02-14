<div class="col-md-3"></div>
<div class="row col-md-6">
    <div class="block">
        <div class="block-title">
            <h2>Comment</h2>
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
            <input type="hidden" name="comment_id" id="comment_id" value="<?php echo $query[0]->id;?> "/>

            <!--            <div class="form-group">-->
            <!--                <label class="col-md-3 control-label" for="comment_id">ID</label>-->
            <!--                <div class="col-md-9">-->
            <!--                    <input type="number" id="comment_id" name="comment_id" class="form-control" placeholder="Enter ID" >-->
            <!--                </div>-->
            <!--            </div>-->

            <div class="form-group">
                <label class="col-md-3 control-label" for="comment_question">Blog title</label>
                <div class="col-md-9">
                    <input type="text" id="blog" name="blog" class="form-control" value="<?php echo $this->data['blog'][0]->title;?>" readonly>
                </div>
            </div>

            <div class="form-group">
                <label class="col-md-3 control-label" for="comment_question">Name</label>
                <div class="col-md-9">
                    <input type="text" id="comment_question" name="comment_question" class="form-control" value="<?php echo $query[0]->name;?>" readonly>
                </div>
            </div>

            <div class="form-group">
                <label class="col-md-3 control-label" for="email">Email</label>
                <div class="col-md-9">
                    <input type="text" id="email" name="email" class="form-control" value="<?php echo $query[0]->email;?>" readonly>
                </div>
            </div>

            <div class="form-group">
                <label class="col-md-3 control-label" for="comment_answer">Comment</label>
                <div class="col-md-9">
                    <textarea id="description" rows="3" cols="47" name="comment_answer" class="form-control" readonly><?php echo $query[0]->comment;?></textarea>
                </div>
            </div>

            <div class="form-group">
                <label class="col-md-3 control-label" for="comment_date">Date</label>
                <div class="col-md-9">
                    <input required type="text" id="comment_date" name="comment_date" class="form-control input-datepicker" data-date-format="yyyy-mm-dd" value="<?php echo $query[0]->comment_date;?>" readonly>
                </div>
            </div>
            <div class="form-group">
                <label class="col-md-3 control-label" for="status">Status</label>
                <div class="col-md-9">
                    <select id="status" name="status" class="form-control" size="1">
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
            <div class="form-group form-actions">
                <div class="col-md-9 col-md-offset-3">
                    <button type="submit" class="btn btn-effect-ripple btn-primary"><i class="fa fa-check"></i> Submit</button>
                </div>
            </div>
        </form>
    </div>

</div>


