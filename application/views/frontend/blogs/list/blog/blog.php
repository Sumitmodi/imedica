<?php $page = strtolower($page); ?>
<?php //echo "<pre>";
//print_r($blogs);
//die;?>
<div class="about-intro-wrap pull-left">

    <div class="bread-crumb-wrap ibc-wrap-3">
        <div class="container">
            <!--Title / Beadcrumb-->
            <div class="inner-page-title-wrap col-xs-12 col-md-12 col-sm-12">
                <div class="bread-heading"><h1><?php echo strtoupper($page);?></h1></div>
                <div class="bread-crumb pull-right">
                    <ul>
                        <li><a href="<?php echo base_url();?>"><?php echo $this->lang->line('home');?></a></li>
                        <li><a href="<?php echo base_url($page);?>"><?php echo strtoupper($page);?></a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <style type="text/css">
        .post-item-wrap+.post-item-wrap {
            border-bottom: 1px solid #e6e6e6;
            margin-top: 0;
        }
    </style>
    <div class="container">
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12 pull-left">

                <div class="latest-post-wrap pull-left wow fadeInLeft" data-wow-delay="0.5s" data-wow-offset="100">
                    <div class="subtitle col-xs-12 no-pad col-sm-11 col-md-12 pull-left news-sub"><?php echo $this->lang->line('blogs_title');?></div>

                    <?php $coll_blogs = array_chunk($blogs,2,true);
                    if(is_array($coll_blogs) && !empty($coll_blogs)){
                    foreach($coll_blogs as $blogs){
                    if(is_array($blogs) && !empty($blogs)){
                    foreach($blogs as $b){?>
                        <div class="post-item-wrap col-sm-6 col-md-6 col-xs-12">
                            <a href="<?php echo base_url().$b['url'];?>"><img src="<?php echo base_url('uploads/blogs/'.$b['image']);?>" class="img-responsive post-author-img" alt="" />
                                <div class="post-content1  col-md-9 col-sm-9 col-xs-8">
                                    <div class="post-title pull-left"><a href="<?php echo base_url().$b['url'];?>"><?php echo $b['title'];?></a></div>
                                    <div class="post-meta-top pull-left">
                                        <ul>
                                            <li><i class="icon-calendar"></i><?php echo $b['date'];?></li>
                                            <li>By <?php echo $b['author_name'];?></li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="post-content2 pull-left">
                                    <p><?php echo substr($b['description'], 0, 150); ?><br />
                                        <span class="post-meta-bottom"><a href="<?php echo base_url().$b['url']; ?>" class="btn" role="button">Read More</a></span></p>
                                </div>

                        </div>
                    <?php } } ?>
                    <div class="clearfix"></div>
                    <?php } } ?>
                    <div class="pagination" style="float:right;"><ul><?php echo $paginglinks; ?></ul></div>
                </div>
            </div>
        </div>
    </div>
</div>
