<div class="block full">

    <div class="block-title">
        <h2>Clients Table</h2>
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
        <table id="clients-table" class="table table-bordered table-vcenter">
            <thead>
            <tr>
                <th class="text-center" style="width:100px;">Serial No</th>
                <th>Name</th>
                <th>Phone</th>
                <th>Email</th>
                <th style="width: 125px;" class="text-center"><i class="fa fa-flash"></i></th>
            </tr>
            </thead>

            <tbody>
            <?php
            foreach ($query as $k=>$row)
            {?>
                <tr id="<?php echo $row->id;?>">
                    <td class="text-center"><?php echo $k+1;?></td>
                    <td><strong><?php echo $row->name;?></strong></td>
                    <td><?php echo $row->phone;?></td>
                    <td><?php echo $row->email;?></td>

                    <td class="text-center">
                        <a href="#modal-fade" title="view_clients" class="btn btn-effect-ripple btn-xs btn-info view-modal" data-toggle="modal" data-name="<?php echo $row->name;?>" data-phone="<?php echo $row->phone;?>" data-email="<?php echo $row->email;?>" data-id="<?php echo $row->id;?>" >
                            <i class="fa fa-eye"></i>
                        </a>
                        <a href="<?php echo base_url('admin/clients/edit/'.$row->id);?>" data-toggle="tooltip" title="edit_clients" class="btn btn-effect-ripple btn-xs btn-success"><i class="fa fa-pencil"></i></a>
                        <a href="#" data-href="<?php echo base_url('admin/clients/delete/'.$row->id);?>" data-toggle="modal" data-name="<?php echo $row->name;?>" title="delete_clients" data-target="#confirm-delete" class="btn btn-effect-ripple btn-xs btn-danger del-row"><i class="fa fa-times"></i>
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
                <h3 class="modal-title"><strong>Clients Details</strong></h3>
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
                                <td>Name</td>
                                <td id="p_name"></td>
                            </tr>
                            <tr>
                                <td>Phone</td>
                                <td id="p_phone"></td>
                            </tr>
                            <tr>
                                <td>Email</td>
                                <td id="p_email"></td>
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
            var phone = $(this).attr('data-phone');
            var email = $(this).attr('data-email');
            var logo = $(this).attr('data-logo');
            $('td#p_id').html(id);
            $('td#p_name').html(name);
            $('td#p_phone').html(phone);
            $('td#p_email').html(email);
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

    $(function() {
        var fixHelper = function(e, ui) {
            ui.children().each(function() {
                $(this).width($(this).width());
            });
            return ui;
        };

        $("#clients-table tbody").sortable({

            update: function(event, ui){
                var order = $(this).sortable("serialize");
                console.log(order);
            },
            helper: fixHelper,
            stop : function(e,ui){
                var sort = [];
                for(var i = 0; i < $('tbody.ui-sortable tr').length; i++){
                    var sel = $('tbody.ui-sortable tr')[i];
                    sort.push({
                        id : $(sel).attr('id'),
                        position : i
                    });
                }
                $.ajax({
                    url : '<?php echo base_url('admin/update-order/clients');?>',
                    type :'POST',
                    data : JSON.stringify(sort),
                    dataType : 'JSON',
                    success : function(data){
                    },
                    error : function(data){
                    }
                });
            }
        }).disableSelection();

    });

</script>



