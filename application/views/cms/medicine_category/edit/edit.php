<div class="row col-md-6">

    <div class="block" >
        <!-- Horizontal Form Title -->
        <div class="block-title">
            <h2>Edit Medicine Category</h2>
        </div>

        <?php if(isset($message)){ ?>
            <div class="alert alert-success alert-dismissable">
                <?php
                echo $message;
                ?>
            </div>
            <?php
        }?>

        <form action="" method="post" class="form-horizontal form-bordered">
            <input type="hidden" name="category_id" id="category_id" value="<?php echo $query[0]->id;?> "/>
            <div class="form-group">
                <label class="col-md-3 control-label" for="category_name">Category Name</label>
                <div class="col-md-9">
                    <input type="text" id="category_name" name="category_name" class="form-control" value="<?php echo $query[0]->category_name;?>" required>
                    <span class="help-block">Please enter medicine category</span>
                </div>
            </div>

            <div class="form-group form-actions">
                <div class="col-md-9 col-md-offset-3">
                    <button type="submit" class="btn btn-effect-ripple btn-primary" name="submit">Submit</button>
                </div>
            </div>
        </form>
    </div>
</div>
