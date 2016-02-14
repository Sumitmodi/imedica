<div id="gallery-columns-carousel">
    <?php if($this->session->flashdata('message')){?>
        <div class="alert alert-danger text-center">
        <a href="#" class="close" data-dismiss="alert">�</a>
        <i class="fa fa-flag flag-icon pull-left"></i> <?php echo $this->session->flashdata('message');?>
        </div><?php } ?>
    <div class="about-intro-wrap pull-left">
        <div class="container">
            <div class="col-md-12 col-xs-12 col-sm-12 pull-left subtitle subtitle-style ibg-transparent">Pharmaceuticals</div>

            <div class="col-xs-12 col-sm-12 col-md-12 pull-left gallery-page-wrap no-pad">

                <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
                    <!-- Indicators -->
                    <ol class="carousel-indicators">
                        <li data-target="#carousel-example-generic" data-slide-to="0" class="active"><span class="paginate-gal"></span></li>
                        <li data-target="#carousel-example-generic" data-slide-to="1"><span class="paginate-gal"></span></li>
                        <li data-target="#carousel-example-generic" data-slide-to="2"><span class="paginate-gal"></span></li>
                    </ol>

                    <!-- Wrapper for slides -->
                    <div class="carousel-inner">

                        <div class="item active">
                            <?php $phar_slice = array_slice($pharmaceuticals,0,4);
                            foreach($phar_slice as $p){?>
                            <!--Doc intro-->
                            <div class="doctor-box col-md-3 col-sm-6 col-xs-12" data-wow-offset="200">

                                <div class="zoom-wrap">
                                    <a href="<?php echo base_url().$p['url'];?>"><img alt="" style="width:100%;" src="<?php echo base_url('uploads/pharmaceuticals/'.$p['logo']);?>" /></a>
                                </div>
                                <div class="doc-name">
                                    <div class="doc-name-class"><a href="<?php echo base_url().$p['url'];?>"><?php echo $p['name'];?></a></div><span class="doc-title"><?php echo $p['location'];?></span>

                                </div>
                            </div>
                            <?php }?>
                        </div>

                        <?php $count = count($pharmaceuticals);
                        for($i=4;$i<=$count;$i+=4){?>
                        <div class="item">
                            <?php $phar_slice1 = array_slice($pharmaceuticals,$i,4);
                            foreach($phar_slice1 as $ph){?>
                            <!--Doc intro-->
                            <div class="doctor-box col-md-3 col-sm-6 col-xs-12 " data-wow-delay="0.5s" data-wow-offset="200">

                                <div class="zoom-wrap">
                                    <a href="<?php echo base_url().$ph['url'];?>"><img alt="" width="200" height="200" src="<?php echo base_url('uploads/pharmaceuticals/'.$ph['logo']);?>" /></a>
                                </div>
                                <div class="doc-name">
                                    <div class="doc-name-class"><a href="<?php echo base_url().$ph['url'];?>"><?php echo $ph['name'];?></a></div><span class="doc-title"><?php echo $ph['location'];?></span>

                                </div>
                            </div>
                            <?php } ?>
                        </div>
                        <?php } ?>
                    </div>

                    <!-- Controls -->
                    <a class="left carousel-control" href="#carousel-example-generic" data-slide="prev">
                        <span class="left-pageinate">&lt;</span>
                    </a>
                    <a class="right carousel-control" href="#carousel-example-generic" data-slide="next">
                        <span class="right-pageinate">></span>
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>