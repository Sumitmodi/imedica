<html>
<head>
    <title>Login With Facebook</title>
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/css/fb.css">
    <link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="//netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.min.css">
    <link href='http://fonts.googleapis.com/css?family=Source+Sans+Pro|Open+Sans+Condensed:300|Raleway' rel='stylesheet' type='text/css'>
</head>
<body>
<div id="main">
    <div id="login">
        <?php if (@$user_profile):  ?>
            <div class="row">
                <div class="col-lg-12 text-center">
                    <img class="img-thumbnail" data-src="holder.js/140x140" alt="140x140" src="https://graph.facebook.com/<?=$user_profile['id']?>/picture?type=large" style="width: 140px; height: 140px;">
                    <h2><?=$user_profile['name']?></h2>
                    Facebook Link: https://facebook.com/<?=$user_profile['id']?>
                    <a href="https://facebook.com/"<?=$user_profile['id']?> class="btn btn-default" >View Profile</a>
                    <a href="<?= $logout_url ?>" class="btn btn-primary" >Logout</a>
                </div>
            </div>
        <?php else: ?>
        <h2>Login With Facebook </h2>
        <a href="<?= $login_url ?>"><img class='fb' src="<?php echo base_url("assets/img/fb.png");?>"/></a>
        <?php endif; ?>
    </div>
</div>
</body>
</html>

<script type="text/javascript" src="//netdna.bootstrapcdn.com/bootstrap/3.1.1/js/bootstrap.min.js"></script>
