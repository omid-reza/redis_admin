<?php
use config\config;
use language\language;
?>
<!DOCTYPE html>
<html>
  <head>
  	<title><?php echo language::get_string('Search Resualt'); ?></title>
      <link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css">
      <link rel="stylesheet" type="text/css" href="assets/css/searchResualt.css">
  </head>
  <body>
  	<?php
          $config = new config();
          if (!isset($_POST['server'])) {
              ?>
              <div class="container jumbotron PartTwo">
                  <span class="btn btn-outline-danger PartOne">
                    <?php echo language::get_string('Errors'); ?>
                  </span>
                  <div class="alert alert-danger" role="alert">
                    Please set server_id in header !
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
          <?php } elseif (!isset($_POST['key'])) { ?>
              <div class="container jumbotron partOne">
                  <span class="btn btn-outline-danger partTwo">
                    <?php echo language::get_string('Errors'); ?>
                  </span>
                  <a href="../" class="btn btn-warning PartThree">Back</a>
                  <div class="alert alert-danger" role="alert">
                    please set key in header ! ! !
                  </div>
              </div>
          <?php } else { ?>
              <div class="container jumbotron partOne">
                  <div class="card bg-light mb-3" >
                    <div class="card-header">
                      <?php echo language::get_string('Resualt for').' : '.$_POST['key']?>
                    <a href="../keys?server=<?php echo $_POST['server']; ?>" class="btn btn-warning PartThree">
                      <?php echo language::get_string('Main Page'); ?>
                    </a>
                    </div>
                    <?php if (count($client->keys('*'.$_POST['key'].'*'), 1) == 0) { ?>
                        <div class="alert alert-warning partFive" role="alert">
                          <?php echo language::get_string('No match resualt !!'); ?>
                        </div>
                  <?php
                    } else {
                        foreach ($client->keys('*'.$_POST['key'].'*') as $key => $value) {
                            ?>
                              <a href="show?server=<?php echo $_POST['server'] ?>&key=<?php echo $value; ?>" class="partFour">
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