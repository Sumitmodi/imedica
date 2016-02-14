<div class="block full">

    <div class="block-title">
        <h2>Inquiries Table</h2>
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
                <th>Name</th>
                <th>Email</th>
                <th>Phone No</th>
                <th>Query</th>
                <th style="width: 125px;" class="text-center"><i class="fa fa-flash"></i></th>
            </tr>
            </thead>

            <tbody>
            <?php
            foreach ($query as $k=>$row)
            {?>
                <tr >
                    <td class="text-center"><?php echo $k+1;?></td>
                    <td><strong><?php echo $row->name;?></strong></td>
                    <td><?php echo $row->email;?></td>
                    <td><?php echo $row->phone;?></td>
                    <td><?php echo $row->query;?></td>

                    <td class="text-center">
                        <a href="#modal-fade" title="view_inquiries" class="btn btn-effect-ripple btn-xs btn-info view-modal" data-toggle="modal" data-id="<?php echo $row->id;?>" data-name="<?php echo $row->name;?>" data-email="<?php echo $row->email;?>" data-phone="<?php echo $row->phone;?>" data-query="<?php echo $row->query;?>">
                            <i class="fa fa-eye"></i>
                        </a>
                        <a href="#" data-href="<?php echo base_url('admin/inquiries/delete/'.$row->id);?>" data-toggle="modal" title="delete_inquiries" data-name="<?php echo $row->name;?>" data-target="#confirm-delete" class="btn btn-effect-ripple btn-xs btn-danger del-row"><i class="fa fa-times"></i>
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
                <h3 class="modal-title"><strong>Inquiries Details</strong></h3>
            </div>
            <div class="modal-body">
                <div class="box span3">
                    <div class="box-content">
                        <table class="table table-bordered">
                            <tbody>
                            <tr>
                                <td>ID</td>
                                <td id="inq_id"></td>
                            </tr>
                            <tr>
                                <td>Name</td>
                                <td id="inq_name"></td>
                            </tr>
                            <tr>
                                <td>Email</td>
                                <td id="inq_email"></td>
                            </tr>
                            <tr>
                                <td>Phone No</td>
                                <td id="inq_phone"></td>
                            </tr>
                            <tr>
                                <td>Query</td>
                                <td id="inq_query"></td>
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
                <button type="button"  data-dismiss="modal"class="btn btn-effect-ripple btn-default" data-dismiss="modal">Cancel</button>

            </div>
        </div>
    </div>
</div>

<script type="text/javascript">
    $(function(){
        $('a.view-modal').click(function(e){
            var id = $(this).attr('data-id');
            var name = $(this).attr('data-name');
            var email = $(this).attr('data-email');
            var phone = $(this).attr('data-phone');
            var query = $(this).attr('data-query');

            $('td#inq_id').html(id);
            $('td#inq_name').html(name);
            $('td#inq_email').html(email);
            $('td#inq_phone').html(phone);
            $('td#inq_query').html(query);
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

<script src="<?php echo base_url('public/js/pages/uiTables.js');?>"></script>
<script>$(function(){ UiTables.init(); });</script>



