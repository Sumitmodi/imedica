
<div class="block full">
    <div class="block-title">
        <h2>Admin Table</h2>
    </div>
    <div class="table-responsive">
        <table id="example-datatable" class="table table-bordered table-vcenter">
            <thead>
            <tr>
                <th class="text-center" style="width: 100px;">Serial No</th>
                <th>Admin_name</th>
                <th>Username</th>
                <th>Admin_email</th>
                <th>Status</th>
                <th class="text-center" style="width: 125px;"><i class="fa fa-flash"></i></th>
            </tr>
            </thead>
            <tbody>

            <?php
            $i=1;
            foreach ($query as $k=>$row)
            {?>
                <div class="sortable">
                <tr id="<?php echo $row->id;?>">
                    <td class="text-center"><?php echo $k+1;?></td>
                    <td><strong><?php echo $row->admin_name;?></strong></td>
                    <td><?php echo $row->admin_username;?></td>
                    <td><?php echo $row->admin_email;?></td>
                    <?php if ($row->admin_status==1){?>
                        <td class="hidden-sm hidden-xs text-center"><a href="javascript:void(0)" class="label label-success">Enabled</a></td><?php } else {?>
                        <td class="hidden-sm hidden-xs text-center"><a href="javascript:void(0)" class="label label-danger">Disabled</a></td><?php } ?>

                    <td class="text-center">
                        <a href="#modal-fade" title="view_admin" class="btn btn-effect-ripple btn-xs btn-info view-modal" data-toggle="modal" data-name="<?php echo $row->admin_name;?>" data-username="<?php echo $row->admin_username;?>" data-email="<?php echo $row->admin_email;?>" data-id="<?php echo $row->id;?>" data-status="<?php echo $row->admin_status;?>" data-last_login="<?php echo $row->last_login;?>">
                            <i class="fa fa-eye"></i>
                        </a>
                        <a href="<?php echo base_url('admin/admin/edit/'.$row->id);?>" data-toggle="tooltip" title="edit_admin" class="btn btn-effect-ripple btn-xs btn-success"><i class="fa fa-pencil"></i></a>
                        <a href="#" data-href="<?php echo base_url('admin/admin/delete/'.$row->id);?>" data-toggle="modal" data-name="<?php echo $row->admin_name;?>" title="delete_admin" data-target="#confirm-delete" class="btn btn-effect-ripple btn-xs btn-danger del-row"><i class="fa fa-times"></i></a>
                    </td>
                </tr>
                </div>
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
                <h3 class="modal-title"><strong>Admin Details</strong></h3>
            </div>
            <div class="modal-body">
                <div class="box span3">
                    <div class="box-content">
                        <table class="table table-bordered">
                            <tbody>
                            <tr>
                                <td>ID</td>
                                <td id="admin_id"></td>
                            </tr>
                            <tr>
                                <td>Name</td>
                                <td id="admin_name"></td>
                            </tr>
                            <tr>
                                <td>Username</td>
                                <td id="admin_username"></td>
                            </tr>
                            <tr>
                                <td>Email</td>
                                <td id="admin_email"></td>
                            </tr>
                            <tr>
                                <td>Status</td>
                                <td id="admin_status"></td>
                            </tr>
                            <tr>
                                <td>Last login</td>
                                <td id="admin_last_login"></td>
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
            var username = $(this).attr('data-username');
            var email = $(this).attr('data-email');
            var status = $(this).attr('data-status');
            var last_login = $(this).attr('data-last_login');
            $('td#admin_id').html(id);
            $('td#admin_name').html(name);
            $('td#admin_username').html(username);
            $('td#admin_email').html(email);
            if(status==1)
            {
                $('td#admin_status').text("Enabled");
            }else
            {
                $('td#admin_status').text("Disabled");
            }
            $('td#admin_last_login').html(last_login);
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




