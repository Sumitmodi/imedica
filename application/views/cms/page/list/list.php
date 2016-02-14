<!-- Row Styles Block -->
<div class="block full">

    <!-- Row Styles Title -->
    <?php if(isset($message)){ ?>
        <div class="alert alert-success alert-dismissable">
            <?php
            echo $message;
            ?>
        </div>
        <?php
    }?>

    <div class="block-title">
        <h2>Page Table</h2>
    </div>
    <!-- END Row Styles Title -->

    <!-- Row Styles Content -->
    <div class="table-responsive">
        <table id="example-datatable" class="table table-bordered table-vcenter">
            <thead>
            <tr>
                <th class="text-center" style="width:100px;">Serial No</th>
                <th>Menu Title</th>
                <th>Page Title</th>
                <th class="text-center">Status</th>
                <th style="width: 125px;" class="text-center"><i class="fa fa-flash"></i></th>
            </tr>
            </thead>

            <tbody>
            <?php
            foreach ($query as $k=>$row)
            {?>
                <tr id="<?php echo $row->id;?>">
                    <td class="text-center"><?php echo $k+1;?></td>
                    <td><strong><?php echo $row->menu_title;?></strong></td>
                    <td><strong><?php echo $row->page_title;?></strong></td>
                    <?php if ($row->status==1){?>
                        <td class="hidden-sm hidden-xs text-center"><a href="javascript:void(0)" class="label label-success">Enabled</a></td><?php } else {?>
                        <td class="hidden-sm hidden-xs text-center"><a href="javascript:void(0)" class="label label-danger">Disabled</a></td><?php } ?>

                    <td class="text-center">
                        <a href="#modal-fade" data-toggle="modal" title="view_page" class="btn btn-effect-ripple btn-xs btn-info view-modal" data-id="<?php echo $row->id;?>" data-menu_title="<?php echo $row->menu_title;?>" data-page_title="<?php echo $row->page_title;?>"
                           data-h1title="<?php echo $row->h1_title;?>" data-content="<?php echo $row->content;?>" data-meta_keywords="<?php echo $row->meta_keywords;?>" data-meta_description="<?php echo $row->meta_description;?>"
                           data-status="<?php echo $row->status;?>"><i class="fa fa-eye"></i></a>

                        <a href="<?php echo base_url('admin/page/edit/'.$row->id);?>" data-toggle="tooltip" title="edit_page" class="btn btn-effect-ripple btn-xs btn-success"><i class="fa fa-pencil"></i></a>
                        <a href="#" data-href="<?php echo base_url('admin/page/delete/'.$row->id);?>" data-toggle="modal" title="delete_page" data-target="#confirm-delete" data-menu_title="<?php echo $row->menu_title;?>" class="btn btn-effect-ripple btn-xs btn-danger del-row"><i class="fa fa-times"></i></a>
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
                <h3 class="modal-title"><strong>Page Details</strong></h3>
            </div>
            <div class="modal-body">
                <div class="box span3">
                    <div class="box-content">
                        <table class="table table-bordered">
                            <tbody>
                            <tr>
                                <td>ID</td>
                                <td id="page_id"></td>
                            </tr>
                            <tr>
                                <td>Menu Title</td>
                                <td id="menu_title"></td>
                            </tr>
                            <tr>
                                <td>Page Title</td>
                                <td id="page_title"></td>
                            </tr>
                            <tr>
                                <td>H1 Title</td>
                                <td id="h1_title"></td>
                            </tr>
                            <tr>
                                <td>Content</td>
                                <td id="content"></td>
                            </tr>
                            <tr>
                                <td>Meta Keyword</td>
                                <td id="meta_keywords"></td>
                            </tr>
                            <tr>
                                <td>Meta Description</td>
                                <td id="meta_description"></td>
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
            var page_title = $(this).attr('data-page_title');
            var menu_title = $(this).attr('data-menu_title');
            var h1_title = $(this).attr('data-h1title');
            var content = $(this).attr('data-content');
            var meta_keywords = $(this).attr('data-meta_keywords');
            var meta_description = $(this).attr('data-meta_description');
            var status = $(this).attr('data-status');
            $('td#page_id').html(id);
            $('td#menu_title').html(menu_title);
            $('td#page_title').html(page_title);
            $('td#h1_title').html(h1_title);
            $('td#content').html(content);
            $('td#meta_keywords').html(meta_keywords);
            $('td#meta_description').html(meta_description);
            if(status==1)
            {
                $('td#status').text("Enabled");
            }else
            {
                $('td#status').text("Disabled");
            }

        })
    });

   $(function() {
        var fixHelper = function(e, ui) {
            ui.children().each(function() {
                $(this).width($(this).width());
            });
            return ui;
        };

        $("#example-datatable tbody").sortable({

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
                   url : '<?php echo base_url('admin/update-order/page');?>',
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

    $(function(){
        $('a.del-row').click(function(e) {
            var name = $(this).attr('data-menu_title');
            $('span#del_name').html(name);
        });
    });

    $('#confirm-delete').on('show.bs.modal', function(e) {
        $(this).find('.btn-danger').attr('href', $(e.relatedTarget).data('href'));
    });
</script>











