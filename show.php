<!DOCTYPE html>
<html>
<head>
	<title>show - redis console</title>
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
		<?php }else if(is_null($client->get($_GET['key']))){ ?>
			<div class="container jumbotron" style="margin-top: 100px">
                <span style="height: 50px;width: 150px;font-size: 20px; margin-bottom:10px " class="btn btn-outline-danger">errors</span>
                <a style="float: right;" href="../" class="btn btn-warning">Back</a>
                <div class="alert alert-danger" role="alert">
                  No record with key <?php echo $_GET['key']; ?>
                </div>
            </div>
        <?php }else{ ?>
            <div class="container" style="margin-top: 100px">
            	<div class="card text-white bg-dark mb-3" >
				  <div class="card-header">
                    Key : <?php echo $_GET['key']; ?>
                    <a style="float: right;" href="../" class="btn btn-warning">Back</a>  
                    <a style="float: right; margin-right: 3%" href="../delete.php?key=<?php echo $_GET['key']; ?>" class="btn btn-danger">Delete</a>
                    <a style="float: right; margin-right: 3%" href="../editForm.php?key=<?php echo $_GET['key']; ?>" class="btn btn-light">Edit</a> 
                  </div>
				  <div class="card-body">
				    <h5 class="card-title">Value : <?php echo $client->get($_GET['key']);?></h5>
				    <h5 class="card-text">Expired in : <?php echo $client->ttl($_GET['key']);?> second (-1 mean to time left . can be alive for ever)</h5>
				  </div>
				</div>
        <?php } ?>
        </div>
        
</body>
</html>