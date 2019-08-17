<?php

    use config\config;
    use language\language;
    use Symfony\Component\Yaml\Yaml;
    $servers = config::read_config_file();
    if (sizeof($servers)==0)
        header('location:../server_register');
?>
<!DOCTYPE html>
<html>
    <head>
        <title><?php echo language::get_string('Select Server'); ?></title>
        <link rel="stylesheet" type="text/css" href="assets/css/select_server.css">
        <link rel="stylesheet" type="text/css" href="assets/bootstrap.min.css">
    </head>
    <body>
        <?php if (isset($_GET['error'])) { ?>
            <div class="alert alert-danger" role="alert">
                  <?php echo $_GET['error']; ?>
            </div>
        <?php } ?>
        <?php if (isset($_GET['message'])) {?>
            <div class="alert alert-success" role="alert">
                  <?php echo $_GET['message']; ?>
            </div>
        <?php } ?>
    	<div class="container jumbotron PartTwo"> 
    		<a href="../server_register" class="btn btn-warning PartOne"><?php echo language::get_string('Add server'); ?></a>
    	   <div class="alert alert-dark PartSix" role="alert">
    			<?php echo language::get_string('Servers'); ?>
    	   </div>
           <?php foreach ($servers as $key => $value) { ?>
    		  <div class="alert alert-success PartSix server" role="alert">
    			<?php echo $value['host'].':'.$value['port']; ?>
                <a class="btn btn-danger remove PartThree" href="../server_remove?server=<?php echo $key; ?>"> <?php echo language::get_string('Remove'); ?> </a>
                <a class="btn btn-dark keys PartThree" href="../keys?server=<?php echo $key; ?>"><?php echo language::get_string('Keys'); ?> </a>
    	   	   </div>
           <?php } ?>
    	</div>
    </body>
</html>
