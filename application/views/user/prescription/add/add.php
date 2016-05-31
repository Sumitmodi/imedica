
<div class="row">
    <div class="col-sm-10 col-sm-offset-1 col-md-8 col-md-offset-2 col-lg-10 col-lg-offset-1">
        <!-- Validation Wizard Block -->

        <div class="block">
            <div class="block-title">
                <h2>Add Prescription</h2>
            </div>
            <?php if (isset($message)) { ?>
                <div class="alert alert-success alert-dismissable">
                    <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
                    <?php
                    echo $message;
                    ?>
                </div>
                <?php
            } ?>
            <?php echo $this->load->view('user/prescription/add/form');?>
        </div>
    </div>
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
                $(wrapper).append('<div><label class="col-md-4 control-label" for="medicine">Medicine </label><div class="col-md-6" style="margin-bottom: 10px;"><div class="input-group"><input type="text" autocomplete="off" id="medicine" name="medicine[]" class="medicine form-control" placeholder="Enter Medicine name here" required><ul class="med_suggest" style="margin-bottom: 10px;margin-top: 40px;list-style-type: none;"></ul><span class="input-group-addon"><i class="fa fa-medkit"></i></span></div></div><label class="col-md-4 control-label" for="dose">Dose and Quantity </label><div class="col-md-3"><div class="input-group"><input type="text" id="dose" name="dose[]" class="form-control" placeholder="Enter Dose"><span class="input-group-addon"><i class="gi gi-pot"></i></span></div></div><div class="col-md-3" style="margin-bottom:10px"><div class="input-group"><input type="text" id="quantity" name="quantity[]" class="form-control" placeholder="Enter Quantity"><span class="input-group-addon"><i class="fa fa-archive"></i></span></div></div><div class="col-md-2 remove_field"><a href=""><i class="fa fa-minus"></i></a></div></div>'); //add input box
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
            $('.modal-body').html(info);
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


