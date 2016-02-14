<div class="col-md-3"></div>
<div class="row col-md-6">
    <div class="block" >
        <div class="block-title">
            <h2>NIMS</h2>
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
                <label class="col-md-3 control-label" for="medicine_name">Medicine Name</label>
                <div class="col-md-9">
                    <input type="text" id="medicine_name" name="medicine_name" class="form-control" placeholder="Enter medicine name"required>

                </div>
            </div>

            <div class="form-group">
                <label class="col-md-3 control-label" for="category">Category</label>
                <div class="col-md-9">
                    <select id="category" name="category" class="form-control" size="1">
                        <?php $a=$this->admin_model->table_fetch_rows('medicine_category');
                        $cat=(array)($a);
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

            <div class="form-group input_fields_wrap">
                <div class="col-md-12 control-label">
                    <div>
                        <label class="col-md-3 control-label" for="dose">Dose</label>
                        <div class="col-md-7">
                            <input type="text" id="dose" name="dose[]" class="form-control" placeholder="Enter dose" required>
                        </div>
                    </div>
                    <div class="col-md-2 add_field_button"><strong><a href=""><i class="fa fa-plus"></i></a></strong></div>
                </div>
            </div>

            <div class="form-group form-actions">
                <div class="col-md-9 col-md-offset-3">
                    <button type="submit" class="btn btn-effect-ripple btn-primary" name="submit"><i class="fa fa-check"></i> Submit</button>
                    <button type="reset" href="<?php echo base_url('admin/nims/add');?>" class="btn btn-effect-ripple btn-danger"><i class="fa fa-times"></i> Reset</button>
                </div>
            </div>
        </form>
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
                $(wrapper).append('<div><div class="col-md-3"></div><div class="col-md-7"><input type="text" id="dose" name="dose[]" class="form-control" placeholder="Enter Dose" ></div><div class="col-md-2 remove_field"><a href=""><i class="fa fa-minus"></i></a></div></div>'); //add input box
            }
        });

        $(wrapper).on("click", ".remove_field", function (e) { //user click on remove text
            e.preventDefault();
            $(this).parent('div').remove();
            x--;
        })
    });
</script>

