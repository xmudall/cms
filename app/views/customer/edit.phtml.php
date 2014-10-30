<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, height=device-height, initial-scale=1, maximum-scale=1, user-scalable=no">
        <base href="<?php echo $baseUrl; ?>"></base>
        <link href="lib/bootstrap/css/bootstrap.min.css" rel="stylesheet">
        <link href="css/base.css" rel="stylesheet">
        <script src="lib/jquery/jquery.min.js"></script>
        <script src="lib/bootstrap/js/bootstrap.min.js"></script>
        <script src="js/base.js"></script>
        
<link rel="stylesheet" href="css/customer.css">

        <title>CMS | Customer | edit</title>
    </head>
    <body>
        <div class="content-area">
            <div class="root-header row">
                <div class="navbar col">
                    <?php foreach ($menu as $item) { ?>
                    <div class="col nav-item"><a href="<?php echo $item->href; ?>"><?php echo $item->name; ?></a></div>
                    <?php } ?>
                </div>
                <div class="profile col">
                    <?php if (empty($user)) { ?>
                    <a href="index/login">Log in</a>
                    <?php } else { ?>
                    <span><?php echo $user->username; ?>, welcom!</span>
                    <a href="index/logout">Log out</a>
                    <?php } ?>
                </div>
            </div>
            <div class="root-content row">
            <div class="alert alert-success alert-dismissible" role="alert" style="height: 50px; display: none;">
                <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                <span class="content"></span>
            </div>
            <div class="alert alert-danger alert-dismissible" role="alert" style="height: 50px; display: none;">
                <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                <span class="content"></span>
            </div>
                
<h1>Edit Customer</h1>
<?php $postUrl = 'customer/edit/' + $obj->id; ?>
<?php echo $this->tag->form(array($postUrl, 'method' => 'post')); ?>
<div class="row">
    <div class="col label">
        <label for="username">Username</label>
    </div>
    <div class="col input">
        <?php echo $this->tag->textField(array('username', 'size' => 32)); ?>
    </div>
</div>
<div class="row">
    <div class="col label">
        <label for="password">Password</label>
    </div>
    <div class="col input">
        <?php echo $this->tag->passwordField(array('password', 'size' => 32)); ?>
    </div>
</div>
<div class="row">
    <div class="col submit align-right">
    <?php echo $this->tag->submitButton(array('Login')); ?>
    </div>
</div>
</form>

            </div>
        </div>
    </body>
    

</html>
