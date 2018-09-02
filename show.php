<!DOCTYPE html>
<html>
<head>
	<title>show - redis console</title>
    <link rel="stylesheet" type="text/css" href="assets/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="assets/css/show.css">
</head>
<body>
	<?php
        require 'config.php';
        $config=new Config();
        $client=$config->connect();
        if (is_string($client)) { ?>
            <div class="container jumbotron PartTwo">
                <span id="errorsPart" class="btn btn-outline-danger">errors</span>
                <div class="alert alert-danger" role="alert">
                  <?php echo $client ?>
                </div>
            </div>
        <?php }else if( ! isset($_GET['key'])){ ?>
            <div class="container jumbotron PartTwo">
                <span class="btn btn-outline-danger PartOne">errors</span>
                <a class="PartThree" href="../" class="btn btn-warning">Main page</a>
                <div class="alert alert-danger" role="alert">
                  please set key in header ! ! !
                </div>
            </div>
		<?php }else if(is_null($client->get($_GET['key']))){ ?>
			<div class="container jumbotron PartTwo">
                <span class="btn btn-outline-danger PartOne">errors</span>
                <a class="PartThree" href="../" class="btn btn-warning">Main page</a>
                <div class="alert alert-danger" role="alert">
                  No record with key <?php echo $_GET['key']; ?>
                </div>
            </div>
        <?php }else{ ?>
            <div class="container PartTwo">
            	<div class="card text-white bg-dark mb-3" >
				  <div class="card-header">
                    Key : <?php echo $_GET['key']; ?>
                    <a href="../" class="btn btn-warning PartThree">Main page</a>  
                    <a href="../delete.php?key=<?php echo $_GET['key']; ?>" class="btn btn-danger PartFour">Delete</a>
                    <a href="../editForm.php?key=<?php echo $_GET['key']; ?>" class="btn btn-light PartFour">Edit</a> 
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