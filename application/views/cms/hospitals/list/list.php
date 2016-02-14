
<div class="block full">
    <div class="block-title">
        <h2>Hospitals Table</h2>
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
                <th>Hospital Name</th>
                <th>Location</th>
                <!--<th>Emergency Service</th>
                <th>Ambulance Number</th>-->
                <th>Phone Number</th>
                <th>Email</th>
                <!--<th>Doctors</th>-->
                <th class="text-center" style="width: 125px;"><i class="fa fa-flash"></i></th>
            </tr>
            </thead>
            <tbody>
            <?php
            foreach ($query as $k=>$row)
            {?>
            <tr>
                <td class="text-center"><?php echo $k+1;?></td>
                <td><strong><?php echo $row->hospital_name;?></strong></td>
                <td><?php echo $row->location;?></td>
                <!--<td class="hidden-sm hidden-xs text-center"><a href="javascript:void(0)" class="label label-success"><?php //echo $row->emergency_service;?></a></td>
                <td><?php //echo $row->ambulance;?></td>-->
                <td><?php echo $row->phone_no;?></td>
                <td><?php echo $row->email;?></td>
                <?php //$d = explode(';',$row->doctors);?>
                <!--<td><?php //foreach($d as $doc){ echo $doc.',<br>';}?></td>-->

                <td class="text-center">
                    <a href="#modal-fade" title="view_hospitals" class="btn btn-effect-ripple btn-xs btn-info view-modal" data-toggle="modal" data-name="<?php echo $row->hospital_name;?>" data-location="<?php echo $row->location;?>"
                       data-emergency="<?php echo $row->emergency_service;?>" data-id="<?php echo $row->id;?>" data-ambulance="<?php echo $row->ambulance;?>" data-phone="<?php echo $row->phone_no;?>" data-email="<?php echo $row->email;?>" data-doctors="<?php //foreach($d as $doc){ echo $doc.',<br>';}?>">
                        <i class="fa fa-eye"></i>
                    </a>
                    <a href="<?php echo base_url('admin/hospitals/edit/'.$row->id);?>" data-toggle="tooltip" title="edit_hospitals" class="btn btn-effect-ripple btn-xs btn-success"><i class="fa fa-pencil"></i></a>
                    <a href="#" data-href="<?php echo base_url('admin/hospitals/delete/'.$row->id);?>" data-toggle="modal" data-name="<?php echo $row->hospital_name;?>" title="delete_hospitals" data-target="#confirm-delete" class="btn btn-effect-ripple btn-xs btn-danger del-row"><i class="fa fa-times"></i></a>
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
                <h3 class="modal-title"><strong>Hospital Details</strong></h3>
            </div>
            <div class="modal-body">
                <div class="box span3">
                    <div class="box-content">
                        <table class="table table-bordered">
                            <tbody>
                            <tr>
                                <td>ID</td>
                                <td id="hospital_id"></td>
                            </tr>
                            <tr>
                                <td>Hospital Name</td>
                                <td id="hospital_name"></td>
                            </tr>
                            <tr>
                                <td>Location</td>
                                <td id="location"></td>
                            </tr>
                            <tr>
                                <td>Emergency Service</td>
                                <td id="emergency_service"></td>
                            </tr>
                            <tr>
                                <td>Ambulance Number</td>
                                <td id="ambulance"></td>
                            </tr>
                            <tr>
                                <td>Phone Number</td>
                                <td id="phone"></td>
                            </tr>
                            <tr>
                                <td>Email</td>
                                <td id="email"></td>
                            </tr>
                            <!--<tr>
                                <td>Doctors</td>
                                <td id="doctors"></td>
                            </tr>-->
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
            var location = $(this).attr('data-location');
            var emergency_service = $(this).attr('data-emergency');
            var ambulance = $(this).attr('data-ambulance');
            var phone = $(this).attr('data-phone');
            var email = $(this).attr('data-email');
            //var doctors = $(this).attr('data-doctors');

            $('td#hospital_id').html(id);
            $('td#hospital_name').html(name);
            $('td#location').html(location);
            $('td#emergency_service').html(emergency_service);
            $('td#ambulance').html(ambulance);
            $('td#phone').html(phone);
            $('td#email').html(email);
            //$('td#doctors').html(doctors);
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




