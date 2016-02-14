
<div class="container">
    <div class="row">

        <div class="col-xs-12 col-sm-12 col-md-6 pull-left">

            <div class="latest-post-wrap pull-left wow fadeInLeft" data-wow-delay="0.5s" data-wow-offset="100">
                <div class="subtitle col-xs-12 no-pad col-sm-11 col-md-12 pull-left news-sub"><?php echo $this->lang->line('home_latest_news');?></div>
                <?php $count = count($news);
                $news_slice =array_slice($news,$count-2,2);
                foreach($news_slice as $n){?>
                    <div class="post-item-wrap pull-left col-sm-6 col-md-12 col-xs-12">
                        <a href="<?php echo base_url().$n['url'];?>"><img src="<?php echo $n['img'];?>" class="img-responsive post-author-img" alt="" />
                            <div class="post-content1 pull-left col-md-9 col-sm-9 col-xs-8">
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
                <?php } ?>
                <a href="<?php echo base_url().'news';?>" class="dept-details-butt posts-showall">Show All</a>
            </div>
        </div>


        <div class="col-xs-12 col-sm-12 col-md-6 pull-right department-wrap wow fadeInRight" data-wow-delay="0.5s" data-wow-offset="100">

            <div class="subtitle pull-left"><?php echo $this->lang->line('home_knowledgebase');?></div>

            <div id="imedica-dep-accordion">
                <!-- Accordion Item -->
                <h3><i class="fa fa-plus-square dept-icon"></i><span class="dep-txt">CIMS</span></h3>
                <div>
                    <div class="collapse-widget-content pull-left">
                        <div class="dept-title pull-left">Donec scelerisque</div>
                        <p>Lorem ipsum dolor sit amet, consecte tur adipiscing elitut eu nisl quis augue suscipit dignissim. Duis vulputate nisl sit amet feugiat tincidunt. vulputate nisl sit amet feugiat tincidunt. vulputate nisl sit amet feugiat tincidunt. vulputate nisl sit amet feugiat tincidunt.</p>
                    </div>
                </div>
                <!-- Accordion Item -->
                <h3><i class="fa fa-plus-square dept-icon"></i><span class="dep-txt">NIMS</span></h3>
                <div>
                    <div class="collapse-widget-content pull-left">
                        <div class="dept-title pull-left">Donec scelerisque</div>
                        <p>Lorem ipsum dolor sit amet, consecte tur adipiscing elitut eu nisl quis augue suscipit dignissim. Duis vulputate nisl sit amet feugiat tincidunt. vulputate nisl sit amet feugiat tincidunt. vulputate nisl sit amet feugiat tincidunt. vulputate nisl sit amet feugiat tincidunt.</p>
                    </div>
                </div>

                <!-- Accordion Item -->
                <h3><i class="icon-ambulance dept-icon"></i><span class="dep-txt">Pharmaceuticals</span></h3>
                <div>
                    <div class="collapse-widget-content pull-left">
                        <div class="dept-title pull-left">Donec scelerisque</div>
                        <p>Lorem ipsum dolor sit amet, consecte tur adipiscing elitut eu nisl quis augue suscipit dignissim. Duis vulputate nisl sit amet feugiat tincidunt. vulputate nisl sit amet feugiat tincidunt. vulputate nisl sit amet feugiat tincidunt. vulputate nisl sit amet feugiat tincidunt.</p>
                    </div>
                </div>

                <!-- Accordion Item -->
                <h3><i class="fa fa-h-square dept-icon"></i><span class="dep-txt">Hospitals</span></h3>
                <div>
                    <div class="collapse-widget-content pull-left">
                        <div class="dept-title pull-left">Donec scelerisque</div>
                        <p>Lorem ipsum dolor sit amet, consecte tur adipiscing elitut eu nisl quis augue suscipit dignissim. Duis vulputate nisl sit amet feugiat tincidunt. vulputate nisl sit amet feugiat tincidunt. vulputate nisl sit amet feugiat tincidunt. vulputate nisl sit amet feugiat tincidunt.</p>
                    </div>
                </div>

                <h3 class="last-child-ac ilast-child-acc"><i class="icon-stethoscope dept-icon"></i><span class="dep-txt">Doctors</span></h3>
                <div>
                    <div class="collapse-widget-content pull-left">
                        <div class="dept-title pull-left">Donec scelerisque</div>
                        <p>Lorem ipsum dolor sit amet, consecte tur adipiscing elitut eu nisl quis augue suscipit dignissim. Duis vulputate nisl sit amet feugiat tincidunt. vulputate nisl sit amet feugiat tincidunt. vulputate nisl sit amet feugiat tincidunt. vulputate nisl sit amet feugiat tincidunt.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

