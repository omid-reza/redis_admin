<!DOCTYPE html>
<html>
<head>
	<title>show - redis console</title>
    <link rel="stylesheet" type="text/css" href="assets/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="assets/css/show.css">
</head>
<body>
	<?php
        require 'vendor/autoload.php';
        use config\Config;

        $config = new Config();
        if (!isset($_GET['server'])) {
            ?>
            <div class="container jumbotron PartTwo">
                <span class="btn btn-outline-danger PartOne">Errors</span>
                <div class="alert alert-danger" role="alert">
                  Please set server_id in header !
                </div>
            </div>
        <?php
        } elseif (is_string($client = $config->connect($_GET['server']))) {
            ?>
            <div class="container jumbotron PartTwo">
                <span id="errorsPart" class="btn btn-outline-danger">errors</span>
                <div class="alert alert-danger" role="alert">
                  <?php echo $client ?>
                </div>
            </div>
        <?php
        } elseif (!isset($_GET['key'])) {
            ?>
            <div class="container jumbotron PartTwo">
                <span class="btn btn-outline-danger PartOne">errors</span>
                <a class="PartThree" href="../keys.php?server=<?php echo $_GET['server']; ?>" class="btn btn-warning">Main page</a>
                <div class="alert alert-danger" role="alert">
                  please set key in header ! ! !
                </div>
            </div>
		<?php
        } elseif (is_null($config->getValue($_GET['key']))) {
            ?>
			<div class="container jumbotron PartTwo">
                <span class="btn btn-outline-danger PartOne">errors</span>
                <a class="PartThree" href="../keys.php?server=<?php echo $_GET['server']; ?>" class="btn btn-warning">Main page</a>
                <div class="alert alert-danger" role="alert">
                  No record with key <?php echo $_GET['key']; ?>
                </div>
            </div>
        <?php
        } else {
            ?>
            <div class="container PartTwo">
            	<div class="card text-white bg-dark mb-3" >
				  <div class="card-header">
                    Type : <?php echo $client->type($_GET['key']); ?>
                    <a href="../keys.php?server=<?php echo $_GET['server']; ?>" class="btn btn-warning PartThree">Main page</a>  
                    <a href="../delete.php?key=<?php echo $_GET['key']; ?>&server=<?php echo $_GET['server']; ?>" class="btn btn-danger PartFour">Delete</a>
                    <a href="../editForm.php?key=<?php echo $_GET['key']; ?>&server=<?php echo $_GET['server']; ?>" class="btn btn-light PartFour">Edit</a> 
                  </div>
				  <div class="card-body">
                    <h5 class="card-title">Key : <?php echo $_GET['key']; ?></h5>
                    <br>
                    <h5 class="card-title">Value(s) :</h5>
                    <?php $counter = 0 ?>
                    <?php foreach ((array) $config->getValue($_GET['key']) as $k => $val) {
                $counter++; ?>
                        <h5 class="card-title container"><?php echo (string) ($counter).' ) '.$val; ?></h5>
                    <?php
            } ?>
                    <br>
                    <?php if ($client->ttl($_GET['key']) > -1) {
                ?>
				        <h5 class="card-text">Expired in : <?php echo $client->ttl($_GET['key']); ?> second (-1 mean to time left . can be alive for ever)</h5>
                    <?php
            } else {
                ?>
                        <h5 class="card-text">No expire time .</h5>
                    <?php
            } ?>
				  </div>
				</div>
        <?php
        } ?>
        </div>
        
</body>
</html>