<!--JS Inclution-->
<script type="text/javascript" src="<?php echo base_url('assets/frontend/js/jquery-ui-1.10.3.custom.min.js');?>"></script>
<script type="text/javascript" src="<?php echo base_url('assets/frontend/bootstrap-new/js/bootstrap.min.js');?>"></script>
<script type="text/javascript" src="<?php echo base_url('assets/frontend/rs-plugin/js/jquery.themepunch.tools.min.js');?>"></script>
<script type="text/javascript" src="<?php echo base_url('assets/frontend/rs-plugin/js/jquery.themepunch.revolution.min.js');?>"></script>
<script type="text/javascript" src="<?php echo base_url('assets/frontend/js/jquery.scrollUp.min.js');?>"></script>
<script type="text/javascript" src="<?php echo base_url('assets/frontend/js/jquery.sticky.min.js');?>"></script>
<script type="text/javascript" src="<?php echo base_url('assets/frontend/js/wow.min.js');?>"></script>
<script type="text/javascript" src="<?php echo base_url('assets/frontend/js/jquery.flexisel.min.js');?>"></script>
<script type="text/javascript" src="<?php echo base_url('assets/frontend/js/jquery.imedica.min.js');?>"></script>
<script type="text/javascript" src="<?php echo base_url('assets/frontend/js/custom-imedicajs.min.js');?>"></script>
<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/angularjs/1.4.5/angular.min.js"></script>
<script type="text/javascript" src="<?php echo base_url('assets/frontend/js/imedica.js');?>"></script>
<script src="http://maps.googleapis.com/maps/api/js?v=3.exp&amp;sensor=false"></script>

<script type="text/javascript">
    $("#search").trigger('click');
</script>

<script>(function(d, s, id) {
        var js, fjs = d.getElementsByTagName(s)[0];
        if (d.getElementById(id)) return;
        js = d.createElement(s); js.id = id;
        js.src = "//connect.facebook.net/en_US/sdk.js#xfbml=1&version=v2.5";
        fjs.parentNode.insertBefore(js, fjs);
    }(document, 'script', 'facebook-jssdk'));</script>

<script type='text/javascript'>
    $(window).load(function(){
        $('#loader-overlay').fadeOut(900);
        $("html").css("overflow","visible");
    });
        $( "#imedica-dep-accordion" ).accordion({ collapsible: true, active: false });
</script>

<?php if($page=='contact-us'){?>
<script type="text/javascript">

    $("#map-canvas").gMap({

        styles:[{stylers:[
            {
                featureType: 'water', // set the water color
                elementType: 'geometry.fill', // apply the color only to the fill
                stylers: [
                    { color: '#adc9b8' }
                ]
            },{
                featureType: 'landscape.natural', // set the natural landscape
                elementType: 'all',
                stylers: [
                    { hue: '#809f80' },
                    { lightness: -35 }
                ]
            }
            ,{
                featureType: 'poi', // set the point of interest
                elementType: 'geometry',
                stylers: [
                    { hue: '#f9e0b7' },
                    { lightness: 30 }
                ]
            },{
                featureType: 'road', // set the road
                elementType: 'geometry',
                stylers: [
                    { hue: '#d5c18c' },
                    { lightness: 14 }
                ]
            },{
                featureType: 'road.local', // set the local road
                elementType: 'all',
                stylers: [
                    { hue: '#ffd7a6' },
                    { saturation: 100 },
                    { lightness: -12 }
                ]
            }
        ]}],
        controls: false,
        scrollwheel: false,
        maptype: 'ROADMAP',
        markers: [
            {
                latitude: 40.753317,
                longitude: -73.968905,
                icon: {
                    image: "<?php echo base_url('assets/frontend/images/location.png');?>",
                    iconsize: [85, 121],
                    iconanchor: [85, 121]
                }
            },

        ],
        icon: {
            image: "<?php echo base_url('assets/frontend/images/location.png');?>",
            iconsize: [85, 121],
            iconanchor: [85, 121]
        },
        latitude: 40.753317,
        longitude: -73.968905,

        zoom: 12,
        mapTypeId: 'Styled'


    });

</script>
<?php } ?>