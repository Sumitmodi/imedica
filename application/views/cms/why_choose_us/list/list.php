
<div class="block full">
    <div class="block-title">
        <h2>Why Choose Us </h2>
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
                <th class="text-center" style="width: 100px;">Serial No</th>
                <th>Title</th>
                <th>Description</th>
                <th class="text-center" style="width: 125px;"><i class="fa fa-flash"></i></th>
            </tr>
            </thead>
            <tbody>

            <?php
            foreach ($query as $k=>$row)
            {?>
            <tr>
                <td class="text-center"><?php echo $k+1;?></td>
                <td><strong><?php echo $row->title;?></strong></td>
                <td><?php echo $row->description;?></td>
                <td class="text-center">
                    <a href="#modal-fade" title="view_why_choose_us" class="btn btn-effect-ripple btn-xs btn-info view-modal" data-toggle="modal" data-id="<?php echo $row->id;?>" data-title="<?php echo $row->title;?>" data-description="<?php echo $row->description;?>">
                        <i class="fa fa-eye"></i>
                    </a>
                    <a href="<?php echo base_url('admin/why_choose_us/edit/'.$row->id);?>" data-toggle="tooltip" title="edit_why_choose_us" class="btn btn-effect-ripple btn-xs btn-success"><i class="fa fa-pencil"></i></a>
                    <a href="#" data-href="<?php echo base_url('admin/why_choose_us/delete/'.$row->id);?>" data-toggle="modal" data-title="<?php echo $row->title;?>" title="delete_why_choose_us" data-target="#confirm-delete" class="btn btn-effect-ripple btn-xs btn-danger del-row"><i class="fa fa-times"></i></a>
                </td>
            </tr>
    </div>
<?php } ?>
    </tbody>
    </table>
</div>

<div id="modal-fade" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h3 class="modal-title"><strong>Why Choose Us Details</strong></h3>
            </div>
            <div class="modal-body">
                <div class="box span3">
                    <div class="box-content">
                        <table class="table table-bordered">
                            <tbody>
                            <tr>
                                <td>ID</td>
                                <td id="id"></td>
                            </tr>
                            <tr>
                                <td>Title</td>
                                <td id="title"></td>
                            </tr>
                            <tr>
                                <td>Description</td>
                                <td id="description"></td>
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
                <h4 class="modal-title"><span id="del_name"></span></h4>
            </div>
            <div class="modal-body">
                Are you sure you want to delete this record?
            </div>
            <div class="modal-footer">

                <a class="btn btn-effect-ripple btn-danger">Delete</a>
                <button type="button" data-dismiss="modal"class="btn btn-effect-ripple btn-default" data-dismiss="modal">Cancel</button>

            </div>
        </div>
    </div>
</div>

<script type="text/javascript">
    $(function(){
        $('a.view-modal').click(function(e){
            var id = $(this).attr('data-id');
            var title = $(this).attr('data-title');
            var description = $(this).attr('data-description');

            $('td#id').html(id);
            $('td#title').html(title);
            $('td#description').html(description);
        })
    });

    $(function(){
        $('a.del-row').click(function(e) {
            var name = $(this).attr('data-name');
            $('span#del_name').html(name);
        });
    });

    $('#confirm-delete').on('show.bs.modal', function(e) {
        $(this).find('.btn-danger').attr('href', $(e.relatedTarget).data('href'));
    });
</script>




