<style type="text/css">
    #pres_sug, #hosp_sug, .med_suggest{
        background-color:#107fc9;
        padding: 10px;
        position: absolute;
        width: 88%;
        z-index: 9;
        display: none;
    }
    #pres_sug li,#hosp_sug li, .med_suggest li{
        padding: 3px 0;
        color: #FFF;
        cursor: pointer;
    }
    #pres_sug li:not(:last-child),#hosp_sug li:not(:last-child), .med_suggest li:not(:last-child){
        border-bottom: 1px solid #FFF;
    }
    #doctor,#hospital, #medicine{
        margin-bottom: 0px;
    }
</style>

            <?php if (validation_errors()) { ?>
                <div class="alert alert-danger alert-dismissable">
                    <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
                    <?php
                    echo validation_errors();
                    ?>
                </div>
            <?php } ?>


            <form id="clickable-wizard" action="" method="post" class="form-horizontal form-bordered"
                  enctype="multipart/form-data">
                <!-- First Step -->
                <div id="clickable-first" class="step">
                    <!-- Step Info -->
                    <div class="form-group">
                        <div class="col-xs-12">
                            <ul class="nav nav-pills nav-justified clickable-steps">
                                <li class="active"><a href="javascript:void(0)" data-gotostep="clickable-first"><i
                                            class="fa fa-user"></i> <strong>Personal Info</strong></a></li>
                                <li><a href="javascript:void(0)" data-gotostep="clickable-second"><i
                                            class="fa fa-pencil-square-o"></i> <strong>Prescription</strong></a></li>

                            </ul>
                        </div>
                    </div>
                    <!-- END Step Info -->
                    <div class="form-group">
                        <label class="col-md-2 control-label" for="medicine">Prescription For</label>

                        <div class="col-md-10">
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label class="col-sm-3 control-label">Own </label>

                                    <div class="col-sm-4">
                                        <label class="csscheckbox csscheckbox-info"><input name="own" id="own"
                                                                                           type="checkbox">
                                            <span></span></label>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-8">
                                <div class="form-group">
                                    <div class="input-group">
                                        <select id="other_users" name="other_users" class="form-control" size="1">
                                            <?php $session_data = $this->session->userdata('login');
                                            $id = $session_data->id;
                                            $email = $session_data->email;
                                            $patient = $this->user_model->show_my_patients($id); ?>
                                            <option disabled selected>Select From Existing</option>
                                            <?php foreach ($patient as $p) { ?>
                                                <option
                                                    value="<?php echo $p->id; ?>"><?php echo $p->patient; ?></option>
                                            <?php } ?>
                                        </select>
                                        <span class="input-group-addon"><i class="fa fa-user"></i></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <input type="hidden" value="<?php echo $id; ?>" id="parent_id" name="parent_id"/>
                    <input type="hidden" value="" id="own_id" name="own_id"/>
                    <input type="hidden" value="<?php echo $email; ?>" id="parent_email" name="parent_email"/>

                    <div class="form-group">
                        <label class="col-md-2 control-label" for="name">Name</label>

                        <div class="col-md-8">
                            <div class="input-group">
                                <input type="text" id="name" name="name" class="form-control"
                                       placeholder="Enter Name">
                                <span class="input-group-addon"><i class="fa fa-user"></i></span>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-2 control-label" for="age">Age</label>

                        <div class="col-md-8">
                            <div class="input-group">
                                <input type="number" id="age" name="age" class="form-control"
                                       placeholder="Enter Age" required>
                                <span class="input-group-addon"><i class="fa fa-font"></i></span>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-2 control-label" for="location">Location</label>

                        <div class="col-md-8">
                            <div class="input-group">
                                <input type="text" id="location" name="location" class="form-control"
                                       placeholder="Enter Location">
                                <span class="input-group-addon"><i class="fa fa-home"></i></span>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-2 control-label" for="email">Email</label>

                        <div class="col-md-8">
                            <div class="input-group">
                                <input type="email" id="email" name="email" class="form-control"
                                       placeholder="Enter Email" required>
                                <span class="input-group-addon"><i class="fa fa-envelope"></i></span>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-2 control-label" for="phone_no">Phone Number</label>

                        <div class="col-md-8">
                            <div class="input-group">
                                <input type="text" id="phone_no" name="phone_no" class="form-control"
                                       placeholder="Enter Phone Number">
                                <span class="input-group-addon"><i class="fa fa-phone-square"></i></span>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- END First Step -->

                <!-- Second Step -->
                <div id="clickable-second" class="step">
                    <!-- Step Info -->
                    <div class="form-group">
                        <div class="col-xs-12">
                            <ul class="nav nav-pills nav-justified clickable-steps">
                                <li><a href="javascript:void(0)" class="text-muted" data-gotostep="clickable-first"><i
                                            class="fa fa-user"></i>
                                        <del><strong>Personal Info</strong></del>
                                    </a></li>
                                <li class="active"><a href="javascript:void(0)" data-gotostep="clickable-second"><i
                                            class="fa fa-pencil-square-o"></i> <strong>Prescription</strong></a></li>
                            </ul>
                        </div>
                    </div>
                    <!-- END Step Info -->

                    <div class="form-group">
                        <label class="col-md-4 control-label" for="disease">Prescription
                            &nbsp;&nbsp;<a href="#modal-fade-info" style="text-decoration:none;" title="view_info" class="view-modal" data-info="<?php echo $this->lang->line('prescription_info');?>" data-toggle="modal">
                    <span class="label label-info">
                    <i class="fa fa-info-circle info"></i></span></a></label>

                        <div class="col-md-8">
                            <div class="input-group">
                                <input type="text" id="disease" name="disease" class="form-control"
                                       placeholder="Enter Prescription Name" required>
                                <span class="input-group-addon"><i class="fa fa-bomb"></i></span>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-4 control-label" for="doctor">Doctor name</label>

                        <div class="col-md-8">
                            <div class="input-group">
                                <input type="text" autocomplete="off" id="doctor" name="doctor" class="form-control"
                                       placeholder="Enter Doctor Name">
                                <ul id="pres_sug" style="margin-bottom: 10px;margin-top: 40px;list-style-type: none;">

                                </ul>
                                <span class="input-group-addon"><i class="fa fa-user"></i></span>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-4 control-label" for="disease">Hospital name</label>

                        <div class="col-md-8">
                            <div class="input-group">
                                <input type="text" autocomplete="off" id="hospital" name="hospital" class="form-control"
                                       placeholder="Enter Hospital Name">
                                <ul id="hosp_sug" style="margin-bottom: 10px;margin-top: 40px;list-style-type: none;">

                                </ul>
                                <span class="input-group-addon"><i class="fa fa-h-square"></i></span>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-4 control-label" for="example-validation-suggestions">Prescription
                            File</label>

                        <div class="col-md-8">
                            <input type="file" id="userfile" name="userfile" class="form-control"/>
                        </div>
                    </div>

                    <div class="form-group input_fields_wrap">
                        <div>
                            <label class="col-md-4 control-label" for="dose">Medicine</label>
                            <div class="col-md-6" style="margin-bottom: 10px;">
                                <div class="input-group">
                                    <input autocomplete="off" type="text" id="medicine" name="medicine[]"
                                           class="medicine form-control"
                                           placeholder="Enter Medicine name here" required>
                                    <ul class="med_suggest" style="margin-bottom: 10px;margin-top: 40px;list-style-type: none;">

                                    </ul>
                                    <span class="input-group-addon"><i class="fa fa-medkit"></i></span>
                                </div>
                            </div>


                            <label class="col-md-4 control-label" for="dose">Dose and Quantity</label>
                            <div class="col-md-3">
                                <div class="input-group">
                                    <input type="text" id="dose" name="dose[]" class="form-control"
                                           placeholder="Dose" required>
                                    <span class="input-group-addon"><i class="gi gi-pot"></i></span>
                                </div>
                            </div>

                            <div class="col-md-3" style="margin-bottom:10px">
                                <div class="input-group">
                                    <input type="text" id="quantity" name="quantity[]" class="form-control"
                                           placeholder="Quantity" required>
                                    <span class="input-group-addon"><i class="fa fa-archive"></i></span>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-2 add_field_button"><strong><a href=""><i
                                        class="fa fa-plus"></i></a></strong></div>
                        <div class="clearfix"></div>
                    </div>

                </div>
                <!-- END Second Step -->

                <!-- Form Buttons -->
                <div class="form-group form-actions">
                    <div class="col-md-8 col-md-offset-4">
                        <button type="reset" class="btn btn-effect-ripple btn-danger" id="back1">Back</button>
                        <button type="submit" class="btn btn-effect-ripple btn-primary" id="next1" name="pres_add">Next</button>
                    </div>
                </div>
                <!-- END Form Buttons -->
            </form>
            <!-- END Clickable Wizard Content -->

