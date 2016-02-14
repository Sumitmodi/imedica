
<div class="block full">
    <div class="block-title">
        <h2>Patient Table</h2>
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
        <table id="example-datatabl" class="table table-bordered table-vcenter">
            <thead>
            <tr>
                <th class="text-center" style="width: 100px;">Serial No</th>
                <th>Name</th>
                <th>Prescriptions</th>
                <th class="text-center" style="width: 125px;"><i class="fa fa-flash"></i></th>
            </tr>
            </thead>
            <tbody>

            <?php
            foreach ($query as $k=>$row)
            {?>
            <tr>
                <td class="text-center"><?php echo $k+1;?></td>
                <td><strong><?php echo $row->patient;?></strong></td>
                <td><?php $pres = $this->user_model->table_fetch_rows('prescribed_medicine',array('patient'=>$row->id));
                    if($pres != NULL) {
                        foreach ($pres as $key=>$p) {
                            echo $key+1 .") ".$p->disease . "<br>";
                        }
                    }else{
                        echo "No Prescription Added";
                    }

                 ?></td>

                <td class="text-center">
                    <a href="#modal-fade" title="view_patient" class="btn btn-effect-ripple btn-xs btn-info view-modal" data-toggle="modal" data-name="<?php echo $row->patient;?>" data-age="<?php echo $row->age;?>" data-location="<?php echo $row->location;?>" data-phone="<?php echo $row->phone_no;?>" data-id="<?php echo $row->id;?>" data-email="<?php echo $row->email;?>">
                        <i class="fa fa-eye"></i></a>
<!--                    <a href="--><?php //echo base_url('user/prescribed_medicine/add/'.$row->id);?><!--" data-toggle="tooltip" title="place_order" class="btn btn-effect-ripple btn-xs btn-primary"><i class="fa fa-plus"></i></a>-->
<!--                    <a href="--><?php //echo base_url('user/patient/edit/'.$row->id);?><!--" data-toggle="tooltip" title="edit_patient" class="btn btn-effect-ripple btn-xs btn-success"><i class="fa fa-pencil"></i></a>-->
<!--                    --><?php //$session_data = $this->session->userdata('login');
//                    if($row->email != $session_data->email ){?>
<!--                    <a href="#" data-href="--><?php //echo base_url('user/prescription/delete/'.$row->id);?><!--" data-toggle="modal" data-name="--><?php //echo $row->patient?><!--" title="delete_patient" data-target="#confirm-delete" class="btn btn-effect-ripple btn-xs btn-danger del-row"><i class="fa fa-times"></i></a>-->
<!--                --><?php //} ?>
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
                <h3 class="modal-title"><strong>Patient Details</strong></h3>
            </div>
            <div class="modal-body">
                <div class="box span3">
                    <div class="box-content">
                        <table class="table table-bordered">
                            <tbody>
                            <tr>
                                <td>ID</td>
                                <td id="patient_id"></td>
                            </tr>
                            <tr>
                                <td>Name</td>
                                <td id="name"></td>
                            </tr>
                            <tr>
                                <td>Age</td>
                                <td id="age"></td>
                            </tr>
                            <tr>
                                <td>Location</td>
                                <td id="location"></td>
                            </tr>
                            <tr>
                                <td>Phone Number</td>
                                <td id="phone_no"></td>
                            </tr>
                            <tr>
                                <td>Email</td>
                                <td id="email"></td>
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
            var age = $(this).attr('data-age');
            var location = $(this).attr('data-location');
            var phone = $(this).attr('data-phone');
            var email = $(this).attr('data-email');

            $('td#patient_id').html(id);
            $('td#name').html(name);
            $('td#age').html(age);
            $('td#location').html(location);
            $('td#phone_no').html(phone);
            $('td#email').html(email);
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




