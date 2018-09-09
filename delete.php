<!DOCTYPE html>
<html>
<head>
	<title>delete - redis console</title>
    <link rel="stylesheet" type="text/css" href="assets/css/delete.css">
    <link rel="stylesheet" type="text/css" href="assets/bootstrap.min.css">
</head>
<body>
	<?php
        require 'vendor/autoload.php';
        $config = new Config();
        $client=$config->connect();
        if (is_string($client)) { ?>
            <div class="container jumbotron PartOne">
                <span class="btn btn-outline-danger PartTwo">errors</span>
                <div class="alert alert-danger" role="alert">
                  <?php echo $client ?>
                </div>
            </div>

		<?php }else if(is_null($client->get($_GET['key']))){ ?>
			<div class="container jumbotron PartOne">
                <span class="PartTwo btn btn-outline-danger">errors</span>
                <a href="../" class="btn btn-warning PartThree">Back</a>
                <div class="alert alert-danger" role="alert">
                  No record with key <?php echo $_GET['key']; ?>
                </div>
            </div>
        <?php }else{ ?>
            <?php
                $client->del($_GET['key']);
            ?>
            <div class="container PartOne">
                <div class="card bg-light mb-3" >
                  <div class="card-header">
                    Deleted successfully
                  <a href="../" class="btn btn-warning PartThree">Main Page</a>
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