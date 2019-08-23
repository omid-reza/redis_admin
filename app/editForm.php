<?php  use language\language; ?>
<!DOCTYPE html>
<html>
    <head>
        <title><?php echo language::get_string('Edit'); ?></title>
        <link rel="stylesheet" type="text/css" href="assets/css/EditForm.css">
        <link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css">
    </head>
    <body>
        <?php
            use config\config;
            $config = new config();
            if (!isset($_GET['server'])) { ?>
                <div class="container jumbotron">
                  <span class="btn btn-outline-danger">
                    <?php echo language::get_string('Errors'); ?>
                  </span>
                  <div class="alert alert-danger" role="alert">
                    <?php  echo language::get_string('Please set server_id in header !'); ?>
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
            <?php } elseif (!isset($_GET['key'])) { ?>
                <div class="container jumbotron PartOne">
                    <span class="btn btn-outline-danger PartTwo">
                      <?php echo language::get_string('Errors'); ?>
                    </span>
                    <a href="../" class="btn btn-warning PartThree"><?php echo language::get_string('Back'); ?></a>
                    <div class="alert alert-danger" role="alert">
                      please set key in header ! ! !
                    </div>
                </div>
            <?php } elseif (is_null($client->get($_GET['key']))) { ?>
                <div class="container jumbotron PartOne">
                    <span class="btn btn-outline-danger PartTwo">
                      <?php echo language::get_string('Errors'); ?>
                    </span>
                    <a href="../" class="btn btn-warning PartThree"><?php echo language::get_string('Back'); ?></a>
                    <div class="alert alert-danger" role="alert">
                      <?php echo language::get_string('No record with key').' : '.$_GET['key']; ?>
                    </div>
                </div>
            <?php } else { ?>
                <div class="container PartOne">
                    <div class=" container card text-white bg-dark mb-3" >
                      <form action="../Edit?key=<?php echo $_GET['key']; ?>" method="post">
                          <input type="hidden" name="pervios_key" value="<?php echo $_GET['key']; ?>">
                          <input type="hidden" name="server" value="<?php echo $_GET['server']; ?>">
                          <div class="form-group row PartFour">
                            <label for="key" class="col-sm-2 col-form-label"><?php echo language::get_string('Key'); ?></label>
                            <div class="col-sm-10">
                              <input type="text" class="form-control" name="key" id="key" value="<?php echo $_GET['key']; ?>">
                            </div>
                          </div>
                          <div class="form-group row">
                            <label for="value" class="col-sm-2 col-form-label">
                              <?php echo language::get_string('Value'); ?>
                            </label>
                            <div class="col-sm-10">
                              <input type="text" class="form-control" name="value" id="value" value="<?php echo $client->get($_GET['key'])?>">
                            </div>
                          </div>
                          <button type="submit" class="btn btn-primary PartFive">
                            <?php echo language::get_string('Save'); ?>    
                          </button>
                        </form>
                    </div>
                  </div>
            <?php } ?>
    </body>
</html>