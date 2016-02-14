<div class="block full">
    <div class="block-title">
        <h2>Networking Site Details</h2>
    </div>

    <?php if(isset($message)){ ?>
        <div class="alert alert-success alert-dismissable">
            <?php
            echo $message;
            ?>
        </div>
        <?php
    }?>

    <div class="table-responsive">
        <table id="example-datatable" class="table table-bordered table-vcenter">
            <thead>
            <tr>
                <th class="text-center" style="width: 100px;">Serial No</th>
                <th>Email</th>
                <th>Address</th>
                <th>Phone No</th>
                <th><i class="fa fa-facebook-square"> Facebook</th>
                <!--<th>Twitter</th>
                <th>Youtube</th>
                <th>Google+</th> -->
                <th class="text-center" style="width: 135px;"><i class="fa fa-flash"></i></th>
            </tr>
            </thead>
            <tbody>

            <?php
            foreach ($query as $k=>$row)
            {?>
                <div class="sortable">
                    <tr>
                        <td class="text-center"><?php echo $k+1;?></td>
                        <td><?php echo $row->email;?></td>
                        <td><?php echo $row->address;?></td>
                        <td><?php echo $row->phone;?></td>
                        <td><?php echo $row->facebook_link;?></td>
                        <!--<td><?php //echo $row->twitter_link;?></td>
                        <td><?php //echo $row->youtube_link;?></td>
                        <td><?php //echo $row->google_link;?></td> -->

                        <td class="text-center">
                            <a href="#modal-fade" title="view_site" class="btn btn-effect-ripple btn-xs btn-info view-modal" data-toggle="modal" data-id="<?php echo $row->id;?>" data-email="<?php echo $row->email;?>" data-address="<?php echo $row->address;?>" data-opening-day="<?php echo $row->opening_day;?>" data-opening-hour="<?php echo $row->opening_hour;?>" data-header="<?php echo $row->homepage_header;?>" data-footer="<?php echo $row->footer;?>" data-phone="<?php echo $row->phone;?>" data-facebook_link="<?php echo $row->facebook_link;?>" data-twitter_link="<?php echo $row->twitter_link;?>" data-youtube_link="<?php echo $row->youtube_link;?>" data-google_link="<?php echo $row->google_link;?>">
                                <i class="fa fa-eye"></i>
                            </a>
                            <a href="<?php echo base_url('admin/site/edit/'.$row->id);?>" data-toggle="tooltip" title="edit_site" class="btn btn-effect-ripple btn-xs btn-success"><i class="fa fa-pencil"></i></a>

                            <a href="#" data-href="<?php echo base_url('admin/site/delete/'.$row->id);?>" data-toggle="modal"  title="delete_site" data-target="#confirm-delete" class="btn btn-effect-ripple btn-xs btn-danger del-row"><i class="fa fa-times"></i>
                            </a>

                        </td>
                    </tr>
                </div>
            <?php } ?>
            </tbody>
        </table>
    </div>
</div>

<div id="modal-fade" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h3 class="modal-title"><strong>Update Details</strong></h3>
            </div>
            <div class="modal-body">
                <div class="box span3">
                    <div class="box-content">
                        <table class="table table-bordered">
                            <tbody>
                            <tr>
                                <td>ID</td>
                                <td id="id"></td>
                            </tr>
                            <tr>
                                <td>Email</td>
                                <td id="email"></td>
                            </tr>
                            <tr>
                                <td>Address</td>
                                <td id="address"></td>
                            </tr>
                            <tr>
                                <td>Phone no</td>
                                <td id="phone"></td>
                            </tr>
                            <tr>
                                <td>Opening Day</td>
                                <td id="opening_day"></td>
                            </tr>
                            <tr>
                                <td>Opening Hour</td>
                                <td id="opening_hour"></td>
                            </tr>
                            <tr>
                                <td>Facebook</td>
                                <td id="fb_link"></td>
                            </tr>
                            <tr>
                                <td>Twitter</td>
                                <td id="twitter_link"></td>
                            </tr>
                            <tr>
                                <td>Youtube</td>
                                <td id="youtube_link"></td>
                            </tr>
                            <tr>
                                <td>Google +</td>
                                <td id="google_link"></td>
                            </tr>
                            <tr>
                                <td>Homepage Header</td>
                                <td id="header"></td>
                            </tr>
                            <tr>
                                <td>Footer</td>
                                <td id="footer"></td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-effect-ripple btn-danger" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>


<div id="confirm-delete" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title"><span id="del_name"></span></h4>
            </div>
            <div class="modal-body">
                Are you sure you want to delete this record?
            </div>
            <div class="modal-footer">

                <a class="btn btn-effect-ripple btn-danger">Delete</a>
                <button type="button" data-dismiss="modal"class="btn btn-effect-ripple btn-default" data-dismiss="modal">Cancel</button>

            </div>
        </div>
    </div>
</div>

<script type="text/javascript">
    $(function(){
        $('a.view-modal').click(function(e){
            var id = $(this).attr('data-id');
            var email = $(this).attr('data-email');
            var address = $(this).attr('data-address');
            var phone = $(this).attr('data-phone');
            var opening_day = $(this).attr('data-opening-day');
            var opening_hour = $(this).attr('data-opening-hour');
            var fb_link = $(this).attr('data-facebook_link');
            var twitter_link = $(this).attr('data-twitter_link');
            var youtube_link = $(this).attr('data-youtube_link');
            var google_link = $(this).attr('data-google_link');
            var header = $(this).attr('data-header');
            var footer = $(this).attr('data-footer');
            $('td#id').html(id);
            $('td#email').html(email);
            $('td#address').html(address);
            $('td#phone').html(phone);
            $('td#opening_day').html(opening_day);
            $('td#opening_hour').html(opening_hour);
            $('td#fb_link').html(fb_link);
            $('td#twitter_link').html(twitter_link);
            $('td#youtube_link').html(youtube_link);
            $('td#google_link').html(google_link);
            $('td#header').html(header);
            $('td#footer').html(footer);
        })
    });

    $(function(){
        $('a.del-row').click(function(e) {
            var name = $(this).attr('data-name');
            $('span#del_name').html(name);
        });
    });

    $('#confirm-delete').on('show.bs.modal', function(e) {
        $(this).find('.btn-danger').attr('href', $(e.relatedTarget).data('href'));
    });

</script>

<script src="<?php echo base_url('public/js/pages/uiTables.js');?>"></script>
<script>$(function(){ UiTables.init(); });</script>

