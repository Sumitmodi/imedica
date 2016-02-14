<div class="row">
    <!-- Form Validation Block -->
    <div class="block">
        <!-- Form Validation Title -->
        <div class="block-title">
            <h2>Edit Page</h2>
        </div>
        <!-- END Form Validation Title -->

        <?php if(isset($message)){ ?>
            <div class="alert alert-success alert-dismissable">
                <?php
                echo $message;
                ?>
            </div>
            <?php
        }?>

        <!-- Form Validation Form -->
        <form action="" method="post" class="form-horizontal form-bordered" enctype="multipart/form-data" >

            <input type="hidden" id="page_id" name="page_id" class="form-control" value="<?php echo $query[0]->id;?>">

            <div class="form-group">
                <label class="col-xs-2 control-label" for="parent">Parent</label>
                <div class="col-xs-6">
                    <select id="parent" name="parent" class="form-control" size="1">

                        <?php
                        echo $query[0]->parent_id;
                        if($query[0]->parent_id == "0")
                        {?>
                            <option value="<?php echo $query[0]->parent_id;?>" selected="selected">No Parent</option>
                            <?php
                            $pages=$this->admin_model->table_fetch_row('page',array('parent_id'=>'0'));
                            $page=(array)($pages);
                            foreach($page as $p){
                                ?>
                                <option value="<?php echo $p->id;?>"><?php echo $p->menu_title;?></option>
                            <?php } } else {
                            $pages=$this->admin_model->table_fetch_row('page',array('parent_id'=>'0'));
                            $page=(array)($pages);
                            foreach($page as $p){
                                if($query[0]->parent_id == $p->id){?>
                                <option value="<?php echo $p->id;?>"  selected="selected"><?php echo $p->menu_title;?></option>
                            <?php } else{ ?>
                                    <option value="<?php echo $p->id;?>"><?php echo $p->menu_title;?></option>
                                <?php } } ?>
                            <option value="0">No Parent</option>
                        <?php } ?>

                    </select>
                </div>
            </div>

            <div class="form-group">
                <label class="col-xs-2 control-label" for="menu_title">Menu Title</label>
                <div class="col-xs-6">
                    <input required type="text" id="menu_title" name="menu_title" class="form-control" value="<?php echo $query[0]->menu_title;?>">
                </div>
            </div>

            <div class="form-group">
                <label class="col-xs-2 control-label" for="url">URL</label>
                <div class="col-xs-6">
                    <input required type="text" id="url" name="url" class="form-control">
                </div>
            </div>

            <div class="form-group">
                <label class="col-xs-2 control-label" for="page_title">Page Title</label>
                <div class="col-xs-6">
                    <input required type="text" id="page_title" name="page_title" class="form-control" value="<?php echo $query[0]->page_title;?>">
                </div>
            </div>

            <div class="form-group">
                <label class="col-xs-2 control-label" for="h1_title">H1 Title</label>
                <div class="col-xs-6">
                    <input required type="text" id="h1_title" name="h1_title" class="form-control" value="<?php echo $query[0]->h1_title;?>">
                </div>
            </div>

            <div class="form-group">
                <label class="col-xs-2 control-label" for="header_image">Header Image</label>
                <div class="col-xs-6">
                    <input type="file" id="userfile" name="userfile" class="form-control" >
                    <img id="preview" src="<?php echo base_url('uploads/page/'.$query[0]->header_img);?>" alt="select image" height="150" width="150" />
                </div>
            </div>

            <div class="form-group">
                <label class="col-xs-2 control-label" for="show_link">Show Link</label>
                <div class="col-xs-6">
                    <label class="checkbox-inline" for="top_nav">
                        <input type="checkbox" id="top_nav" name="top_nav" value="1">Main Navigation
                    </label>
                    <label class="checkbox-inline" for="footer_nav">
                        <input type="checkbox" id="footer_nav" name="footer_nav" value="1">Footer Navigation
                    </label>
                </div>
            </div>

            <div class="form-group">
                <label class="col-xs-2 control-label"for="content">Content</label>
                <div class="col-xs-10">
                    <textarea required id="content" name="content" class="ckeditor"><?php echo $query[0]->content;?></textarea>
                </div>
            </div>

            <div class="form-group">
                <label class="col-xs-2 control-label" for="meta_keywords">Meta Keywords</label>
                <div class="col-xs-6">
                    <textarea id="meta_keywords" name="meta_keywords" rows="3" class="form-control" ><?php echo $query[0]->meta_keywords;?></textarea>
                </div>
            </div>

            <div class="form-group">
                <label class="col-xs-2 control-label" for="meta_description">Meta Description</label>
                <div class="col-xs-8">
                    <textarea id="meta_description" name="meta_description" rows="3" class="form-control"><?php echo $query[0]->meta_description;?></textarea>
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
            <div class="form-group form-actions">
                <div class="col-xs-2"></div>
                <div class="col-xs-4">
                    <button type="submit" class="btn btn-effect-ripple btn-primary">Submit</button>
                </div>
            </div>
        </form>
    </div>
  </div>

<script src="<?php echo base_url('assets/js/plugins/ckeditor/ckeditor.js');?>"></script>

<script type="text/javascript">
    $(function () {
        $('#menu_title').keyup(function () {
            var title = $(this).val();
            if (title === '')
            {
                return;
            }
            $('#page_title,#h1_title').val(title);

            title = title.toLowerCase();
            title = title.replace(/[^a-z0-9 ]+/g, '');
            title = title.replace('  ', ' ');

            var url = title.replace(/\s/g, '-') + '.html';
            $('#url').val(url);
        });
    });

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


