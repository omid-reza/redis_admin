<?php
    require 'vendor/autoload.php';
    use Symfony\Component\Yaml\Yaml;

    $servers = Yaml::parseFile('config/db.yaml');
    if (is_null($servers)) {
        header('location:../server_register.php');
    }
?>
<!DOCTYPE html>
<html>
<head>
    <title>select server - redis admin</title>
    <link rel="stylesheet" type="text/css" href="assets/css/select_server.css">
    <link rel="stylesheet" type="text/css" href="assets/bootstrap.min.css">
</head>
<body>
    <?php
    if (isset($_GET['error'])) {
        ?>
        <div class="alert alert-danger" role="alert">
              <?php echo $_GET['error']; ?>
        </div>
    <?php
    } ?>
    <?php
    if (isset($_GET['message'])) {
        ?>
        <div class="alert alert-success" role="alert">
              <?php echo $_GET['message']; ?>
        </div>
    <?php
    } ?>
	<div class="container jumbotron PartTwo"> 
		<a href="../server_register.php" class="btn btn-warning PartOne">Add Server</a>
	   <div class="alert alert-dark PartSix" role="alert">
			servers
	   </div>
       <?php foreach ($servers as $key => $value) {
        ?>
		  <div class="alert alert-success PartSix server" role="alert">
			<?php echo $value['host'].':'.$value['port']; ?>
            <a class="btn btn-danger remove PartThree" href="../server_remove.php?server=<?php echo $key; ?>"> Remove </a>
            <a class="btn btn-dark keys PartThree" href="../keys.php?server=<?php echo $key; ?>"> Keys </a>
	   	   </div>
       <?php
    } ?>
	</div>
</body>
</html>
