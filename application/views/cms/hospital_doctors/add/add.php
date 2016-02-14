<div class="col-md-3"></div>
<div class="row col-md-6">
    <div class="block" >
        <div class="block-title">
            <h2>Hospital Doctors</h2>
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
                <label class="col-md-3 control-label" for="hospital_id">Hospital</label>
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
                <label class="col-md-3 control-label" for="doctor_id">Doctor</label>
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

            <div class="form-group form-actions">
                <div class="col-md-9 col-md-offset-3">
                    <button type="submit" class="btn btn-effect-ripple btn-primary" name="submit"><i class="fa fa-check"></i> Submit</button>
                    <button type="reset" href="<?php echo base_url('admin/hospital_doctors/add');?>" class="btn btn-effect-ripple btn-danger"><i class="fa fa-times"></i> Reset</button>
                </div>
            </div>
        </form>
    </div>
</div>