<div id="modal-fade-info" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content col-md-10">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h3 class="modal-title"><strong>Information</strong></h3>
            </div>
            <div class="modal-body" id="pres_info">

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-effect-ripple btn-danger" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>


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
                $(wrapper).append('<div><label class="col-md-4 control-label" for="medicine">Medicine </label><div class="col-md-6" style="margin-bottom: 10px;"><div class="input-group"><input type="text" autocomplete="off" id="medicine" name="medicine[]" class="medicine form-control" placeholder="Enter Medicine name here" required><ul class="med_suggest" style="margin-bottom: 10px;margin-top: 40px;list-style-type: none;"></ul><span class="input-group-addon"><i class="fa fa-medkit"></i></span></div></div><label class="col-md-4 control-label" for="dose">Dose and Quantity </label><div class="col-md-3"><div class="input-group"><input type="text" id="dose" name="dose[]" class="form-control" placeholder="Dose"><span class="input-group-addon"><i class="gi gi-pot"></i></span></div></div><div class="col-md-3" style="margin-bottom:10px"><div class="input-group"><input type="text" id="quantity" name="quantity[]" class="form-control" placeholder="Quantity"><span class="input-group-addon"><i class="fa fa-archive"></i></span></div></div><div class="col-md-2 remove_field"><a href=""><i class="fa fa-minus"></i></a></div></div>'); //add input box
                $('.medicine').keyup(medicine_suggest);
            }
        });

        $(wrapper).on("click", ".remove_field", function (e) { //user click on remove text
            e.preventDefault();
            $(this).parent('div').remove();
            x--;
        })
    });

    $(function() {
        $('a.view-modal').click(function (e) {
            var info = $(this).attr('data-info');
            $('#pres_info').html(info);
        });
    });

    $("#own").change(function (event) {
        if (this.checked) {
            $("#other_users").attr("disabled", "disabled");
            var email = $('#parent_email').val();
            var data = new Array();
            $.ajax({
                url: '<?php echo base_url("user/show_specific_patient");?>',
                type: "post",
                data: {email: email},
                dataType: 'json',
                success: function (response) {
                    data = response;
                    $("#own_id").val(data.id);
                    $("#name").val(data.patient);
                    $("#age").val(data.age);
                    $("#location").val(data.location);
                    $("#email").val(data.email);
                    $("#email").attr("disabled", "disabled")
                    $("#phone_no").val(data.phone_no);
                }
            });
        } else {
            $("#other_users").removeAttr("disabled");
            $("#own_id").val('');
            $("#name").val('');
            $("#age").val('');
            $("#location").val('');
            $("#email").val('');
            $("#email").removeAttr("disabled");
            $("#phone_no").val('');
        }
    });

    $("#other_users").change(function (event) {
        var id = $(this).val();
        var parent_id = $("#parent_id").val();
        $.ajax({
            url: '<?php echo base_url("user/show_patient_details");?>',
            type: "post",
            data: {pid: id, parent_id: parent_id},
            dataType: 'json',
            success: function (response) {
                data = response;
                console.log(data);
                $("#own_id").val(data.id);
                $("#name").val(data.patient);
                $("#age").val(data.age);
                $("#location").val(data.location);
                $("#email").val(data.email);
                $("#phone_no").val(data.phone_no);
            }
        });
    });

    $('#doctor').keyup(function() {
        var val1 = $(this).val();
        var container = $('#pres_sug');
        if (val1 == ''){
            container.empty();
            container.fadeOut('fast');
            return;
        }
        var val2 = 'doctor';
        var target = $(this);
        $.ajax({
            type: 'POST',
            url: '<?php echo base_url("front/suggest");?>',
            data: { keyword: val1, type: val2 },
            dataType : 'json',
            success: function(response) {
                if(response.length > 0){
                    container.fadeIn('slow');
                    container.empty();
                    for(var key in response){
                        container.append('<li>'+response[key]+'</li>');
                    }
                    container.children('li').click(function(){
                        var val = $(this).text();
                        target.val(val);
                        container.empty();
                        container.fadeOut('slow');
                    });
                }
            }
        });
    });

    $('#hospital').keyup(function() {
        var val1 = $(this).val();
        var container = $('#hosp_sug');
        if (val1 == ''){
            container.empty();
            container.fadeOut('fast');
            return;
        }
        var val2 = 'hospital';
        var target = $(this);
        $.ajax({
            type: 'POST',
            url: '<?php echo base_url("front/suggest");?>',
            data: { keyword: val1, type: val2 },
            dataType : 'json',
            success: function(response) {
                if(response.length > 0){
                    container.fadeIn('slow');
                    container.empty();
                    for(var key in response){
                        container.append('<li>'+response[key]+'</li>');
                    }
                    container.children('li').click(function(){
                        var val = $(this).text();
                        target.val(val);
                        container.empty();
                        container.fadeOut('slow');
                    });
                }
            }
        });
    });


    var medicine_suggest = function (e) {
        var val1 = $(this).val();
        var container = $(this).next('.med_suggest');
        if (val1 == ''){
            container.empty();
            container.fadeOut('fast');
            return;
        }
        var val2 = 'medicine';
        var that = $(this);
        $.ajax({
            type: 'POST',
            url: '<?php echo base_url("front/suggest");?>',
            data: {keyword: val1, type: val2},
            dataType: 'json',
            success: function (response) {
                if (response.length > 0) {
                    container.fadeIn('slow');
                    container.empty();
                    for (var key in response) {
                        container.append('<li>' + response[key] + '</li>');
                    }
                    container.children('li').click(function () {
                        var val = $(this).text();
                        that.val(val);
                        container.empty();
                        container.fadeOut('slow');
                    });
                }
            }
        });
    };

    $('.medicine').keyup(medicine_suggest);

    $(document).click(function (e) {
        if($(e.target).attr('id') != 'doctor'){
            $('#pres_sug').fadeOut('slow');
        }
        if($(e.target).attr('id') != 'hospital'){
            $('#hosp_sug').fadeOut('slow');
        }
        if($(e.target).attr('id') != 'medicine'){
            $('.med_suggest').fadeOut('slow');
        }
    });

</script>


