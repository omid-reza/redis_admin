<!DOCTYPE html>
<html>
<head>
    <title>edit - redis console</title>
    <style type="text/css">
        body{ background-image: linear-gradient(to left,#FC5252,#F237FE) }
    </style>
    <link rel="stylesheet" type="text/css" href="assets/bootstrap.min.css">
</head>
<body>
    <?php
        require 'config.php';
        $config=new Config();
        $client=$config->connect();
        if (is_string($client)) { ?>
            <div class="container jumbotron" style="margin-top: 100px">
                <span style="height: 50px;width: 150px;font-size: 20px; margin-bottom:10px " class="btn btn-outline-danger">errors</span>
                <div class="alert alert-danger" role="alert">
                  <?php echo $client ?>
                </div>
            </div>
        <?php }else if( ! isset($_GET['key'])){ ?>
            <div class="container jumbotron" style="margin-top: 100px">
                <span style="height: 50px;width: 150px;font-size: 20px; margin-bottom:10px " class="btn btn-outline-danger">errors</span>
                <a style="float: right;" href="../" class="btn btn-warning">Back</a>
                <div class="alert alert-danger" role="alert">
                  please set key in header ! ! !
                </div>
            </div>
        <?php }else if(is_null($client->get($_GET['key']))){ ?>
            <div class="container jumbotron" style="margin-top: 100px">
                <span style="height: 50px;width: 150px;font-size: 20px; margin-bottom:10px " class="btn btn-outline-danger">errors</span>
                <a style="float: right;" href="../" class="btn btn-warning">Back</a>
                <div class="alert alert-danger" role="alert">
                  No record with key <?php echo $_GET['key']; ?>
                </div>
            </div>
        <?php }else{ ?>
            <div class="container" style="margin-top: 100px">
                <div class=" container card text-white bg-dark mb-3" >
                  <form action="../edit.php?key=<?php echo $_GET['key']; ?>" method="get">
                      <input type="hidden" name="pervios_key" value="<?php echo $_GET['key']; ?>">
                      <div class="form-group row" style="margin-top: 2%">
                        <label for="key" class="col-sm-2 col-form-label">Key</label>
                        <div class="col-sm-10">
                          <input type="text" class="form-control" name="key" id="key" value="<?php echo $_GET['key']; ?>">
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="value" class="col-sm-2 col-form-label">Value</label>
                        <div class="col-sm-10">
                          <input type="text" class="form-control" name="value" id="value" value="<?php echo $client->get($_GET['key'])?>">
                        </div>
                      </div>
                      <button type="submit" style="margin-bottom: 1%;float: right;" class="btn btn-primary">Save</button>
                    </form>
                </div>
        <?php } ?>
        </div>
        
</body>
</html>