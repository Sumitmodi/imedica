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
            <input type="hidden" name="hosdoc_id" id="hosdoc_id" value="<?php echo $query[0]->id;?> "/>
            <div class="form-group">
                <label class="col-md-3 control-label" for="hospital_id">Hospital</label>
                <div class="col-md-9">
                    <select id="hospital_id" name="hospital_id" class="form-control" size="1">
                        <?php $a=$this->admin_model->table_fetch_rows('hospitals');
                        $hos=(array)($a);
                        foreach($hos as $h){
                        if(($query[0]->hospital_id) == ($h->id)){?>
                            <option value="<?php echo $h->id;?>" selected="selected"><?php echo $h->hospital_name;?></option>
                        <?php  }else {?>
                            <option value="<?php echo $h->id;?>"><?php echo $h->hospital_name;?></option>
                        <?php } } ?>
                    </select>
                </div>
            </div>

            <div class="form-group">
                <label class="col-md-3 control-label" for="doctor_id">Doctor</label>
                <div class="col-md-9">
                    <select id="doctor_id" name="doctor_id" class="form-control" size="1">
                        <?php $a=$this->admin_model->table_fetch_rows('doctors');
                        $doc=(array)($a);
                        foreach($doc as $d){
                            if(($query[0]->doctor_id) == ($d->id)){?>
                                <option value="<?php echo $d->id;?>" selected="selected"><?php echo $d->name;?></option>
                            <?php  }else {?>
                                <option value="<?php echo $d->id;?>"><?php echo $d->name;?></option>
                            <?php } } ?>
                    </select>
                </div>
            </div>

            <div class="form-group form-actions">
                <div class="col-md-9 col-md-offset-3">
                    <button type="submit" class="btn btn-effect-ripple btn-primary" name="submit"><i class="fa fa-check"></i> Submit</button>
                </div>
            </div>
        </form>
    </div>
</div>

