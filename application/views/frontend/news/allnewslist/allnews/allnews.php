
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
                <div class="subtitle col-xs-12 no-pad col-sm-11 col-md-12 pull-left news-sub">All News</div>

                <?php foreach($news as $n){?>
                    <div class="post-item-wrap col-sm-6 col-md-6 col-xs-12">
                        <a href="<?php echo base_url().$n['url'];?>"><img src="<?php echo $n['img'];?>" class="img-responsive post-author-img" alt="" /></a>
                        <div class="post-content1  col-md-9 col-sm-9 col-xs-8">
                            <div class="post-title pull-left"><a href="<?php echo base_url().$n['url'];?>"><?php echo $n['Title'];?></a></div>
                            <div class="post-meta-top pull-left">
                                <ul>
                                    <li><i class="icon-calendar"></i><?php echo date('Y-m-d',$n['Date']);?></li>
                                    <li>Source : <?php echo $n['news_source'];?></li>
                                </ul>
                            </div>
                        </div>
                        <div class="post-content2 pull-left">
                            <p><?php echo substr($n['Description'], 0, 150); ?><br />
                                <span class="post-meta-bottom"><a href="<?php echo base_url().$n['url'];?>">Continue Reading...</a></span></p>
                        </div>
                    </div>
                <?php }?>
            </div>
        </div>
    </div>
</div>