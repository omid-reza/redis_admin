<?php
use config\config;
use language\language; ?>
<!DOCTYPE html>
<html>
    <head>
    	<title><?php echo language::get_string('Delete'); ?></title>
        <link rel="stylesheet" type="text/css" href="assets/css/delete.css">
        <link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css">
    </head>
    <body>
    	<?php
            $config = new config();
            if (!isset($_GET['server'])) {
                ?>
                <div class="container jumbotron">
                    <span class="btn btn-outline-danger">
                        <?php echo language::get_string('Errors'); ?>
                    </span>
                    <div class="alert alert-danger" role="alert">
                    Please set server_id in header !
                </div>
                      
                </div>
            <?php } elseif (is_string($client = $config->connect($_GET['server']))) { ?>
                <div class="container jumbotron PartOne">
                    <span class="btn btn-outline-danger PartTwo">
                        <?php echo language::get_string('Errors'); ?>
                    </span>
                    <div class="alert alert-danger" role="alert">
                      <?php echo $client ?>
                    </div>
                </div>

    		<?php } elseif (is_null($config->getValue($_GET['key']))) { ?>
    			<div class="container jumbotron PartOne">
                    <span class="PartTwo btn btn-outline-danger">
                        <?php echo language::get_string('Errors'); ?>
                    </span>
                    <a href="../" class="btn btn-warning PartThree">
                      <?php echo language::get_string('Back'); ?>
                    </a>
                    <div class="alert alert-danger" role="alert">
                      <?php echo language::get_string('No record with key').' : '.$_GET['key']; ?>
                    </div>
                </div>
            <?php } else {
                $client->del($_GET['key']); ?>
                <div class="container PartOne">
                    <div class="card bg-light mb-3" >
                      <div class="card-header">
                        <?php echo language::get_string('Deleted Successfully'); ?>
                        <a href="../keys?server=<?php echo $_GET['server']; ?>" class="btn btn-warning PartThree">
                            <?php echo language::get_string('Main Page'); ?>
                        </a>
                      </div>
                      <div class="card-body">
                        <h5 class="card-title">
                            <?php echo language::get_string('Record with key'); ?>
                            <span style="color: red"><?php echo $_GET['key']; ?></span>
                            <?php echo language::get_string('Deleted'); ?>
                        </h5>
                      </div>
                    </div>
    			</div>
            <?php } ?>
            </div>
            
    </body>
</html>