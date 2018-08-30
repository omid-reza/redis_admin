<!DOCTYPE html>
<html>
<head>
	<title>delete - redis console</title>
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

		<?php }else if(is_null($client->get($_GET['key']))){ ?>
			<div class="container jumbotron" style="margin-top: 100px">
                <span style="height: 50px;width: 150px;font-size: 20px; margin-bottom:10px " class="btn btn-outline-danger">errors</span>
                <a style="float: right;" href="../" class="btn btn-warning">Back</a>
                <div class="alert alert-danger" role="alert">
                  No record with key <?php echo $_GET['key']; ?>
                </div>
            </div>
        <?php }else{ ?>
            <?php
                $client->del($_GET['key']);
            ?>
            <div class="container" style="margin-top: 100px">
                <div class="card bg-light mb-3" >
                  <div class="card-header">
                    Deleted successfully
                  <a style="float: right;" href="../" class="btn btn-warning">Main Page</a>
                  </div>
                  <div class="card-body">
                    <h5 class="card-title">record with key <span style="color: red"><?php echo $_GET['key']; ?></span> Deleted</h5>
                  </div>
                </div>

            	
			</div>
        <?php } ?>
        </div>
        
</body>
</html>