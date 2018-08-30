<!DOCTYPE html>
<html>
<head>
	<title>redis console</title>
    <style type="text/css">
        body{ background-image: linear-gradient(to left,#FC5252,#F237FE) }
    </style>
    <link rel="stylesheet" type="text/css" href="assets/bootstrap.min.css">
</head>
<body>
	<?php
        require 'config.php';
        $config=new Config();
        $client=$config->connect();
        if (is_string($client)) { ?>
            <div class="container jumbotron" style="margin-top: 100px">
                <span style="height: 50px;width: 150px;font-size: 20px; margin-bottom:10px " class="btn btn-outline-danger">errors</span>
                <div class="alert alert-danger" role="alert">
                  <?php echo $client ?>
                </div>
            </div>
        <?php }else{ ?>
            <div class="container jumbotron" style="margin-top: 100px">
                <div class="alert alert-primary" role="alert" style="">
                        <?php echo $config->getHost().':'.$config->getPort() ?>
                        <div style="float: right;"><?php echo $client->dbsize()." Key" ?></div>
                </div>
                <div class="alert alert-dark" role="alert" style="text-align:center;">
                        keys
                </div>
            <?php
            foreach ($client->keys('*') as $key => $value) {  ?>
                <a href="show.php?key=<?php echo $value?>" style="text-decoration: none;">
                    <div class="alert alert-success" role="alert" style="text-align:center;">
                            <?php echo $value ?>
                    </div>
                </a>
        <?php } } ?>
        </div>
</body>
</html>