<!DOCTYPE html>
<html>
<head>
    <title>redis console</title>
    <link rel="stylesheet" type="text/css" href="assets/css/index.css">
    <link rel="stylesheet" type="text/css" href="assets/bootstrap.min.css">
    <script type="text/javascript" src="assets/vue.js"></script>
</head>
<body>
    <?php
    if (isset($_GET['error'])) {?>
        <div class="alert alert-danger" role="alert">
              <?php echo $_GET['error']; ?>
        </div>
    <?php } ?>

    <?php
    if (isset($_GET['message'])) {?>
        <div class="alert alert-success" role="alert">
              <?php echo $_GET['message']; ?>
        </div>
    <?php } ?>
    

    <?php
        require 'vendor/autoload.php';
        use config\Config;
        $config = new Config();
        $client = $config->connect();
        if (is_string($client)) { ?>
            <div class="container jumbotron PartTwo">
                <span class="btn btn-outline-danger PartOne">errors</span>
                <div class="alert alert-danger" role="alert">
                  <?php echo $client ?>
                </div>
            </div>
        <?php }else{ ?>
            <div class="container jumbotron PartTwo">
                <div class="PartThree">
                    <div class="PartFour">
                        <a href="../insertForm.html" class="btn btn-success PartFive">Insert</a>
                    <a href="../searchForm.php" class="btn btn-primary PartFive partEight">Search</a>
                    </div>
                </div>    
                <div class="alert alert-primary" role="alert" style="">
                        <?php echo $config->getHost() . ':' . $config->getPort(); ?>
                        <div  class="partEight"><?php echo $client->dbsize()." Key"; ?></div>
                </div>
                <div class="alert alert-dark PartSix" role="alert">
                        keys
                </div>
            <?php
            foreach ($client->keys('*') as $key => $value) {  ?>
                <a class="PartSeven" href="show.php?key=<?php echo $value; ?>">
                    <div class="alert alert-success PartSix" role="alert">
                            <?php echo $value; ?>
                    </div>
                </a>
        <?php } } ?>
        </div>
</body>
</html>