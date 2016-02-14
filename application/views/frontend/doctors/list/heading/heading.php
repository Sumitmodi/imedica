<div class="bread-crumb-wrap ibc-wrap-5">
    <div class="container">
        <!--Title / Beadcrumb-->
        <div class="inner-page-title-wrap col-xs-12 col-md-12 col-sm-12">
            <div class="bread-heading">
                <form name="category">
                    <select id="doc_cat" name="doc_cat" class="form-control" size="1" onChange="go()">
                        <option disabled selected>Filter by Category</option>
                        <?php
                        foreach($category as $cat){
                            $u = seoUrl($cat['category_name']);
                            if($cat_url==$u){?>
                            <option value="<?php echo base_url().$cat['url'];?>" selected="selected"><?php echo $cat['category_name']; ?></option>
                        <?php }else{ ?>
                                <option value="<?php echo base_url().$cat['url'];?>"><?php echo $cat['category_name']; ?></option>
                        <?php  } } ?>
                    </select>
                </form>
            </div>
            <div class="bread-crumb pull-right">
                <ul>
                    <li><a href="<?php echo base_url();?>"><?php echo $this->lang->line('home');?></a></li>
                    <li><a href=""><?php echo strtoupper($page);?></a></li>
                </ul>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript">
    function go(){
        location=
            document.category.doc_cat.
                options[document.category.doc_cat.selectedIndex].value
    }
</script>