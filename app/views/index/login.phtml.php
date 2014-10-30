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
        
<link rel="stylesheet" href="css/login.css">

        <title>CMS | Login</title>
    </head>
    <body>
        <div class="content-area container">
            <div class="root-header row">
                <div class="navbar col-xs-8">
                    <div class="row">
                    <?php foreach ($menu as $item) { ?>
                    <div class="col-xs-1 nav-item"><a href="<?php echo $item->href; ?>"><?php echo $item->name; ?></a></div>
                    <?php } ?>
                    </div>
                </div>
                <div class="profile col-xs-4">
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
                
<h1>Login</h1>
<div class="simple-container">
    <form action="/cms/index/login" method="post" role="form">
      <div class="form-group">
        <label for="username">Username</label>
        <input type="text" class="form-control" id="username" size="32" placeholder="Enter username">
      </div>
      <div class="form-group">
        <label for="password">Password</label>
        <input type="password" class="form-control" size="32" id="password" placeholder="Password">
      </div>
      <button type="submit" class="btn btn-default">Submit</button>
    </form>
</div>

            </div>
        </div>
    </body>
    

</html>
