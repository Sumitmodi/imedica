<div class="block full">

    <div class="block-title">
        <h2>Blogs Table</h2>
    </div>

    <?php if(isset($message)){ ?>
        <div class="alert alert-success alert-dismissable">
            <?php
            echo $message;
            ?>
        </div>
        <?php
    }?>

    <div class="table-responsive">
        <table id="example-datatable" class="table table-bordered table-vcenter">
            <thead>
            <tr>
                <th class="text-center" style="width:100px;">Serial No</th>
                <th>Title</th>
                <th>Category</th>
                <th>Author</th>
                <th style="width: 125px;" class="text-center"><i class="fa fa-flash"></i></th>
            </tr>
            </thead>

            <tbody>
            <?php
            foreach ($query as $k=>$row)
            {?>
                <tr >
                    <td class="text-center"><?php echo $k+1;?></td>
                    <td><strong><?php echo $row->title;?></strong></td>
                    <td><?php echo $row->category;?></td>
                    <td><?php
                    foreach($authors as $author){  
                        if($author->id == $row->author) echo $author->title;
                    }
                    ?></td>

                    <td class="text-center">
                        <a href="#modal-fade" title="view_blogs" class="btn btn-effect-ripple btn-xs btn-info view-modal" data-toggle="modal" data-title="<?php echo $row->title;?>" data-author="<?php echo $row->author;?>" data-category="<?php echo $row->category;?>" data-description="<?php echo htmlentities($row->description);?>"  data-id="<?php echo $row->id;?>" >
                            <i class="fa fa-eye"></i>
                        </a>
                        <a href="<?php echo base_url('admin/blogs/edit/'.$row->id);?>" data-toggle="tooltip" title="edit_blogs" class="btn btn-effect-ripple btn-xs btn-success"><i class="fa fa-pencil"></i></a>
                        <a href="#" data-href="<?php echo base_url('admin/blogs/delete/'.$row->id);?>" data-toggle="modal" data-name="<?php echo $row->title;?>" title="delete_blogs" data-target="#confirm-delete" class="btn btn-effect-ripple btn-xs btn-danger del-row"><i class="fa fa-times"></i>
                        </a>
                    </td>

                </tr>
            <?php } ?>

            </tbody>
        </table>
    </div>
</div>


<div id="modal-fade" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h3 class="modal-title"><strong>Blogs Details</strong></h3>
            </div>
            <div class="modal-body">
                <div class="box span3">
                    <div class="box-content">
                        <table class="table table-bordered">
                            <tbody>
                            <tr>
                                <td>ID</td>
                                <td id="p_id"></td>
                            </tr>
                            <tr>
                                <td>Title</td>
                                <td id="p_title"></td>
                            </tr>
                           <tr>
                                <td>Category</td>
                                <td id="p_category"></td>
                            </tr>
                            <tr>
                                <td>Author</td>
                                <td id="p_author"></td>
                            </tr>
                           <tr>
                                <td>Description</td>
                                <td id="p_description"></td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-effect-ripple btn-danger" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

<div id="confirm-delete" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title"><span id="del_title"></span></h4>
            </div>
            <div class="modal-body">
                Are you sure you want to delete this record?
            </div>
            <div class="modal-footer">

                <a class="btn btn-effect-ripple btn-danger">Delete</a>
                <button type="button"  data-dismiss="modal"class="btn btn-effect-ripple btn-default" data-dismiss="modal">Cancel</button>

            </div>
        </div>
    </div>
</div>

<script type="text/javascript">
    $(function(){
        $('a.view-modal').click(function(e){
            var id = $(this).attr('data-id');
            var title = $(this).attr('data-title');
            var category = $(this).attr('data-category');
            var author = $(this).attr('data-author');
            var description = $(this).attr('data-description');
            var image = $(this).attr('data-image');
            $('td#p_id').html(id);
            $('td#p_title').html(title);
            $('td#p_category').html(category);
            $('td#p_author').html(author);
            $('td#p_description').html(description);
        })
    });

    $(function(){
        $('a.del-row').click(function(e) {
            var title = $(this).attr('data-title');
            $('span#del_title').html(title);
        });
    });

    $('#confirm-delete').on('show.bs.modal', function(e) {
        $(this).find('.btn-danger').attr('href', $(e.relatedTarget).data('href'));
    });

</script>

<script src="<?php echo base_url('public/js/pages/uiTables.js');?>"></script>
<script>$(function(){ UiTables.init(); });</script>



