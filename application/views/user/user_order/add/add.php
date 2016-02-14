<div class="col-md-1"></div>
<div class="block col-md-8">
    <div class="block-title">
        <h2>Place an Order</h2>
    </div>

    <?php if(isset($error)){ ?>
        <div class="alert alert-info alert-dismissable">
            <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
            <h4><strong>Failed to Place!!</strong></h4>
            <?php
            echo $error;
            ?>
        </div>
        <?php
    }?>

    <?php if(isset($message)){ ?>
        <div class="alert alert-success alert-dismissable">
            <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
            <h4><strong>Successful</strong></h4>
            <?php
            echo $message;
            ?>
        </div>
        <?php
    }?>

    <form name="cms_page" action="" method="post" class="form-horizontal form-bordered" enctype="multipart/form-data" >
        <div class="form-group">
            <label class="col-xs-4 control-label" for="medicine">Place an Order For </label>
            <div class="col-xs-6">
                <div class="input-group">
                    <select id="patient" name="patient" class="form-control" size="1">
                        <?php $session_data = $this->session->userdata('login');
                        $id = $session_data->id;
                        $email = $session_data->email;
                        $patient = $this->user_model->show_patient($id);?>
                        <option disabled selected>Select the Person</option>
                        <?php foreach ($patient as $p) {
                            if ($p->email == $email) {
                                ?>
                                <option value="<?php echo $p->id; ?>"><?php echo $p->patient; ?></option>
                            <?php } elseif($p->id == $val) {
                                ?>
                                <option value="<?php echo $p->id; ?>"
                                        selected="selected"><?php echo $p->patient; ?></option>
                            <?php } else {?>
                                <option value="<?php echo $p->id; ?>"><?php echo $p->patient; ?></option>
                            <?php }
                        } ?>
                    </select>
                    <span class="input-group-addon"><i class="fa fa-users"></i></span>
                </div>
                <div style="margin-top: 10px;">Click <a href="javascript:void(0)" style="text-decoration: none;" class="popup" onclick="popup()">here </a> to Add New Member</div>
            </div>
        </div>

        <div class="form-group">
            <label class="col-xs-4 control-label" for="disease">Select Prescription For </label>
            <div class="col-xs-6">
                <div class="input-group">
                    <select id="disease" name="disease" class="form-control" size="1">
                        <option disabled selected>Select Prescription</option>
                    </select>
                    <span class="input-group-addon"><i class="fa fa-bomb"></i></span>
                </div>
<!--                <div style="margin-top: 10px;">Click <a href="--><?php //echo base_url('user/prescription/add');?><!--">here </a> to Add Prescription</div>-->
                <div style="margin-top: 10px;">Click <a href="javascript:void(0)" style="text-decoration: none;" class="popup" onclick="popup()">here </a> to Add Prescription</div>
            </div>
        </div>

        <div class="form-group">
            <label class="col-xs-4 control-label">Re-occuring Order
                &nbsp;&nbsp;<a href="#modal-fade" style="text-decoration:none;" title="view_info" class="view-modal" data-info="<?php echo $this->lang->line('reoccuring_order');?>" data-toggle="modal">
                    <span class="label label-info">
                    <i class="fa fa-info-circle info"></i></span></a></label>
            <div class="col-xs-6">
                <label class="switch switch-info">
                    <input name="reoccuring_order" id="reoccuring_order" type="checkbox" value="1"><span></span></label>
            </div>
        </div>

        <div id="reoccuring" style="display:none;">
        <div class="form-group">
            <label class="col-xs-4 control-label" for="name">Re-occuring Interval <br>(in days)
                &nbsp;<a href="#modal-fade" style="text-decoration:none;" title="view_info" class="view-modal" data-info="<?php echo $this->lang->line('reoccuring_interval');?>" data-toggle="modal">
                    <span class="label label-info">
                    <i class="fa fa-info-circle"></i></span></a></label>
            <div class="col-xs-6">
                <div class="input-group">
                    <input type="text" id="reoccuring_interval" name="reoccuring_interval" class="form-control"
                           placeholder="Enter Reoccuring Interval">
                    <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                </div>
            </div>
        </div>

            <div class="form-group">
                <label class="col-xs-4 control-label">Notify Expiration
                    &nbsp;&nbsp;<a href="#modal-fade" style="text-decoration:none;" title="view_info" class="view-modal" data-info="<?php echo $this->lang->line('notify');?>" data-toggle="modal">
                        <span class="label label-info">
                    <i class="fa fa-info-circle"></i></span></a></label>
                <div class="col-xs-6">
                    <label class="switch switch-danger">
                        <input name="notify" id="notify" type="checkbox" value="1"><span></span></label>
                </div>
            </div>


            <div class="form-group">
            <label class="col-xs-4 control-label">Automatically place Order After Expiration
                &nbsp;&nbsp;<a href="#modal-fade" style="text-decoration:none;" title="view_info" class="view-modal" data-info="<?php echo $this->lang->line('place_automatic');?>" data-toggle="modal">
                    <span class="label label-info">
                    <i class="fa fa-info-circle"></i></span></a></label>
            <div class="col-xs-6">
                <label class="switch switch-primary">
                    <input name="place_automatic" id="place_automatic" type="checkbox" value="1"><span></span></label>
            </div>
        </div>
        </div>

        <div class="form-group form-actions">
            <div class="col-xs-4"></div>
            <div class="col-xs-4">
                <button type="submit" id="submit" class="btn btn-effect-ripple btn-primary">Place Order</button>
                <button href="<?php echo base_url('user/user_order/add');?>" type="reset" class="btn btn-effect-ripple btn-danger">Reset</button>
            </div>
        </div>
    </form>
