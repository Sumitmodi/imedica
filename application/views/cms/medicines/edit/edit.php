<div class="col-md-3"></div>
<div class="row col-md-6">
    <div class="block" >
        <div class="block-title">
            <h2>Edit Medicines</h2>
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
            <input type="hidden" name="medicines_id" id="medicines_id" value="<?php echo $query[0]->id;?> "/>
            <div class="form-group">
                <label class="col-md-3 control-label" for="medicine_name">Medicine Name</label>
                <div class="col-md-9">
                    <input required type="text" id="medicine_name" name="medicine_name" class="form-control" value="<?php echo $query[0]->medicine_name;?>">
                    <span class="help-block">Please enter medicine name</span>
                </div>
            </div>

            <div class="form-group">
                <label class="col-md-3 control-label" for="pharmaceutical_id">Pharmaceuticals</label>
                <div class="col-md-9">
                    <select id="pharmaceutical_id" name="pharmaceutical_id" class="form-control" size="1">
                        <?php $a=$this->admin_model->table_fetch_rows('pharmaceuticals');
                        $phar=(array)($a);
                        foreach($phar as $p){
                        if(($query[0]->pharmaceuticals) == ($p->id)){?>
                            <option value="<?php echo $p->id;?>" selected="selected"><?php echo $p->name;?></option>
                        <?php  }else {?>
                            <option value="<?php echo $p->id;?>"><?php echo $p->name;?></option>
                        <?php } }?>
                    </select>
                </div>
            </div>

            <div class="form-group">
                <label class="col-md-3 control-label" for="category">Category</label>
                <div class="col-md-9">
                    <select id="category" name="category" class="form-control" size="1">
                        <?php $a=$this->admin_model->table_fetch_rows('medicine_category');
                        $cat=(array)($a);
                        foreach($cat as $c){
                            if(($query[0]->category) == ($c->id)){?>
                                <option value="<?php echo $c->id;?>" selected="selected"><?php echo $c->category_name;?></option>
                            <?php  }else {?>
                                <option value="<?php echo $c->id;?>"><?php echo $c->category_name;?></option>
                            <?php } }?>
                    </select>
                </div>
            </div>

            <div class="form-group">
                <label class="col-md-3 control-label" for="composition">Composition</label>
                <div class="col-md-9">
                    <textarea required id="composition" name="composition" rows="3" class="form-control"><?php echo $query[0]->composition;?></textarea>
                    <span class="help-block">Please enter medicine composition</span>
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

