
<div class="block full">
    <div class="block-title">
        <h2>News Table</h2>
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
                <th>News Title</th>
                <th>Date</th>
                <th>Reporter</th>
                <th>Source</th>
                <th>Status</th>
                <th>News Source</th>
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
                <td><?php echo date('Y-m-d',$row->date);?></td>
                <td><?php echo $row->reporter;?></td>
                <td><?php echo $row->source;?></td>
                <?php if ($row->status==1){?>
                    <td class="hidden-sm hidden-xs text-center"><a href="javascript:void(0)" class="label label-success">Enabled</a></td><?php } else {?>
                    <td class="hidden-sm hidden-xs text-center"><a href="javascript:void(0)" class="label label-danger">Disabled</a></td><?php } ?>
                <td><?php echo $row->news_source;?></td>

                <td class="text-center">
                    <a href="#modal-fade" title="view_news" class="btn btn-effect-ripple btn-xs btn-info view-modal" data-toggle="modal" data-name="<?php echo $row->title;?>" data-date="<?php echo date('Y-m-d',$row->date);?>" data-reporter="<?php echo $row->reporter;?>" data-id="<?php echo $row->id;?>" data-source="<?php echo $row->source;?>" data-desc="<?php echo htmlentities($row->description);?>" data-newssource="<?php echo $row->news_source;?>" data-status="<?php echo $row->status;?>">
                        <i class="fa fa-eye"></i>
                    </a>
                    <a href="<?php echo base_url('admin/news/edit/'.$row->id);?>" data-toggle="tooltip" title="edit_news" class="btn btn-effect-ripple btn-xs btn-success"><i class="fa fa-pencil"></i></a>
                    <a href="#" data-href="<?php echo base_url('admin/news/delete/'.$row->id);?>" data-toggle="modal" data-name="<?php echo $row->Title;?>" title="delete_news" data-target="#confirm-delete" class="btn btn-effect-ripple btn-xs btn-danger del-row"><i class="fa fa-times"></i></a>
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
                <h3 class="modal-title"><strong>News Details</strong></h3>
            </div>
            <div class="modal-body">
                <div class="box span3">
                    <div class="box-content">
                        <table class="table table-bordered">
                            <tbody>
                            <tr>
                                <td>ID</td>
                                <td id="news_id"></td>
                            </tr>
                            <tr>
                                <td>Title</td>
                                <td id="title"></td>
                            </tr>
                            <tr>
                                <td>Date</td>
                                <td id="date"></td>
                            </tr>
                            <tr>
                                <td>Reporter</td>
                                <td id="reporter"></td>
                            </tr>
                            <tr>
                                <td>Source</td>
                                <td id="source"></td>
                            </tr>
                            <tr>
                                <td>Description</td>
                                <td id="description"></td>
                            </tr>
                            <tr>
                                <td>Status</td>
                                <td id="status"></td>
                            </tr>
                            <tr>
                                <td>News Source</td>
                                <td id="news_source"></td>
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
            var title = $(this).attr('data-name');
            var date = $(this).attr('data-date');
            var reporter = $(this).attr('data-reporter');
            var source = $(this).attr('data-source');
            var description = $(this).attr('data-desc');
            var status = $(this).attr('data-status');
            var news_source = $(this).attr('data-newssource');

            $('td#news_id').html(id);
            $('td#title').html(title);
            $('td#date').html(date);
            $('td#reporter').html(reporter);
            $('td#source').html(source);
            $('td#description').html(description);
            if(status==1)
            {
                $('td#status').text("Enabled");
            }else
            {
                $('td#status').text("Disabled");
            }
            $('td#news_source').html(news_source);
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




