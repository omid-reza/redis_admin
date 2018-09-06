<!DOCTYPE html>
<html>
<head>
	<title>edit - redis console</title>
    <link rel="stylesheet" type="text/css" href="assets/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="assets/css/searchResualt.css">
</head>
<body>
	<?php
        require 'config.php';
        $config = new Config();
        $client = $config->connect();
        if (is_string($client)) { ?>
            <div class="container jumbotron partOne">
                <span class="btn btn-outline-danger partTwo">errors</span>
                <div class="alert alert-danger" role="alert">
                  <?php echo $client; ?>
                </div>
            </div>
        <?php }else if( ! isset($_GET['key'])){ ?>
            <div class="container jumbotron partOne">
                <span class="btn btn-outline-danger partTwo">errors</span>
                <a href="../" class="btn btn-warning PartThree">Back</a>
                <div class="alert alert-danger" role="alert">
                  please set key in header ! ! !
                </div>
            </div>
        <?php }else{ ?>
            <div class="container jumbotron partOne">
                <div class="card bg-light mb-3" >
                  <div class="card-header">
                    Resualt for : <?php echo $_GET['key']?>
                  <a href="../" class="btn btn-warning PartThree">Main Page</a>
                  </div>
                  <?php
                  if (count($client->keys('*'.$_GET['key'].'*'), 1) == 0) { ?>
                    <a href="show.php?key=<?php echo $value?>" class="partFour">
                        <div class="alert alert-warning partFive" role="alert">
                            No math resualt !!
                        </div>
                    </a>
                <?php }else{
                    foreach ($client->keys('*'.$_GET['key'].'*') as $key => $value) {  ?>
                            <a href="show.php?key=<?php echo $value; ?>" class="partFour">
                                <div class="alert alert-secondary partFive" role="alert">
                                        <?php echo $value; ?>
                                </div>
                            </a>
                    <?php } } ?>
                </div>
			</div>
        <?php } ?>
        </div>
</body>
</html>