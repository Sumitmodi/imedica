<style type="text/css">
    .work{
        font-size: 16px;
        font-weight: bold;
        color: #0e70b1;
    }
</style>


<div class="clearfix"></div>
<div class="container full-width-container">
    <div class="col-xs-12 col-sm-12 col-md-12 pull-left">
        <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
            <div class="carousel-inner">
                <div class="item active">
                    <img src="<?php echo base_url('assets/frontend/images/work.jpg'); ?>"/>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="about-intro-wrap pull-left">
    <div class="container">
        <div class="row">
            <div class="col-md-12 col-xs-12 col-sm-12 pull-left full-content wow fadeInLeft animated"
                 data-wow-delay="0.3s" data-wow-offset="130">
                <div class="full-content-title"><?php echo $this->lang->line('works_content1');?></div>
                <p><?php echo $this->lang->line('works_content2');?></p>
            </div>
            <div class="col-md-1"></div>
            <div>
<!--                <img class="" src="--><?php //echo base_url('assets/frontend/images/how_it_works.jpg'); ?><!--" style="max-width: 100%"/>-->
                <img class="" src="<?php echo base_url('assets/frontend/images/works.jpg'); ?>" style="max-width: 100%"/>
            </div>
            <div class="col-md-3"><center><span class="work"><?php echo $this->lang->line('works_content3');?></span></center></div>
            <div class="col-md-3"><center><span class="work"><?php echo $this->lang->line('works_content4');?></span></center></div>
            <div class="col-md-3"><center><span class="work"><?php echo $this->lang->line('works_content5');?></span></center></div>
            <div class="col-md-3"><center><span class="work"><?php echo $this->lang->line('works_content6');?></span></center></div>
        </div>

    </div>