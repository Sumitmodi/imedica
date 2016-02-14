
<div class="block full">
    <div class="block-title">
        <h2>NIMS Table</h2>
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
                <th>Medicine Name</th>
                <th>Category</th>
                <th>Composition</th>
                <th>Dose</th>
                <th class="text-center" style="width: 125px;"><i class="fa fa-flash"></i></th>
            </tr>
            </thead>
            <tbody>

            <?php
            foreach ($query as $k=>$row)
            {?>
                    <tr>
                        <td class="text-center"><?php echo $k+1;?></td>
                        <td><strong><?php echo $row->Medicine_name;?></strong></td>
                        <td><?php $cat = $this->admin_model->table_fetch_row('medicine_category',array('id'=>$row->Category));
                            echo $cat['0']->category_name;?></td>
                        <td><?php echo $row->Composition;?></td>
                        <td><?php echo $row->Dose;?></td>

                        <td class="text-center">
                            <a href="#modal-fade" title="view_nims" class="btn btn-effect-ripple btn-xs btn-info view-modal" data-toggle="modal" data-name="<?php echo $row->Medicine_name;?>" data-category="<?php echo $cat['0']->category_name;;?>" data-composition="<?php echo $row->Composition;?>" data-id="<?php echo $row->id;?>" data-dose="<?php echo $row->Dose;?>">
                                <i class="fa fa-eye"></i>
                            </a>
                            <a href="<?php echo base_url('admin/nims/edit/'.$row->id);?>" data-toggle="tooltip" title="edit_nims" class="btn btn-effect-ripple btn-xs btn-success"><i class="fa fa-pencil"></i></a>
                            <a href="#" data-href="<?php echo base_url('admin/nims/delete/'.$row->id);?>" data-toggle="modal" data-name="<?php echo $row->Medicine_name;?>" title="delete_nims" data-target="#confirm-delete" class="btn btn-effect-ripple btn-xs btn-danger del-row"><i class="fa fa-times"></i></a>
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
                <h3 class="modal-title"><strong>NIMS Details</strong></h3>
            </div>
            <div class="modal-body">
                <div class="box span3">
                    <div class="box-content">
                        <table class="table table-bordered">
                            <tbody>
                            <tr>
                                <td>ID</td>
                                <td id="nims_id"></td>
                            </tr>
                            <tr>
                                <td>Medicine Name</td>
                                <td id="medicine_name"></td>
                            </tr>
                            <tr>
                                <td>category</td>
                                <td id="category"></td>
                            </tr>
                            <tr>
                                <td>Composition</td>
                                <td id="composition"></td>
                            </tr>
                            <tr>
                                <td>Dose</td>
                                <td id="dose"></td>
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
            var name = $(this).attr('data-name');
            var category = $(this).attr('data-category');
            var composition = $(this).attr('data-composition');
            var dose = $(this).attr('data-dose');

            $('td#nims_id').html(id);
            $('td#medicine_name').html(name);
            $('td#category').html(category);
            $('td#composition').html(composition);
            $('td#dose').html(dose);
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




