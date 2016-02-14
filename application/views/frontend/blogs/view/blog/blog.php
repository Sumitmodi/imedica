
<div id="blog-full-width-post">

    <div class="about-intro-wrap pull-left">

        <div class="bread-crumb-wrap ibc-wrap-1">
            <div class="container">
                <!--Title / Beadcrumb-->
                <div class="inner-page-title-wrap col-xs-12 col-md-12 col-sm-12">
                    <div class="bread-heading"><h1><?php echo $blog['title'];?></h1></div>
                    <div class="bread-crumb pull-right">
                        <ul>
                            <li><a href="<?php echo base_url();?>"><?php echo $this->lang->line('home');?></a></li>
                            <li><a href="<?php echo base_url('blogs');?>"><?php echo ucfirst($page);?></a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>

        <div class="container">


            <div class="col-xs-12 col-sm-12 col-md-12 pull-left gallery-page-wrap no-pad">

                <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">

                    <!-- Wrapper for slides -->
                    <div class="carousel-inner">

                        <div class="item active">
                            <img src="<?php echo base_url('uploads/blogs/'.$blog['image']);?>" alt="">
                        </div>
                    </div>
                </div>

            </div>
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 no-pad">
                <div class="blog-box-title"><?php echo $blog['title'];?></div>
                <div class="post-meta">By
                    <span class="post-author ipost-author"><?php echo $blog['author_name'];?></span> |
                    <span class="post-date"><?php echo $blog['date'];?></span>
                </div>
                <p><?php echo $blog['description'];?></p>
            </div>

            <div class="col-lg-12 col-md-12  col-sm-12  col-xs-12 no-pad social-section">
                <div class="col-lg-6 col-md-6  col-sm-12  col-xs-12 no-pad social-section1 pull-left">
                    <p class="para-color"><?php echo $this->lang->line('share_story');?></p>
                </div>
                <div class="col-lg-6 col-md-6  col-sm-12  col-xs-12 no-pad social-section2 pull-right">
                    <div class="social-wrap-head col-md-12 no-pad ">
                        <ul>
                            <li><a href="http://www.facebook.com/sharer/sharer.php?u=<?php echo base_url(); ?>/blogs/<?php echo $blog_url; ?>&amp;t=<?php echo $blog['title'];?>" target="_blank" class="share-popup"><i class="icon-facebook head-social-icon" id="face-head"></i></a></li>
                            <li><a href="http://www.twitter.com/intent/tweet?url=<?php echo base_url(); ?>/blogs/<?php echo $blog_url; ?>&amp;via=imedica&amp;text=<?php echo $blog['title'];?>" target="_blank" class="share-popup"><i class="icon-social-twitter head-social-icon" id="tweet-head"></i></a></li>
                            <li><a href="http://plus.google.com/share?url=<?php echo base_url(); ?>/blogs/<?php echo $blog_url; ?>" target="_blank" class="share-popup"><i class="icon-google-plus head-social-icon" id="gplus-head" data-original-title="" title=""></i></a></li>
                        </ul>
                    </div>
                </div>
            </div>

            <div class="col-lg-12 col-md-12  col-sm-12  col-xs-12 no-pad post-authors">
                <h2><?php echo $this->lang->line('blogs_about_author');?> <?php echo $blog['author_name'];?></h2>
                <span class="post-author ipost-author"><?php echo $blog['post'];?></span>
                <div class="post-item-wrap pull-left col-sm-6 col-lg-1 col-md-1 col-xs-12">
                    <img src="<?php echo base_url('uploads/author/'.$blog['author_image']);?>" class="img-responsive post-author-img" alt="">
                </div>
                <div class=" col-lg-11 col-md-11 col-sm-12 col-xs-12 pull-right">
                    <p><?php echo $blog['author_desc'];?></p>
                </div>

            </div>

            <section class="comments-part">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <h2><?php echo count($comments) > 0? count($comments): ''; ?></h2>
                        </div>
                    </div>
                    <?php foreach($comments as $c) { ?>
                        <div class="row">
                            <div class="col-md-12 animated"  data-animation="fadeInUp" data-animation-delay="500">
                                <!-- Comment-Panel-->
                                <div class="comment">
                                    <?php
                                    $data = substr($c->comment_date, 0, 10);
                                    $date = explode("-",$data);
                                    $dateObj   = DateTime::createFromFormat('!m', $date[1]);
                                    $monthName = $dateObj->format('F');
                                    ?>
                                    <span><h3><?php echo $c->name; ?></h3><?php echo $monthName.'. '.$date[2].'. '. $date[0]; ?> </span>
                                    <!-- Guest's-Comment-->
                                    <p><?php echo $c->comment; ?> </p>
                                    <!-- Reply Link-->
                                </div>
                            </div>
                        </div>
                    <?php } ?>
                </div>
            </section>

            <div style="float: left;">
                <?php if (isset($prev) && !empty($prev)) { ?>
                    <a href="<?php echo base_url($prev['url']); ?>">
                        <i class="fa fa-angle-double-left"></i> Previous</a>
                        <br><a href="<?php echo base_url($prev['url']); ?>" style="float: left;"><?php echo $prev['name']; ?></a>
                <?php } ?>
            </div>

            <div style="float: right;">
                <?php if (isset($next) && !empty($next)) { ?>
                    <a href="<?php echo base_url($next['url']); ?>" style="float: right;">
                        Next <i class="fa fa-angle-double-right"></i></a>
                        <br><a href="<?php echo base_url($next['url']); ?>" style="float: right;"><?php echo $next['name']; ?></a>
                <?php } ?>
            </div>

            <div class="col-lg-12 col-md-12  col-sm-12  col-xs-12 no-pad contact-form-full">
                <?php if($this->session->flashdata('message')){?>
                    <div class="alert alert-success text-center">
                    <a href="#" class="close" data-dismiss="alert">×</a>
                    <i class="fa fa-flag flag-icon pull-left"></i> <?php echo $this->session->flashdata('message');?>
                    </div><?php } ?>

                <h2><?php echo $this->lang->line('blogs_leave_comment');?></h2>
                <form action="<?php echo base_url('comment');?>" class="contact2-page-form col-lg-12 col-sm-12 col-md-12 col-xs-12 no-pad contact-v1" id="blogcommentform" name="blogcommentform" method="post" novalidate="novalidate">

                    <input type="hidden" name="blog_id" id="blog_id" value="<?php echo $blog['id']; ?>" />
                    <input type="hidden" name="blog_url" id="blog_id" value="<?php echo $blog_url; ?>" />
                    <div class="col-lg-4 col-sm-12 col-md-4 col-xs-12 no-pad control-group">
                        <input type="text" class="contact2-textbox" placeholder="Name*" name="name" id="name">

                    </div>

                    <div class="col-lg-4 col-sm-12 col-md-4 col-xs-12 control-group">
                        <input type="email" class="contact2-textbox" placeholder="Email*" name="email" id="email">
                    </div>

<!--                    <div class="col-lg-4 col-sm-12 col-md-4 col-xs-12 no-pad control-group">-->
<!---->
<!--                        <input type="text" placeholder="Subject*" class="contact2-textbox" name="subject" id="subject">-->
<!--                    </div>-->

                    <div class="col-lg-12 col-sm-12 col-md-12 no-pad col-xs-12">
                        <textarea class="contact2-textarea" placeholder="Comment..." name="message" id="message"></textarea>
                    </div>

                    <div class="col-lg-12 col-sm-12 col-md-12 col-xs-12 pull-left no-pad">

                        <section class="color-7" id="btn-click">
                            <button id="submitButton" name="submitButton" class="btn2-st2 btn-7 btn-7b" data-loading-text="Loading..." type="submit">Post Comment</button>

                        </section></div>

                </form>
            </div>

        </div><!--end-container-->
    </div>
</div>