</div>

<div id="modal-fade" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content col-md-10">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h3 class="modal-title"><strong>Information</strong></h3>
            </div>
            <div class="modal-body">

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-effect-ripple btn-danger" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

<script src="<?php echo base_url('assets/js/pages/formsWizard.js'); ?>"></script>
<script>$(function () {
        FormsWizard.init();
    });</script>

<script type="text/javascript">
    $(document).ready(function () {
        var max_fields = 10; //maximum input boxes allowed
        var wrapper = $(".input_fields_wrap"); //Fields wrapper
        var add_button = $(".add_field_button"); //Add button ID

        var x = 1; //initlal text box count
        $(add_button).click(function (e) { //on add input button click
            e.preventDefault();
            if (x < max_fields) { //max input box allowed
                x++; //text box increment
                $(wrapper).append('<div><label class="col-md-4 control-label" for="medicine">Medicine <span class="text-danger">*</span></label><div class="col-md-6"><div class="input-group"><input type="text" id="medicine" name="medicine[]" class="form-control" placeholder="Enter Medicine name here" required><span class="input-group-addon"><i class="fa fa-medkit"></i></span></div></div><label class="col-md-4 control-label" for="dose">Dose <span class="text-danger">*</span></label><div class="col-md-6"><div class="input-group"><input type="text" id="dose" name="dose[]" class="form-control" placeholder="Enter Dose" required><span class="input-group-addon"><i class="gi gi-pot"></i></span></div></div><div class="col-md-2 remove_field"><a href=""><i class="fa fa-minus"></i></a></div></div>'); //add input box
            }
        });

        $(wrapper).on("click", ".remove_field", function (e) { //user click on remove text
            e.preventDefault();
            $(this).parent('div').remove();
            x--;
        })
    });

    $("#patient").change(function(event){
        var id = $(this).val();
        $.ajax({
            url: '<?php echo base_url("user/select_disease");?>',
            type: "post",
            data: {pid: id},
            dataType: 'json',
            success: function (data) {
                var container = $('#disease');
                if (data.length != 0) {
                    container.empty();
                    jQuery.each(data, function (index, item) {
                        container.append('<option>' + data[index].disease + '</option>');
                    });
                }else{
                    container.empty();
                    container.append('<option disabled selected>' + 'NO Prescription Added' + '</option>');
                }
            }
        });
    });

    $("#reoccuring_order").change(function(event) {
        if (this.checked) {
            $("#reoccuring").show();
        }else{
            $("#reoccuring").hide();
        }
    });

    $(function() {
        $('a.view-modal').click(function (e) {
            var info = $(this).attr('data-info');
            $('.modal-body').html(info);
        });
    });

    function popup(){
        var myWindow = [];
        var add_pres = "<?php echo base_url('user/prescription/add');?>" ;
        myWindow.push(window.open(add_pres,'AddPrescription'+new Date().getTime(),'height=700,width=850,left=350,top=30,fullscreen=no,titlebar=0,resizable=1,scrollbars=1,toolbar=no,menubar=0,location=0,directories=0,status=0'));
    }

</script>

