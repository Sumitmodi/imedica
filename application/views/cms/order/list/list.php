<div class="block full">
    <div class="block-title">
        <h2>Order Table</h2>
    </div>

    <?php if ($this->session->flashdata('message')) { ?>
        <div class="alert alert-success alert-dismissable">
            <?php
            echo $this->session->flashdata('message');
            ?>
        </div>
        <?php
    } ?>

    <div class="table-responsive">
        <table id="example-datatable" class="table table-bordered table-vcenter">
            <thead>
            <tr>
                <th class="text-center" style="width: 100px;">Serial No</th>
                <th style="width: 100px;">Person</th>
                <th>Prescription</th>
                <th>Reoccuring Order</th>
                <th>Placed On</th>
                <th>Status</th>
                <th class="text-center" style="width: 125px;"><i class="fa fa-flash"></i></th>
            </tr>
            </thead>
            <tbody>

            <?php
            foreach ($query as $k => $row)
            {
            ?>
            <tr>
                <td class="text-center"><?php echo $k + 1; ?></td>
                <td><?php $data = $this->admin_model->table_fetch_row('patient',array('id'=>$row->patient));
                    echo $data[0]->patient; ?></td>
                <td><?php echo $row->disease; ?></td>
                <td class="text-center"><?php if ($row->reoccuring_order == 1) { ?>
                        <i class="fa fa-check"></i><?php echo "&nbsp;&nbsp;" . $row->reoccuring_interval . " days";
                    } else { ?>
                        <i class="fa fa-times"></i> <?php } ?>
                </td>
                <td><?php echo $row->date; ?></td>
                <?php $pres = $this->admin_model->table_fetch_row('prescribed_medicine',array('patient'=>$row->patient,'disease'=>$row->disease)); ?>

                <?php if ($row->status == 1) { ?>
                    <td class="hidden-sm hidden-xs text-center"><a href="javascript:void(0)"
                                                                   class="label label-success">Placed</a>
                    </td><?php } elseif ($row->status == 2) { ?>
                    <td class="hidden-sm hidden-xs text-center"><a href="javascript:void(0)" class="label label-info">Processing</a>
                    </td><?php } elseif ($row->status == 3) { ?>
                    <td class="hidden-sm hidden-xs text-center"><a href="javascript:void(0)"
                                                                   class="label label-primary">Processed</a>
                    </td><?php } elseif ($row->status == 4) { ?>
                    <td class="hidden-sm hidden-xs text-center"><a href="javascript:void(0)"
                                                                   class="label label-warning">Denied</a>
                    </td><?php } elseif ($row->status == 5) { ?>
                    <td class="hidden-sm hidden-xs text-center"><a href="javascript:void(0)" class="label label-danger">Cancelled</a>
                    </td><?php } elseif ($row->status == 6){ ?>
                    <td class="hidden-sm hidden-xs text-center"><a href="javascript:void(0)" class="label label-danger">On the way to Delivery</a>
                    </td><?php } ?>

                <td class="text-center">
                    <a href="#modal-fade" title="view_order" class="btn btn-effect-ripple btn-xs btn-info view-modal"
                       data-toggle="modal" data-id="<?php echo $row->id; ?>" data-disease="<?php echo $row->disease; ?>"
                       data-reoccuring_order="<?php if($row->reoccuring_order==1){echo "YES";}else{echo "NO";} ?>"
                       data-reoccuring_interval="<?php echo $row->reoccuring_interval; ?>" data-prescribed_by="<?php echo $pres[0]->prescribed_by; ?>"
                       data-medicine="<?php echo $pres[0]->medicine; ?>" data-dose="<?php echo $pres[0]->dose; ?>"
                       data-hospital="<?php echo $pres[0]->hospital_name; ?>" data-date="<?php echo $row->date; ?>"
                       data-patient="<?php echo $data[0]->patient; ?>" data-status="<?php echo $row->status; ?>"
                       data-prescription_file="<?php echo $pres[0]->prescription;; ?>">
                        <i class="fa fa-eye"></i>
                    </a>
                    <?php if($row->status < 2){?>
                        <a href="#" data-href="<?php echo base_url('user/cancel_order?id='.$row->id);?>" data-toggle="modal" data-name="<?php echo $row->disease; ?>" title="cancel_order" data-target="#confirm-cancel" class="btn btn-effect-ripple btn-xs btn-danger cancel-order"><i class="fa fa-times"></i></a>
                    <?php } ?>
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
                <h3 class="modal-title"><strong>Order Details</strong></h3>
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
                                <td>Person</td>
                                <td id="patient"></td>
                            </tr>
                            <tr>
                                <td>Prescription</td>
                                <td id="disease"></td>
                            </tr>
                            <tr>
                                <td>Medicine</td>
                                <td id="medicine"></td>
                            </tr>
                            <tr>
                                <td>Dose</td>
                                <td id="dose"></td>
                            </tr>
                            <tr>
                                <td>Reoccuring Order</td>
                                <td id="reoccuring_order"></td>
                            </tr>

                            <tr>
                                <td>Reoccuring Interval</td>
                                <td id="reoccuring_interval"></td>
                            </tr>
                            <tr>
                                <td>Prescribed By</td>
                                <td id="prescribed_by"></td>
                            </tr>
                            <tr>
                                <td>Hospital</td>
                                <td id="hospital"></td>
                            </tr>
                            <tr>
                                <td>Order Date</td>
                                <td id="date"></td>
                            </tr>
                            <tr>
                                <td>Prescription file</td>
                                <td id="prescription_file"></td>
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
<!--                <a href="--><?php ////echo base_url('user/download/?name='.$pres[0]->prescription);?><!--"><button type="button" class="btn btn-effect-ripple btn-info" id="download">Download Prescription file</button></a>-->
                <button type="button" class="btn btn-effect-ripple btn-danger" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

<div id="confirm-cancel" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title"><span id="del_name"></span></h4>
            </div>
            <div class="modal-body">
                Are you sure you want to cancel this order?
            </div>
            <div class="modal-footer">
                <a class="btn btn-effect-ripple btn-danger">Confirm</a>
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
            var patient = $(this).attr('data-patient');
            var disease = $(this).attr('data-disease');
            var medicine = $(this).attr('data-medicine');
            var dose = $(this).attr('data-dose');
            var reoccuring_order = $(this).attr('data-reoccuring_order');
            var reoccuring_interval = $(this).attr('data-reoccuring_interval');
            var prescribed_by = $(this).attr('data-prescribed_by');
            var hospital = $(this).attr('data-hospital');
            var date = $(this).attr('data-date');
            var prescription_file = $(this).attr('data-prescription_file');
            var status = $(this).attr('data-status');

            $('td#patient_id').html(id);
            $('td#disease').html(disease);
            $('td#patient').html(patient);
            $('td#medicine').html(medicine);
            $('td#dose').html(dose);
            $('td#reoccuring_order').html(reoccuring_order);
            $('td#reoccuring_interval').html(reoccuring_interval);
            $('td#prescribed_by').html(prescribed_by);
            $('td#hospital').html(hospital);
            $('td#date').html(date);
            $('td#prescription_file').html(prescription_file);
            if (status == 1) {
                $('td#status').text("Placed");
            } else if (status = 2) {
                $('td#status').text("Processing");
            } else if (status = 3) {
                $('td#status').text("Processed");
            } else if (status = 4) {
                $('td#status').text("Denied");
            }else if (status = 5) {
                $('td#status').text("Cancelled");
            }else if (status = 6) {
                $('td#status').text("On the way to Delivery");
            }
        })
    });

    $(function () {
        $('a.cancel-order').click(function (e) {
            var name = $(this).attr('data-name');
            $('span#del_name').html(name);
        });
    });

    $('#confirm-cancel').on('show.bs.modal', function (e) {
        $(this).find('.btn-danger').attr('href', $(e.relatedTarget).data('href'));
    });
</script>




