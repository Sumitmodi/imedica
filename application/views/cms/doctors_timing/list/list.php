
<div class="block full">
    <div class="block-title">
        <h2>Doctors Timing Table</h2>
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
                <th>Doctor Name</th>
                <th>Hospital Name</th>
                <th>Start Time</th>
                <th>End Time</th>
                <th>Day</th>
                <th class="text-center" style="width: 125px;"><i class="fa fa-flash"></i></th>
            </tr>
            </thead>
            <tbody>

            <?php
            foreach ($query as $k=>$row)
            {?>
            <tr>
                <td class="text-center"><?php echo $k+1;?></td>
                <td><strong><?php $doc = $this->admin_model->table_fetch_row('doctors',array('id'=>$row->doctor_id));
                        echo $doc['0']->name;?></strong></td>
                <td><strong><?php $hos = $this->admin_model->table_fetch_row('hospitals',array('id'=>$row->hospital_id));
                        echo $hos['0']->hospital_name;?></strong></td>
                <td><?php echo $row->start_time;?></td>
                <td><?php echo $row->end_time;?></td>
                <td><?php $day = $this->admin_model->table_fetch_row('day',array('id'=>$row->day));
                    echo $day['0']->day;?></td>

                <td class="text-center">
                    <a href="#modal-fade" title="view_doctors_timing" class="btn btn-effect-ripple btn-xs btn-info view-modal" data-toggle="modal" data-name="<?php echo $doc['0']->name;?>" data-hospital="<?php echo $hos['0']->hospital_name;?>" data-start="<?php echo $row->start_time;?>" data-end="<?php echo $row->end_time;?>" data-id="<?php echo $row->id;?>" data-day="<?php echo $day['0']->day;?>">
                        <i class="fa fa-eye"></i>
                    </a>
                    <a href="<?php echo base_url('admin/doctors_timing/edit/'.$row->id);?>" data-toggle="tooltip" title="edit_doctors_timing" class="btn btn-effect-ripple btn-xs btn-success"><i class="fa fa-pencil"></i></a>
                    <a href="#" data-href="<?php echo base_url('admin/doctors_timing/delete/'.$row->id);?>" data-toggle="modal" data-name="<?php echo $doc['0']->name;?>" title="delete_doctors_timing" data-target="#confirm-delete" class="btn btn-effect-ripple btn-xs btn-danger del-row"><i class="fa fa-times"></i></a>
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
                <h3 class="modal-title"><strong>Doctors Timing Details</strong></h3>
            </div>
            <div class="modal-body">
                <div class="box span3">
                    <div class="box-content">
                        <table class="table table-bordered">
                            <tbody>
                            <tr>
                                <td>ID</td>
                                <td id="doc_id"></td>
                            </tr>
                            <tr>
                                <td>Name</td>
                                <td id="doctor_name"></td>
                            </tr>
                            <tr>
                                <td>Hospital Name</td>
                                <td id="hospital_name"></td>
                            </tr>
                            <tr>
                                <td>Start Time</td>
                                <td id="start_time"></td>
                            </tr>
                            <tr>
                                <td>End Time</td>
                                <td id="end_time"></td>
                            </tr>
                            <tr>
                                <td>Day</td>
                                <td id="day"></td>
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
            var hospital = $(this).attr('data-hospital');
            var start_time = $(this).attr('data-start');
            var end_time = $(this).attr('data-end');
            var day = $(this).attr('data-day');

            $('td#doc_id').html(id);
            $('td#doctor_name').html(name);
            $('td#hospital_name').html(hospital);
            $('td#start_time').html(start_time);
            $('td#end_time').html(end_time);
            $('td#day').html(day);
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




