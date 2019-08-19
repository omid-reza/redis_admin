<?php
use config\config;
use language\language; ?>
<!DOCTYPE html>
<html>
    <head>
    	<title><?php echo language::get_string('Edit Result'); ?></title>
        <link rel="stylesheet" type="text/css" href="assets/css/edit.css">
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
                    <?php  echo language::get_string('Please set server_id in header !'); ?>
                </div>
                      
                </div>
            <?php } elseif (is_string($client = $config->connect($_GET['server']))) { ?>
                <div class="container jumbotron PartTwo">
                    <span class="btn btn-outline-danger PartOne">
                        <?php echo language::get_string('Errors'); ?>
                    </span>
                    <div class="alert alert-danger" role="alert">
                      <?php echo $client ?>
                    </div>
                </div>
            <?php } elseif (!isset($_GET['pervios_key'])) { ?>
                <div class="container jumbotron PartTwo">
                    <span class="btn btn-outline-danger PartOne">
                        <?php echo language::get_string('Errors'); ?>
                    </span>
                    <a href="../" class="btn btn-warning PartThree"><?php echo language::get_string('Back'); ?></a>
                    <div class="alert alert-danger" role="alert">
                      please set pervios_key in header ! ! !
                    </div>
                </div>
            <?php } elseif (!isset($_GET['value'])) { ?>
                <div class="container jumbotron PartTwo">
                    <span class="btn btn-outline-danger PartOne">
                        <?php echo language::get_string('Errors'); ?>
                    </span>
                    <a href="../" class="btn btn-warning PartThree"><?php echo language::get_string('Back'); ?></a>
                    <div class="alert alert-danger" role="alert">
                      please set value in header ! ! !
                    </div>
                </div>
           <?php } elseif (is_null($client->get($_GET['pervios_key']))) { ?>
    			<div class="container jumbotron PartTwo">
                    <span class="btn btn-outline-danger PartOne">
                        <?php echo language::get_string('Errors'); ?>
                    </span>
                    <a href="../" class="btn btn-warning PartThree"><?php echo language::get_string('Back'); ?></a>
                    <div class="alert alert-danger" role="alert">
                        <?php echo language::get_string('No record with key').' '.$_GET['pervios_key']; ?>
                    </div>
                </div>
            <?php
            } else {
                    if (!$_GET['pervios_key'] == $_GET['key'])
                        $client->renamenx($_GET['pervios_key'], $_GET['key']);
                    $client->set($_GET['key'], $_GET['value']); ?>
                    <div class="container PartTwo">
                        <div class="card bg-light mb-3" >
                          <div class="card-header">
                            <?php echo language::get_string('Updated'); ?>
                            <a href="../keys?server=<?php echo $_GET['server']; ?>" class="btn btn-warning PartThree">
                                <?php echo language::get_string('Main Page'); ?>
                            </a>
                            <a href="../show?key=<?php echo $_GET['key']?>&server=<?php echo $_GET['server']; ?>" class="btn btn-light PartFour">
                                <?php echo language::get_string('View Record'); ?>
                            </a>
                          </div>
                          <div class="card-body">
                            <h5 class="card-title">
                                <?php echo language::get_string('Record with key'); ?>
                                <span style="color: red"><?php echo $_GET['pervios_key']; ?></span> 
                                <?php echo language::get_string('Updated'); ?>
                            </h5>
                          </div>
                        </div>
        			</div>
            <?php } ?>
            </div>
    </body>
</html>