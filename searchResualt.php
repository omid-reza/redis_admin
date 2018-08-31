<!DOCTYPE html>
<html>
<head>
	<title>edit - redis console</title>
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
        <?php }else if( ! isset($_GET['key'])){ ?>
            <div class="container jumbotron" style="margin-top: 100px">
                <span style="height: 50px;width: 150px;font-size: 20px; margin-bottom:10px " class="btn btn-outline-danger">errors</span>
                <a style="float: right;" href="../" class="btn btn-warning">Back</a>
                <div class="alert alert-danger" role="alert">
                  please set key in header ! ! !
                </div>
            </div>
        <?php }else{ ?>
            <div class="container jumbotron" style="margin-top: 100px">
                <div class="card bg-light mb-3" >
                  <div class="card-header">
                    Resualt for : <?php echo $_GET['key']?>
                  <a style="float: right;" href="../" class="btn btn-warning">Main Page</a>
                  </div>
                  <?php
                  if (count($client->keys('*'.$_GET['key'].'*'), 1) == 0) { ?>
                    <a href="show.php?key=<?php echo $value?>" style="text-decoration: none;">
                        <div class="alert alert-warning" role="alert" style="text-align:center;">
                            No math resualt !!
                        </div>
                    </a>
                <?php }else{
                    foreach ($client->keys('*'.$_GET['key'].'*') as $key => $value) {  ?>
                            <a href="show.php?key=<?php echo $value?>" style="text-decoration: none;">
                                <div class="alert alert-secondary" role="alert" style="text-align:center;">
                                        <?php echo $value ?>
                                </div>
                            </a>
                    <?php } } ?>
                </div>
			</div>
        <?php } ?>
        </div>
</body>
</html>