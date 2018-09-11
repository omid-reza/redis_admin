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
    <title>select server - redis console</title>
    <link rel="stylesheet" type="text/css" href="assets/css/select_server.css">
    <link rel="stylesheet" type="text/css" href="assets/bootstrap.min.css">
</head>
<body>
	<div class="container jumbotron PartTwo"> 
		<a href="../server_register.php" class="btn btn-warning PartOne">Add Server</a>
		<div class="alert alert-dark PartSix" role="alert">
			servers
		</div>
		<?php foreach ($servers as $key => $value) {
    ?>
			<a class="PartSeven" href="keys.php?server=<?php echo $key; ?>">
				<div class="alert alert-success PartSix" role="alert">
					<?php echo $value['host'].':'.$value['port']; ?>
				</div>
			</a>
		<?php
} ?>
	</div>
</body>
</html>
