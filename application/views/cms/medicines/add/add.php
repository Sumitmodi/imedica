<div class="col-md-3"></div>
<div class="row col-md-6">
    <div class="block" >
        <div class="block-title">
            <h2>Add Medicines</h2>
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
                <label class="col-md-3 control-label" for="member_name">Medicine Name</label>
                <div class="col-md-9">
                    <input type="text" id="medicine_name" name="medicine_name" class="form-control" placeholder="Enter medicine name"required>

                </div>
            </div>

            <div class="form-group">
                <label class="col-md-3 control-label" for="pharmaceutical_id">Pharmaceuticals</label>
                <div class="col-md-9">
                    <select id="pharmaceutical_id" name="pharmaceutical_id" class="form-control" size="1">
                        <?php $a=$this->admin_model->table_fetch_rows('pharmaceuticals');
                        $phar=(array)($a);
                        //print_r($cat);
                        foreach($phar as $p){ ?>
                            <option value="<?php echo $p->id;?>"><?php echo $p->name;?></option>
                        <?php }?>
                    </select>
                </div>
            </div>

            <div class="form-group">
                <label class="col-md-3 control-label" for="category">Category</label>
                <div class="col-md-9">
                    <select id="category" name="category" class="form-control" size="1">
                        <?php $a=$this->admin_model->table_fetch_rows('medicine_category');
                        $cat=(array)($a);
                        //print_r($cat);
                        foreach($cat as $c){ ?>
                            <option value="<?php echo $c->id;?>"><?php echo $c->category_name;?></option>
                        <?php }?>
                    </select>
                </div>
            </div>

            <div class="form-group">
                <label class="col-md-3 control-label" for="composition">Composition</label>
                <div class="col-md-9">
                    <textarea id="composition" name="composition" rows="3" class="form-control" placeholder="Enter medicine composition" ></textarea>
                </div>
            </div>

            <div class="form-group form-actions">
                <div class="col-md-9 col-md-offset-3">
                    <button type="submit" class="btn btn-effect-ripple btn-primary" name="submit"><i class="fa fa-check"></i> Submit</button>
                    <button type="reset" href="<?php echo base_url('admin/cims/add');?>" class="btn btn-effect-ripple btn-danger"><i class="fa fa-times"></i> Reset</button>
                </div>
            </div>
        </form>
    </div>
</div>

