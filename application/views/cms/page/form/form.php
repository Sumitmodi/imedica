
<div class="block">
    <div class="block-title">
        <h2>Add Page</h2>
    </div>

    <?php if(isset($message)){ ?>
        <div class="alert alert-success alert-dismissable">
            <?php
            echo $message;
            ?>
        </div>
        <?php
    }?>

    <form name="cms_page" action="" method="post" class="form-horizontal form-bordered" enctype="multipart/form-data" >
        <div class="form-group">
            <label class="col-xs-2 control-label" for="parent">Parent</label>
            <div class="col-xs-6">
                <select id="parent" name="parent" class="form-control" size="1">
                    <option value="0">No Parent</option>
                    <?php
                    $pages=$this->admin_model->table_fetch_row('page',array('parent_id'=>'0'));
                    $page=(array)($pages);
                    //print_r($loc);
                    foreach($page as $p){
                        ?>
                        <option value="<?php echo $p->id;?>"><?php echo $p->menu_title;?></option>
                    <?php }?>
                </select>
            </div>
        </div>

        <div class="form-group">
            <label class="col-xs-2 control-label" for="menu_title">Menu Title</label>
            <div class="col-xs-6">
                <input type="text" id="menu_title" name="menu_title" class="form-control" placeholder="Enter menu title" required>
            </div>
        </div>

        <div class="form-group">
            <label class="col-xs-2 control-label" for="url">URL</label>
            <div class="col-xs-6">
                <input type="text" id="url" name="url" class="form-control" placeholder="Enter page url" required>
            </div>
        </div>

        <div class="form-group">
            <label class="col-xs-2 control-label" for="page_title">Page Title</label>
            <div class="col-xs-6">
                <input type="text" id="page_title" name="page_title" class="form-control" placeholder="Enter page title" required>
            </div>
        </div>

        <div class="form-group">
            <label class="col-xs-2 control-label" for="h1_title">H1 Title</label>
            <div class="col-xs-6">
                <input type="text" id="h1_title" name="h1_title" class="form-control" placeholder="Enter h1 title" required>
            </div>
        </div>

        <div class="form-group">
            <label class="col-xs-2 control-label" for="header_image">Header Image</label>
            <div class="col-xs-6">
                <input type="file" id="userfile" name="userfile" class="form-control" required>
                <img id="preview" src="#" alt="your image" height="150" width="150" style="display:none;"/>
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
            <label class="col-xs-2 control-label" for="content">Content</label>
            <div class="col-xs-10">
                <textarea id="content" name="content" class="ckeditor"  required></textarea>
            </div>
        </div>

        <div class="form-group">
            <label class="col-xs-2 control-label" for="meta_keywords">Meta Keywords</label>
            <div class="col-xs-6">
                <input type="text" id="meta_keywords" name="meta_keywords" rows="3" class="form-control" placeholder="Enter meta keywords" >
            </div>
        </div>

        <div class="form-group">
            <label class="col-xs-2 control-label" for="meta_description">Meta Description</label>
            <div class="col-xs-8">
                <textarea id="meta_description" name="meta_description" rows="3" class="form-control" placeholder="Enter meta description" ></textarea>
            </div>
        </div>


        <div class="form-group">
            <label class="col-xs-2 control-label" for="status">Status</label>
            <div class="col-md-4">
                <select id="status" name="status" class="form-control" size="1">
                    <option value="1">Enable</option>
                    <option value="0">Disable</option>
                </select>
            </div>
        </div>

        <div class="form-group form-actions">
            <div class="col-xs-2"></div>
            <div class="col-xs-4">
                <button type="submit" class="btn btn-effect-ripple btn-primary">Submit</button>
                <button href="<?php echo base_url('admin/page/form');?>" type="reset" class="btn btn-effect-ripple btn-danger">Reset</button>
            </div>
        </div>
    </form>
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
                $('#preview').show();
            }

            reader.readAsDataURL(input.files[0]);
        }
    }

    $("#userfile").change(function(){
        readIMG(this);
    });

</script>



