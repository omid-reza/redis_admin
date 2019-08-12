<?php
use config\config;
?>
<!DOCTYPE html>
<html>
  <head>
  	<title>edit - redis admin</title>
      <link rel="stylesheet" type="text/css" href="assets/bootstrap.min.css">
      <link rel="stylesheet" type="text/css" href="assets/css/searchResualt.css">
  </head>
  <body>
  	<?php
          $config = new config();
          if (!isset($_POST['server'])) {
              ?>
              <div class="container jumbotron PartTwo">
                  <span class="btn btn-outline-danger PartOne">Errors</span>
                  <div class="alert alert-danger" role="alert">
                    Please set server_id in header !
                  </div>
              </div>
          <?php } elseif (is_string($client = $config->connect($_POST['server']))) { ?>
              <div class="container jumbotron PartTwo">
                  <span class="btn btn-outline-danger PartOne">Errors</span>
                  <div class="alert alert-danger" role="alert">
                    <?php echo $client ?>
                  </div>
              </div>
          <?php } elseif (!isset($_POST['key'])) { ?>
              <div class="container jumbotron partOne">
                  <span class="btn btn-outline-danger partTwo">errors</span>
                  <a href="../" class="btn btn-warning PartThree">Back</a>
                  <div class="alert alert-danger" role="alert">
                    please set key in header ! ! !
                  </div>
              </div>
          <?php } else { ?>
              <div class="container jumbotron partOne">
                  <div class="card bg-light mb-3" >
                    <div class="card-header">
                      Resualt for : <?php echo $_POST['key']?>
                    <a href="../keys?server=<?php echo $_POST['server']; ?>" class="btn btn-warning PartThree">Main Page</a>
                    </div>
                    <?php if (count($client->keys('*'.$_POST['key'].'*'), 1) == 0) { ?>
                      <a href="show?key=<?php echo $value?>" class="partFour">
                          <div class="alert alert-warning partFive" role="alert">
                              No match resualt !!
                          </div>
                      </a>
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