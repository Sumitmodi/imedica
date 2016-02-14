<div class="row">
    <div class="col-sm-10 col-sm-offset-1 col-md-8 col-md-offset-2 col-lg-6 col-lg-offset-3">
        <!-- Validation Wizard Block -->
        <div class="block">
            <div class="block-title">
                <div class="block-options pull-right">
                    <a href="javascript:void(0)" class="btn btn-effect-ripple btn-default" data-toggle="tooltip"
                       title="Settings"><i class="fa fa-cog"></i></a>
                </div>
                <h2>Prescribed_medicine</h2>
            </div>

            <?php if (isset($message)) { ?>
                <div class="alert alert-success alert-dismissable">
                    <?php
                    echo $message;
                    ?>
                </div>
                <?php
            } ?>

            <?php if (validation_errors()) { ?>
                <div class="alert alert-danger alert-dismissable">
                    <?php
                    echo validation_errors();
                    ?>
                </div>
            <?php } ?>


            <form id="clickable-wizard" action="" method="post" class="form-horizontal form-bordered" enctype="multipart/form-data">
                <!-- First Step -->
                <div id="clickable-first" class="step">
                    <!-- Step Info -->
                    <div class="form-group">
                        <div class="col-xs-12">
                            <ul class="nav nav-pills nav-justified clickable-steps">
                                <li class="active"><a href="javascript:void(0)" data-gotostep="clickable-first"><i
                                            class="fa fa-user"></i> <strong>Patient</strong></a></li>
                                <li><a href="javascript:void(0)" data-gotostep="clickable-second"><i
                                            class="fa fa-pencil-square-o"></i> <strong>Medicine</strong></a></li>
                                <li><a href="javascript:void(0)" data-gotostep="clickable-third"><i
                                            class="fa fa-check"></i> <strong>Prescription</strong></a></li>
                            </ul>
                        </div>
                    </div>
                    <!-- END Step Info -->
                    <div class="form-group">
                        <label class="col-md-4 control-label" for="medicine">Patient <span class="text-danger">*</span></label>

                        <div class="col-md-6">
                            <div class="input-group">
                                <select id="patient" name="patient" class="form-control" size="1">
                                    <?php $a = $this->admin_model->table_fetch_rows('patient');
                                    $patient = (array)($a);
                                    foreach ($patient as $p) { ?>
                                        <option value="<?php echo $p->id; ?>"><?php echo $p->patient; ?></option>
                                    <?php } ?>
                                </select>
                                <span class="input-group-addon"><i class="fa fa-user"></i></span>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-4 control-label" for="disease">Disease <span
                                class="text-danger">*</span></label>

                        <div class="col-md-6">
                            <div class="input-group">
                                <input type="text" id="disease" name="disease" class="form-control"
                                       placeholder="Enter Disease" required>
                                <span class="input-group-addon"><i class="fa fa-bomb"></i></span>
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
                                        <del><strong>Patient</strong></del>
                                    </a></li>
                                <li class="active"><a href="javascript:void(0)" data-gotostep="clickable-second"><i
                                            class="fa fa-pencil-square-o"></i> <strong>Medicine</strong></a></li>
                                <li><a href="javascript:void(0)" data-gotostep="clickable-third"><i
                                            class="fa fa-check"></i> <strong>Prescription</strong></a></li>
                            </ul>
                        </div>
                    </div>
                    <!-- END Step Info -->
                    <div class="form-group input_fields_wrap">
                        <div>
                            <label class="col-md-4 control-label" for="medicine">Medicine <span
                                    class="text-danger">*</span></label>

                            <div class="col-md-6">
                                <div class="input-group">
                                    <input type="text" id="medicine" name="medicine[]" class="form-control"
                                           placeholder="Enter Medicine name here" required>
                                    <span class="input-group-addon"><i class="fa fa-medkit"></i></span>
                                </div>
                            </div>

                            <label class="col-md-4 control-label" for="dose">Dose <span
                                    class="text-danger">*</span></label>

                            <div class="col-md-6">
                                <div class="input-group">
                                    <input type="text" id="dose" name="dose[]" class="form-control"
                                           placeholder="Enter Dose" required>
                                    <span class="input-group-addon"><i class="gi gi-pot"></i></span>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-2 add_field_button"><strong><a href=""><i class="fa fa-plus"></i></a></strong></div>
                    </div>
                </div>
                <!-- END Second Step -->

                <!-- Third Step -->
                <div id="clickable-third" class="step">
                    <!-- Step Info -->
                    <div class="form-group">
                        <div class="col-xs-12">
                            <ul class="nav nav-pills nav-justified clickable-steps">
                                <li><a href="javascript:void(0)" class="text-muted" data-gotostep="clickable-first"><i
                                            class="fa fa-user"></i>
                                        <del><strong>Patient</strong></del>
                                    </a></li>
                                <li><a href="javascript:void(0)" class="text-muted" data-gotostep="clickable-second"><i
                                            class="fa fa-pencil-square-o"></i>
                                        <del><strong>Medicine</strong></del>
                                    </a></li>
                                <li class="active"><a href="javascript:void(0)" data-gotostep="clickable-third"><i
                                            class="fa fa-check"></i> <strong>Prescription</strong></a></li>
                            </ul>
                        </div>
                    </div>
                    <!-- END Step Info -->
                    <div class="form-group">
                        <label class="col-md-4 control-label" for="example-validation-suggestions">Doctor</label>
                        <div class="col-md-8">
                            <input type="text" id="prescribed_by" placeholder="prescribed_by" name="prescribed_by" class="form-control"/>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-4 control-label" for="example-validation-suggestions">Prescription</label>

                        <div class="col-md-8">
                            <input type="file" id="userfile" name="userfile" class="form-control"/>
                        </div>
                    </div>
                </div>
                <!-- END Third Step -->

                <!-- Form Buttons -->
                <div class="form-group form-actions">
                    <div class="col-md-8 col-md-offset-4">
                        <button type="reset" class="btn btn-effect-ripple btn-danger" id="back1">Back</button>
                        <button type="submit" class="btn btn-effect-ripple btn-primary" id="next1">Next</button>
                    </div>
                </div>
                <!-- END Form Buttons -->
            </form>
            <!-- END Clickable Wizard Content -->
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
</script>
