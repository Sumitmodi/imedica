<script type="text/ng-template" id="knowledgebase.html">
    <div class="about-intro-wrap pull-left">
        <div class="container">
            <div class="row">
                <div class="no-pad icon-boxes-1">
                    <?php $names = array('CIMS', 'NIMS', 'Doctors', 'Hospitals');
                    $icons = array('fa fa-university icon-box-back2', 'fa fa-medkit icon-box-back2', 'icon-stethoscope icon-box-back2', 'icon-ambulance icon-box-back2');
                    foreach ($names as $key => $n) {
                        ?>
                        <!--Icon-box-start-->
                        <div class="col-sm-6 col-xs-12 col-md-3 col-lg-3">
                            <div class="icon-box-3 wow fadeInUp" data-wow-delay="0.6s" data-wow-offset="150">
                                <div class="icon-boxwrap2"><a href="javascript:void(0);"
                                                              ng-click="load('<?php echo $n; ?>')"><i
                                            class="<?php echo $icons[$key % count($icons)]; ?>"></i></a></div>
                                <div class="icon-box2-title"><a
                                        href="<?php echo base_url() . strtolower($n); ?>"
                                        ng-click="load('<?php echo $n; ?>')"><?php echo $n; ?></a></div>
                                <p>Lorem ipsum dolor sit amet, consecte tur adipiscing elit. Ut eu nisl quis augue
                                    suscipit
                                    dignissim.</p>

                                <div class="iconbox-readmore"><a href="<?php echo base_url() . strtolower($n); ?>"
                                                                 ng-click="load('<?php echo $n; ?>')">View</a>
                                </div>
                            </div>
                        </div>
                    <?php } ?>
                </div>
            </div>
        </div>
    </div>
</script>
<div id="tpl-content" ng-include src="pageTemplate"></div>