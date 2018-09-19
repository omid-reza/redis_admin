<!DOCTYPE html>
<html>
<head>
    <title>search - redis admin</title>
    <link rel="stylesheet" type="text/css" href="assets/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="assets/css/searchForm.css">
</head>
<body>
    <?php
      if (!isset($_GET['server'])) {
          ?>
            <div class="container jumbotron PartTwo">
                <span class="btn btn-outline-danger PartOne">Errors</span>
                <div class="alert alert-danger" role="alert">
                  Please set server_id in header !
                </div>
            </div>
    <?php
      } else {
          ?>
      <div class="container partTwo">
        <div class=" container card text-white bg-dark mb-3" >
          <form action="../searchResualt.php" method="get">
            <div class="card-header">
              Search
              <a href="../keys.php?server=<?php echo $_GET['server']; ?>" class="btn btn-warning partOne">Main Page</a>
            </div>
            <div class="form-group row partThree">
              <label for="key" class="col-sm-2 col-form-label">Key to search</label>
              <div class="col-sm-10">
                <input type="hidden" name="server" value="<?php echo $_GET['server']?>">
                <input type="text" required width="100%" class="form-control" name="key">
              </div>
              </div>
                <button type="submit" class="btn btn-primary partOne PartFour">Search</button>
          </form>
        </div>
      </div>
    <?php
      }?>
</body>
</html>