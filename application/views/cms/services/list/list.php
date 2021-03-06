<div class="block full">

    <div class="block-title">
        <h2>Services Table</h2>
    </div>

    <?php if (isset($message)) { ?>
        <div class="alert alert-success alert-dismissable">
            <?php
            echo $message;
            ?>
        </div>
        <?php
    } ?>

    <div class="table-responsive">
        <table id="services-table" class="table table-bordered table-vcenter">
            <thead>
            <tr>
                <th class="text-center" style="width:100px;">Serial No</th>
                <th>Title</th>
                <th>Content</th>
                <th class="text-center">Status</th>
                <th style="width: 125px;" class="text-center"><i class="fa fa-flash"></i></th>
            </tr>
            </thead>

            <tbody>
            <?php
            foreach ($query as $k => $row) {
                ?>
                <tr id="<?php echo $row->id;?>">
                    <td class="text-center"><?php echo $k + 1; ?></td>
                    <td><strong><?php echo $row->title; ?></strong></td>
                    <td><?php echo $row->content; ?></td>
                    <?php if ($row->status == 1) { ?>
                        <td class="hidden-sm hidden-xs text-center"><a href="javascript:void(0)"
                                                                       class="label label-success">Enabled</a>
                        </td><?php } else { ?>
                        <td class="hidden-sm hidden-xs text-center"><a href="javascript:void(0)"
                                                                       class="label label-danger">Disabled</a>
                        </td><?php } ?>

                    <td class="text-center">
                        <a href="#modal-fade" title="view_services"
                           class="btn btn-effect-ripple btn-xs btn-info view-modal" data-toggle="modal"
                           data-title="<?php echo $row->title; ?>" data-content="<?php echo $row->content; ?>" data-status="<?php echo $row->status; ?>"
                           data-id="<?php echo $row->id; ?>">
                            <i class="fa fa-eye"></i>
                        </a>
                        <a href="<?php echo base_url('admin/services/edit/' . $row->id); ?>" data-toggle="tooltip"
                           title="edit_services" class="btn btn-effect-ripple btn-xs btn-success"><i
                                class="fa fa-pencil"></i></a>
                        <a href="#" data-href="<?php echo base_url('admin/services/delete/' . $row->id); ?>"
                           data-toggle="modal" title="delete_services" data-target="#confirm-delete"
                           data-title="<?php echo $row->title; ?>"
                           class="btn btn-effect-ripple btn-xs btn-danger del-row"><i class="fa fa-times"></i>
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
                <h3 class="modal-title"><strong>Services Details</strong></h3>
            </div>
            <div class="modal-body">
                <div class="box span3">
                    <div class="box-content">
                        <table class="table table-bordered">
                            <tbody>
                            <tr>
                                <td>ID</td>
                                <td id="services_id"></td>
                            </tr>
                            <tr>
                                <td>Title</td>
                                <td id="services_title"></td>
                            </tr>
                            <tr>
                                <td>Content</td>
                                <td id="services_content"></td>
                            </tr>
                            <tr>
                                <td>Status</td>
                                <td id="status"></td>
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
                Are you sure you want to delete???
            </div>
            <div class="modal-footer">

                <a class="btn btn-effect-ripple btn-danger">Delete</a>
                <button type="button" data-dismiss="modal" class="btn btn-effect-ripple btn-default"
                        data-dismiss="modal">Cancel
                </button>

            </div>
        </div>
    </div>
</div>


<script type="text/javascript">
    $(function () {
        $('a.view-modal').click(function (e) {
            var id = $(this).attr('data-id');
            var title = $(this).attr('data-title');
            var content = $(this).attr('data-content');
            var status = $(this).attr('data-status');
            $('td#services_id').html(id);
            $('td#services_title').html(title);
            $('td#services_content').html(content);
            if (status == 1) {
                $('td#status').text("Enabled");
            } else {
                $('td#status').text("Disabled");
            }
        })
    });

    $(function () {
        $('a.del-row').click(function (e) {
            var name = $(this).attr('data-title');
            $('span#del_name').html(name);
        });
    });

    $('#confirm-delete').on('show.bs.modal', function (e) {
        $(this).find('.btn-danger').attr('href', $(e.relatedTarget).data('href'));
    });

    $(function() {
        var fixHelper = function(e, ui) {
            ui.children().each(function() {
                $(this).width($(this).width());
            });
            return ui;
        };

        $("#services-table tbody").sortable({

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





