
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
    #prescribed_by,#hospital, #medicine{
        margin-bottom: 10px;
    }
</style>

<div class="about-intro-wrap pull-left">
    <div class="container">
        <div class="row">
            <div class="col-xs-12 col-lg-12  col-sm-12 col-md-12 pull-left contact2-wrap">

                <div class="col-lg-12 col-sm-12 col-md-12 col-xs-12 no-pad wow fadeInLeft" data-wow-delay="0.5s" data-wow-offset="100">
                    <?php if($this->session->flashdata('message')){?>
                        <div class="alert alert-success text-center">
                        <a href="#" class="close" data-dismiss="alert">×</a>
                        <i class="fa fa-flag flag-icon pull-left"></i> <?php echo $this->session->flashdata('message');?>
                        </div><?php } ?>

                    <form action="<?php echo base_url('orderform'); ?>" class="contact2-page-form col-lg-12 col-sm-12 col-md-12 col-xs-12 no-pad contact-v2" id="orderform" name="orderform" method="post" enctype="multipart/form-data">
                        <div class="form-title-text no-pad"><?php echo $this->lang->line('order_placeorder');?></div>

                        <div class="col-md-3">
                            <div class="col-lg-12 col-sm-12 col-md-12 col-xs-12">
                                <label for="name"><strong>Name of Patient</strong></label>
                                <input type="text" class="contact2-textbox" placeholder="Name of Patient*" name="name" id="name" />
                            </div>

                            <div class="col-lg-12 col-sm-12 col-md-12 col-xs-12">
                                <label for="age"><strong>Age</strong></label>
                                <input type="text" class="contact2-textbox" placeholder="Age*" name="age" id="age" />
                            </div>

                            <div class="col-lg-12 col-sm-12 col-md-12 col-xs-12">
                                <label for="disease"><strong>Disease</strong></label>
                                <input type="text" class="contact2-textbox" placeholder="Disease" name="disease" id="disease" />
                            </div>


                            <div class="col-lg-12 col-sm-12 col-md-12 col-xs-12">
                                <label for="address"><strong>Address</strong></label>
                                <input type="text" class="contact2-textbox" placeholder="Address*" name="address" id="address" />
                            </div>

                            <div class="col-lg-12 col-sm-12 col-md-12 col-xs-12">
                                <label for="email"><strong>Email</strong></label>
                                <input required type="email" class="contact2-textbox" placeholder="Email" name="email" id="email"/>
                            </div>

                            <div class="col-lg-12 col-sm-12 col-md-12 col-xs-12">
                                <label for="phone"><strong>Phone No.</strong></label>
                                <input type="number" class="contact2-textbox" placeholder="Phone Number" name="phone" id="phone" />
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="col-lg-12 col-sm-12 col-md-12 col-xs-12 input_fields_wrap">
                                <div>
                                    <div class="col-lg-4 col-sm-12 col-md-12 col-xs-12">
                                        <label for="medicine"><strong>Medicine</strong></label>
                                        <input type="text" autocomplete="off" placeholder="Medicine" class="contact2-textbox medicine" name="medicine[]" id="medicine" />
                                        <ul class="med_suggest">

                                        </ul>
                                    </div>
                                    <div class="col-lg-3 col-sm-12 col-md-12 col-xs-12">
                                        <label for="dose"><strong>Dose</strong></label>
                                        <input type="text" placeholder="Dose" class="contact2-textbox" name="dose[]" id="dose" />
                                    </div>
                                    <div class="col-lg-4 col-sm-12 col-md-12 col-xs-12">
                                        <label for="quantity"><strong>Quantity</strong></label>
                                        <input type="text" placeholder="quantity" class="contact2-textbox" name="quantity[]" id="quantity" />
                                    </div><br><br>
                                    <div class="col-lg-1 col-sm-12 col-md-12 col-xs-12 add_field_button">
                                        <strong><a href=""><i class="fa fa-plus"></i></a></strong>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-3">
                            <div class="col-lg-12 col-sm-12 col-md-12 col-xs-12">
                                <label for="prescribed_by"><strong>Doctor</strong></label>
                                <input autocomplete="off" type="text" id="prescribed_by" placeholder="Prescribed By" name="prescribed_by" class="contact2-textbox">
                                <ul id="pres_sug">

                                </ul>
                            </div>

                            <div class="col-lg-12 col-sm-12 col-md-12 col-xs-12">
                                <label for="prescribed_by"><strong>Hospital</strong></label>
                                <input autocomplete="off" type="text" id="hospital" placeholder="hospital" name="hospital" class="contact2-textbox">
                                <ul id="hosp_sug">

                                </ul>
                            </div>

                            <div class="col-lg-12 col-sm-12 col-md-12 col-xs-12">
                                <label for="prescription"><strong>Prescription</strong></label>
                                <input type="file" id="userfile" name="userfile" class="contact2-textbox">
                            </div>

                            <div class="col-lg-12 col-sm-12 col-md-12 col-xs-12">
                                <label for="order"></label><br /><br />
                                <input type="submit" class="btn btn-info col-md-12" id="order" name="order" value="Order Now" />
                            </div>
                        </div>
                    </form>

                </div>
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
                $(wrapper).append('<div><div class="col-lg-4 col-sm-12 col-md-12 col-xs-12"><input type="text" placeholder="Medicine" autocomplete="off" class="contact2-textbox medicine" name="medicine[]" id="medicine" /><ul class="med_suggest"></ul></div><div class="col-lg-3 col-sm-12 col-md-12 col-xs-12"><input type="text" placeholder="Dose" class="contact2-textbox" name="dose[]" id="dose"/></div><div class="col-lg-4 col-sm-12 col-md-12 col-xs-12"><input type="text" placeholder="quantity" class="contact2-textbox" name="quantity[]" id="quantity"/></div><br><br><br><div class="col-lg-1 col-sm-12 col-md-12 col-xs-12 remove_field"><a href=""><i class="fa fa-minus"></i></a></div></div>'); //add input box
                $('.medicine').keyup(medicine_suggest);
            }
        });
        $(wrapper).on("click", ".remove_field", function (e) { //user click on remove text
            e.preventDefault();
            $(this).parent('div').remove();
            x--;
        })
    });

    $('#prescribed_by').keyup(function() {
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
            url: 'front/suggest',
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
            url: 'front/suggest',
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

    var medicine_suggest = function(e){
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
            url: 'front/suggest',
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
                            that.val(val);
                            container.empty();
                            container.fadeOut('slow');
                        });
                    }
                }
        });
    };

    $('.medicine').keyup(medicine_suggest);

    $(document).click(function(e){
        if($(e.target).attr('id') != 'prescribed_by'){
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




