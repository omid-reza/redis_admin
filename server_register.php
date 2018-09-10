<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="assets/css/server_register.css">
	<link rel="stylesheet" type="text/css" href="assets/bootstrap.min.css">
	<title>Register a new server</title>
</head>
<body>
    <?php
    if (isset($_GET['error'])) {?>
        <div class="alert alert-danger" role="alert">
              <?php echo $_GET['error']; ?>
        </div>
    <?php } ?>
		<div class="container partTwo" id="app">
        <div class=" container card text-white bg-dark mb-3" >
          <form method="post" action="../save_new_server.php" @submit="checkForm">
            <div class="card-header">
              Register a new server
            </div>
            <div class="form-group row partFour">
              <label for="host" class="col-sm-2 col-form-label">Host</label>
              <div class="col-sm-10">
                <input v-model="host" type="text"  width="100%" class="form-control" name="host">
              </div>
            </div>
              <div class="form-group row">
              <label for="port" class="col-sm-2 col-form-label">Port</label>
              <div class="col-sm-10">
                <input v-model="port" type="text"  width="100%" class="form-control" name="port">
              </div>
            </div>
              <button type="submit" class="btn btn-success partOne partThree">Save</button> 
          </form>
        </div>
      </div>
</body>
</html>