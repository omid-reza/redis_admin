<?php use language\language; ?>
<!DOCTYPE html>
<html>
    <head>
    	<title>show - redis admin</title>
        <link rel="stylesheet" type="text/css" href="assets/bootstrap.min.css">
        <link rel="stylesheet" type="text/css" href="assets/css/show.css">
    </head>
    <body>
    	<?php
            use config\config;
            $config = new config();
            if (!isset($_GET['server'])) {
                ?>
                <div class="container jumbotron PartTwo">
                    <span class="btn btn-outline-danger PartOne">Errors</span>
                    <div class="alert alert-danger" role="alert">
                      Please set server_id in header !
                    </div>
                </div>
            <?php } elseif (is_string($client = $config->connect($_GET['server']))) { ?>
                <div class="container jumbotron PartTwo">
                    <span id="errorsPart" class="btn btn-outline-danger">errors</span>
                    <div class="alert alert-danger" role="alert">
                      <?php echo $client ?>
                    </div>
                </div>
            <?php } elseif (!isset($_GET['key'])) { ?>
                <div class="container jumbotron PartTwo">
                    <span class="btn btn-outline-danger PartOne">errors</span>
                    <a class="PartThree" href="../keys?server=<?php echo $_GET['server']; ?>" class="btn btn-warning">
                        <?php echo language::get_string('Main page'); ?>        
                    </a>
                    <div class="alert alert-danger" role="alert">
                      please set key in header ! ! !
                    </div>
           <?php } elseif (is_null($config->getValue($_GET['key']))) { ?>
    			<div class="container jumbotron PartTwo">
                    <span class="btn btn-outline-danger PartOne">errors</span>
                    <a class="PartThree" href="../keys?server=<?php echo $_GET['server']; ?>" class="btn btn-warning">
                        <?php echo language::get_string('Main Page'); ?> 
                    </a>
                    <div class="alert alert-danger" role="alert">
                      <?php echo language::get_string('No record with key').$_GET['key']; ?>
                    </div>
                </div>
            <?php } else { ?>
                <div class="container PartTwo">
                	<div class="card text-white bg-dark mb-3" >
    				  <div class="card-header">
                        <?php echo language::get_string('Type').' : '.$client->type($_GET['key']); ?>
                        <a href="../keys?server=<?php echo $_GET['server']; ?>" class="btn btn-warning PartThree">
                            <?php echo language::get_string('Main Page'); ?>   
                        </a>  
                        <a href="../delete?key=<?php echo $_GET['key']; ?>&server=<?php echo $_GET['server']; ?>" class="btn btn-danger PartFour">
                            <?php echo language::get_string('Delete'); ?> 
                        </a>
                        <?php if ($client->type($_GET['key'])=='string'){ ?>
                            <a href="../editForm?key=<?php echo $_GET['key']; ?>&server=<?php echo $_GET['server']; ?>" class="btn btn-light PartFour">
                            <?php echo language::get_string('Edit'); ?>
                            </a>
                        <?php } ?>
                      </div>
    				  <div class="card-body">
                        <h5 class="card-title"><?php echo language::get_string('Key').' : '.$_GET['key']; ?></h5>
                        <br>
                        <h5 class="card-title"><?php echo language::get_string('Value(s)'); ?>  :</h5>
                        <?php $counter = 0 ?>
                        <?php foreach ((array) $config->getValue($_GET['key']) as $k => $val) {
                            $counter++; ?>
                            <h5 class="card-title container"><?php echo (string) ($counter).' ) '.$val; ?></h5>
                        <?php } ?>
                        <br>
                        <?php if ($client->ttl($_GET['key']) > -1) { ?>
                           <h5 class="card-text">
                            <?php echo language::get_string('Expire In').' : '.$client->ttl($_GET['key']).' '.language::get_string('Second') ?>
                           </h5>
                        <?php } else { ?>
                            <h5 class="card-text">
                                <?php echo language::get_string('No expire time .'); ?>
                            </h5>
                        <?php } ?>
    				  </div>
    				</div>
            <?php } ?>
            </div>
    </body>
</html>