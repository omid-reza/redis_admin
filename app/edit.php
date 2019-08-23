<?php
use config\config;
use language\language; ?>
<!DOCTYPE html>
<html>
    <head>
    	<title><?php echo language::get_string('Edit Result'); ?></title>
        <link rel="stylesheet" type="text/css" href="assets/css/Edit.css">
        <link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css">
    </head>
    <body>
    	<?php
            $config = new config();
            if (!isset($_POST['server'])) {
                ?>
                <div class="container jumbotron">
                    <span class="btn btn-outline-danger">
                        <?php echo language::get_string('Errors'); ?>
                    </span>
                    <div class="alert alert-danger" role="alert">
                    <?php  echo language::get_string('Please set server_id in header !'); ?>
                </div>
                      
                </div>
            <?php } elseif (is_string($client = $config->connect($_POST['server']))) { ?>
                <div class="container jumbotron PartTwo">
                    <span class="btn btn-outline-danger PartOne">
                        <?php echo language::get_string('Errors'); ?>
                    </span>
                    <div class="alert alert-danger" role="alert">
                      <?php echo $client ?>
                    </div>
                </div>
            <?php } elseif (!isset($_POST['pervios_key'])) { ?>
                <div class="container jumbotron PartTwo">
                    <span class="btn btn-outline-danger PartOne">
                        <?php echo language::get_string('Errors'); ?>
                    </span>
                    <a href="../" class="btn btn-warning PartThree"><?php echo language::get_string('Back'); ?></a>
                    <div class="alert alert-danger" role="alert">
                      please set pervios_key in header ! ! !
                    </div>
                </div>
            <?php } elseif (!isset($_POST['value'])) { ?>
                <div class="container jumbotron PartTwo">
                    <span class="btn btn-outline-danger PartOne">
                        <?php echo language::get_string('Errors'); ?>
                    </span>
                    <a href="../" class="btn btn-warning PartThree"><?php echo language::get_string('Back'); ?></a>
                    <div class="alert alert-danger" role="alert">
                      please set value in header ! ! !
                    </div>
                </div>
           <?php } elseif (is_null($client->get($_POST['pervios_key']))) { ?>
    			<div class="container jumbotron PartTwo">
                    <span class="btn btn-outline-danger PartOne">
                        <?php echo language::get_string('Errors'); ?>
                    </span>
                    <a href="../" class="btn btn-warning PartThree"><?php echo language::get_string('Back'); ?></a>
                    <div class="alert alert-danger" role="alert">
                        <?php echo language::get_string('No record with key').' '.$_POST['pervios_key']; ?>
                    </div>
                </div>
            <?php
            } else {
                    if (!$_POST['pervios_key'] == $_POST['key'])
                        $client->renamenx($_POST['pervios_key'], $_POST['key']);
                    $client->set($_POST['key'], $_POST['value']); ?>
                    <div class="container PartTwo">
                        <div class="card bg-light mb-3" >
                          <div class="card-header">
                            <?php echo language::get_string('Updated'); ?>
                            <a href="../keys?server=<?php echo $_POST['server']; ?>" class="btn btn-warning PartThree">
                                <?php echo language::get_string('Main Page'); ?>
                            </a>
                            <a href="../show?key=<?php echo $_POST['key']?>&server=<?php echo $_POST['server']; ?>" class="btn btn-light PartFour">
                                <?php echo language::get_string('View Record'); ?>
                            </a>
                          </div>
                          <div class="card-body">
                            <h5 class="card-title">
                                <?php echo language::get_string('Record with key'); ?>
                                <span style="color: red"><?php echo $_POST['pervios_key']; ?></span> 
                                <?php echo language::get_string('Updated'); ?>
                            </h5>
                          </div>
                        </div>
        			</div>
            <?php } ?>
            </div>
    </body>
</html>