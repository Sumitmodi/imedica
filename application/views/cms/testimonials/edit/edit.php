
<div class="col-md-3"></div>
<div class="row col-md-6">
    <div class="row">
        <div class="block" >
            <div class="block-title">
                <h2>Edit Testimonials</h2>
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
                <input type="hidden" name="testimonials_id" id="testimonials_id" value="<?php echo $query[0]->id;?> "/>
                <div class="form-group">
                    <label class="col-md-3 control-label" for="name">Name</label>
                    <div class="col-md-9">
                        <input required type="text" id="name" name="name" class="form-control col-md-9" value="<?php echo $query[0]->name;?> ">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-md-3 control-label" for="post">Post</label>
                    <div class="col-md-9">
                        <input required type="text" id="post" name="post" class="form-control col-md-9" value="<?php echo $query[0]->post;?> ">
                    </div>
                </div>
                <input type="hidden" id="url" name="url" class="form-control" >

                <div class="form-group">
                    <label class="col-md-3 control-label" for="description">Content</label>
                    <div class="col-md-9">
                        <textarea required id="description" name="description" rows="3" cols="49"><?php echo $query[0]->description;?></textarea>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-md-3 control-label" for="userfile">Image</label>
                    <div class="col-md-9">
                        <input type="file" id="userfile" name="userfile" class="form-control">
                        <img id="preview" src="<?php echo base_url('uploads/testimonials/'.$query[0]->image);?>" alt="Select image" height="150" width="150" />
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-md-3 control-label" for="status">Status</label>
                    <div class="col-md-4">
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
        </div>













