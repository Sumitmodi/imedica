
<div class="about-intro-wrap pull-left">
    <div class="bread-crumb-wrap ibc-wrap-5">
        <div class="container">
            <!--Title / Beadcrumb-->
            <div class="inner-page-title-wrap col-xs-12 col-md-12 col-sm-12">
                <div class="bread-heading"><h1><?php echo $n['title']; ?></h1></div>
                <div class="bread-crumb pull-right">
                    <ul>
                        <li><a href="<?php echo base_url(); ?>"><?php echo $this->lang->line('home'); ?></a></li>
                        <li><a href="<?php echo base_url('news'); ?>"><?php echo ucfirst($page); ?></a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>

    <div class="container">

        <div class="row">
            <div class="fade tab-pane active in">
                <div class="dept-title-tabs"><?php echo $n['title']; ?></div>
                <img alt="" class="img-responsive" src="<?php echo $n['img']; ?>"/>

                <div class="post-meta-top">
                    <ul>
                        <li><i class="icon-calendar"></i><?php echo date('Y-m-d', $n['date']); ?></li>
                        <li>Source : <?php echo $n['news_source']; ?></li>
                    </ul>
                </div>
                <br><br>

                <p><?php echo $n['description']; ?></p>
            </div>
        </div>

       <div id="blog-full-width-post">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 no-pad social-section">
            <div class="col-lg-6 col-md-6  col-sm-12  col-xs-12 no-pad social-section1 pull-left">
                <p class="para-color"><?php echo $this->lang->line('share_story');?></p>
            </div>
            <div class="col-lg-6 col-md-6  col-sm-12  col-xs-12 no-pad social-section2 pull-right">
                <div class="social-wrap-head col-md-12 no-pad ">
                    <ul>
                        <li><a href="http://www.facebook.com/sharer/sharer.php?u=<?php echo base_url(); ?>/news/<?php echo $news_url; ?>&amp;t=<?php echo $n['title'];?>" target="_blank" class="share-popup"><i class="icon-facebook head-social-icon" id="face-head"></i></a></li>
                        <li><a href="http://www.twitter.com/intent/tweet?url=<?php echo base_url(); ?>/news/<?php echo $news_url; ?>&amp;via=imedica&amp;text=<?php echo $n['title'];?>" target="_blank" class="share-popup"><i class="icon-social-twitter head-social-icon" id="tweet-head"></i></a></li>
                        <li><a href="http://plus.google.com/share?url=<?php echo base_url(); ?>/news/<?php echo $news_url; ?>" target="_blank" class="share-popup"><i class="icon-google-plus head-social-icon" id="gplus-head" data-original-title="" title=""></i></a></li>
                    </ul>
                </div>
            </div>
        </div>
       </div>
        <div class="clearfix"></div><br>

        <div style="float: left;">
            <?php if (isset($prev) && !empty($prev)) { ?>
                <a href="<?php echo base_url($prev['url']); ?>" class="prev-post">
                   <i class="fa fa-angle-double-left"></i> Previous</a>
                    <br><a href="<?php echo base_url($prev['url']); ?>" class="prev-post" style="float: left;"><?php echo $prev['name']; ?></a>
            <?php } ?>
        </div>

        <div style="float: right;">
            <?php if (isset($next) && !empty($next)) { ?>
                <a href="<?php echo base_url($next['url']); ?>" class="next-post" style="float: right;">
                    Next <i class="fa fa-angle-double-right"></i></a>
                    <br><a href="<?php echo base_url($next['url']); ?>" class="next-post" style="float: right;"><?php echo $next['name']; ?></a>
            <?php } ?>
        </div>

</div>

