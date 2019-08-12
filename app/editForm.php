<!DOCTYPE html>
<html>
    <head>
        <title>edit - redis admin</title>
        <link rel="stylesheet" type="text/css" href="assets/css/editForm.css">
        <link rel="stylesheet" type="text/css" href="assets/bootstrap.min.css">
    </head>
    <body>
        <?php
            use config\config;
            $config = new config();
            if (!isset($_GET['server'])) {
                ?>
                <div class="container jumbotron">
                    <span class="btn btn-outline-danger">Errors</span>
                    <div class="alert alert-danger" role="alert">
                    Please set server_id in header !
                </div>
                      
                </div>
            <?php } elseif (is_string($client = $config->connect($_GET['server']))) { ?>
                <div class="container jumbotron PartOne">
                    <span class="btn btn-outline-danger PartTwo">errors</span>
                    <div class="alert alert-danger" role="alert">
                      <?php echo $client ?>
                    </div>
                </div>
            <?php } elseif (!isset($_GET['key'])) { ?>
                <div class="container jumbotron PartOne">
                    <span class="btn btn-outline-danger PartTwo">errors</span>
                    <a href="../" class="btn btn-warning PartThree">Back</a>
                    <div class="alert alert-danger" role="alert">
                      please set key in header ! ! !
                    </div>
                </div>
            <?php } elseif (is_null($client->get($_GET['key']))) { ?>
                <div class="container jumbotron PartOne">
                    <span class="btn btn-outline-danger PartTwo">errors</span>
                    <a href="../" class="btn btn-warning PartThree">Back</a>
                    <div class="alert alert-danger" role="alert">
                      No record with key <?php echo $_GET['key']; ?>
                    </div>
                </div>
            <?php } else { ?>
                <div class="container PartOne">
                    <div class=" container card text-white bg-dark mb-3" >
                      <form action="../edit?key=<?php echo $_GET['key']; ?>" method="get">
                          <input type="hidden" name="pervios_key" value="<?php echo $_GET['key']; ?>">
                          <div class="form-group row PartFour">
                            <label for="key" class="col-sm-2 col-form-label">Key</label>
                            <div class="col-sm-10">
                              <input type="hidden" name="server" value="<?php echo $_GET['server']; ?>">
                              <input type="text" class="form-control" name="key" id="key" value="<?php echo $_GET['key']; ?>">
                            </div>
                          </div>
                          <div class="form-group row">
                            <label for="value" class="col-sm-2 col-form-label">Value</label>
                            <div class="col-sm-10">
                              <input type="text" class="form-control" name="value" id="value" value="<?php echo $client->get($_GET['key'])?>">
                            </div>
                          </div>
                          <button type="submit" class="btn btn-primary PartFive">Save</button>
                        </form>
                    </div>
            <?php } ?>
            </div>
            
    </body>
</html>