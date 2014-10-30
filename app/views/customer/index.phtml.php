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
<script src="js/customer.js"></script>

        <title>CMS | Customer | list</title>
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
                
<h1>Customers List</h1>
<table class="table table-bordered">
    <thead>
        <tr>
            <th>No</th>
            <th>WX Name</th>
            <th>WX Id</th>
            <th>Name</th>
            <th>Tel.1</th>
            <th>Tel.2</th>
            <th>Addr.1</th>
            <th>Addr.2</th>
            <th>Level</th>
            <th>Child</th>
            <th>Sex</th>
            <th>Birth</th>
            <th>Detail</th>
            <th>Actions</th>
        </tr>
    </thead>
    </tbody>
        <?php $v11240739611iterator = $items; $v11240739611incr = 0; $v11240739611loop = new stdClass(); $v11240739611loop->length = count($v11240739611iterator); $v11240739611loop->index = 1; $v11240739611loop->index0 = 1; $v11240739611loop->revindex = $v11240739611loop->length; $v11240739611loop->revindex0 = $v11240739611loop->length - 1; ?><?php foreach ($v11240739611iterator as $item) { ?><?php $v11240739611loop->first = ($v11240739611incr == 0); $v11240739611loop->index = $v11240739611incr + 1; $v11240739611loop->index0 = $v11240739611incr; $v11240739611loop->revindex = $v11240739611loop->length - $v11240739611incr; $v11240739611loop->revindex0 = $v11240739611loop->length - ($v11240739611incr + 1); $v11240739611loop->last = ($v11240739611incr == ($v11240739611loop->length - 1)); ?>
        <tr id="<?php echo $item->id; ?>">
            <td><?php echo $v11240739611loop->index; ?></td>
            <td><?php echo $item->wxname; ?></td>
            <td><?php echo $item->wxid; ?></td>
            <td><?php echo $item->name; ?></td>
            <td><?php echo $item->tel1; ?></td>
            <td><?php echo $item->tel2; ?></td>
            <td><?php echo $item->addr1; ?></td>
            <td><?php echo $item->addr2; ?></td>
            <td><?php echo $item->level; ?></td>
            <td><?php echo $item->child; ?></td>
            <td><?php echo $item->sex; ?></td>
            <td><?php echo $item->birth; ?></td>
            <td><?php echo $item->detail; ?></td>
            <td>
                <button id="delete" type="button" class="btn btn-default"><span class="glyphicon glyphicon-trash"></span></button>
                <button id="edit" type="button" class="btn btn-default"><span class="glyphicon glyphicon-pencil"></span></button>
            </td>
        </tr>
        <?php $v11240739611incr++; } ?>
    </tbody>
</table>

            </div>
        </div>
    </body>
    

</html>
