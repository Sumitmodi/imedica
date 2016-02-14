<?php $page = strtolower($page); ?>
<div class="about-intro-wrap pull-left">

    <div class="bread-crumb-wrap ibc-wrap-4">
        <div class="container">
            <div class="inner-page-title-wrap col-xs-12 col-md-12 col-sm-12">
                <div class="bread-heading"><h1><?php echo strtoupper($page);?></h1></div>
                <div class="bread-crumb pull-right">
                    <ul>
                        <li><a href="<?php echo base_url();?>"><?php echo $this->lang->line('home');?></a></li>
                        <li><a href=""><?php echo strtoupper($page);?></a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>

    <div class="container">
        <div class="row">
            <div class="col-md-12 col-sm-12 col-lg-12 col-xs-12 faq-tabs-wrap wow fadeInUp animated" data-wow-delay="0.5s" data-wow-offset="200">

                <!-- tabs left -->
                <div class="tabbable tabs-left">
                    <ul class="nav nav-tabs col-md-4 col-sm-4 col-xs-5">

                        <?php foreach($faq as $k=>$f){
                        if($k==0){ echo "<li class='active'>"; }else{ echo "<li>"; } ?>
                            <a href="#<?php echo $f['id'];?>" data-toggle="tab"><span class="faq-ques"><?php echo $f['faq_question'];?></span><i class="right-arr"></i></a></li>
                        <?php } ?>
                    </ul>

                    <div class="tab-content col-md-8 col-sm-8 col-xs-7 pull-right">
                        <?php foreach($faq as $k=>$f){?>
                            <?php if($k==0){echo "<div class='tab-pane active'";}else{echo "<div class='tab-pane'";}?> id="<?php echo $f['id'];?>">
                            <div class="dept-title-tabs"><?php echo $f['faq_question'];?></div>
                            <p><?php echo $f['faq_answer'];?></p>
                        </div>
                        <?php } ?>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>