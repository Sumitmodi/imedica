<div class="col-md-3"></div>
<div class="row col-md-6">
    <div class="block" >
        <div class="block-title">
            <h2>Doctors Timing</h2>
        </div>

        <?php if(isset($message)){ ?>
            <div class="alert alert-success alert-dismissable">
                <?php
                echo $message;
                ?>
            </div>
            <?php
        }?>

        <?php if(validation_errors()){?>
            <div class="alert alert-danger alert-dismissable">
                <?php
                echo validation_errors();
                ?>
            </div>
        <?php }?>

        <form action="" method="post" class="form-horizontal form-bordered">
            <div class="form-group">
                <label class="col-md-3 control-label" for="doctor_id">Name</label>
                <div class="col-md-9">
                    <select id="doctor_id" name="doctor_id" class="form-control" size="1">
                        <?php $a=$this->admin_model->table_fetch_rows('doctors');
                        $doc=(array)($a);
                        foreach($doc as $d){ ?>
                            <option value="<?php echo $d->id;?>"><?php echo $d->name;?></option>
                        <?php }?>
                    </select>
                </div>
            </div>

                <div class="form-group">
                    <label class="col-md-3 control-label" for="hospital_id">Hospital Name</label>
                    <div class="col-md-9">
                        <select id="hospital_id" name="hospital_id" class="form-control" size="1">
                            <?php $a=$this->admin_model->table_fetch_rows('hospitals');
                            $hos=(array)($a);
                            foreach($hos as $h){ ?>
                                <option value="<?php echo $h->id;?>"><?php echo $h->hospital_name;?></option>
                            <?php }?>
                        </select>
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-md-3 control-label" for="start_time">Start Time</label>
                    <div class="col-md-9">
                        <div class="input-group bootstrap-timepicker">
                            <input required type="text" id="start_time" name="start_time" class="form-control input-timepicker">
                                <span class="input-group-btn">
                                    <a href="javascript:void(0)" class="btn btn-effect-ripple btn-primary"><i class="fa fa-clock-o"></i></a></span>
                        </div>
                    </div>
                </div>


                <div class="form-group">
                    <label class="col-md-3 control-label" for="end_time">End Time</label>
                    <div class="col-md-9">
                        <div class="input-group bootstrap-timepicker">
                            <input required type="text" id="end_time" name="end_time" class="form-control input-timepicker">
                                <span class="input-group-btn">
                                    <a href="javascript:void(0)" class="btn btn-effect-ripple btn-primary"><i class="fa fa-clock-o"></i></a></span>
                        </div>
                    </div>
                </div>


                <div class="form-group">
                    <label class="col-md-3 control-label" for="doctor_name">Day</label>
                    <div class="col-md-9">
                        <select id="day" name="day" class="form-control" size="1">
                            <?php $a=$this->admin_model->table_fetch_rows('day');
                            $day=(array)($a);
                            foreach($day as $d){ ?>
                                <option value="<?php echo $d->id;?>"><?php echo $d->day;?></option>
                            <?php }?>
                        </select>
                    </div>
                </div>

            <div class="form-group form-actions">
                <div class="col-md-9 col-md-offset-3">
                    <button type="submit" class="btn btn-effect-ripple btn-primary" name="submit"><i class="fa fa-check"></i> Submit</button>
                    <button type="reset" href="<?php echo base_url('admin/doctors_timing/add');?>" class="btn btn-effect-ripple btn-danger"><i class="fa fa-times"></i> Reset</button>
                </div>
            </div>
        </form>
    </div>
</div>

