<?php
//$news_slice = array_slice($news,0,4);
//echo "<pre>";
//print_r($news);
//die;
?>
<style type="text/css">
    .post-item-wrap+.post-item-wrap {
        border-bottom: 1px solid #e6e6e6;
         margin-top: 0;
    }
</style>
<div class="container">
    <div class="row">
        <?php if($this->session->flashdata('message')){?>
            <div class="alert alert-danger text-center">
            <a href="#" class="close" data-dismiss="alert">�</a>
            <i class="fa fa-flag flag-icon pull-left"></i> <?php echo $this->session->flashdata('message');?>
            </div><?php } ?>
        <div class="col-xs-12 col-sm-12 col-md-12 pull-left">

            <div class="latest-post-wrap pull-left wow fadeInLeft" data-wow-delay="0.5s" data-wow-offset="100">
                <div class="subtitle col-xs-12 no-pad col-sm-11 col-md-12 pull-left news-sub"><?php echo $this->lang->line('home_latest_news');?></div>

                <?php $coll_news = array_chunk($news,2,true);
                if(is_array($coll_news) && !empty($coll_news)){
                foreach($coll_news as $news){
                    if(is_array($news) && !empty($news)){
                foreach($news as $n){
                    ?>
                <div class="post-item-wrap col-sm-6 col-md-6 col-xs-12">
                    <a href="<?php echo base_url().$n['url'];?>"><img src="<?php echo $n['img'];?>" class="img-responsive post-author-img" alt="" />
                    <div class="post-content1  col-md-9 col-sm-9 col-xs-8">
                        <div class="post-title pull-left"><a href="<?php echo base_url().$n['url'];?>"><?php echo $n['title'];?></a></div>
                        <div class="post-meta-top pull-left">
                            <ul>
                                <li><i class="icon-calendar"></i><?php echo date('Y-m-d',$n['date']);?></li>
                                    <li>Source : <?php echo $n['news_source'];?></li>
                            </ul>
                        </div>
                    </div>
                    <div class="post-content2 pull-left">
                        <p><?php echo substr($n['description'], 0, 150); ?><br />
                            <span class="post-meta-bottom"><a href="<?php echo base_url().$n['url'];?>">Continue Reading...</a></span></p>
                    </div>
                </div>
                <?php } }?>
                    <div class="clearfix"></div>
                <?php } }?>
                <div class="pagination" style="float:right;"><ul><?php echo $paginglinks; ?></ul></div>
            </div>
        </div>
    </div>
</div>