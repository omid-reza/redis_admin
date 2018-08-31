<!DOCTYPE html>
<html>
<head>
    <title>search - redis console</title>
    <style type="text/css">
        body{ background-image: linear-gradient(to left,#FC5252,#F237FE) }
    </style>
    <link rel="stylesheet" type="text/css" href="assets/bootstrap.min.css">
</head>
<body>
    <div class="container" style="margin-top: 20%">
      <div class=" container card text-white bg-dark mb-3" >
        <form action="../searchResualt.php" method="get">
          <div class="card-header">
            Search
            <a style="float: right" href="../" class="btn btn-warning">Back</a>
          </div>
          <div class="form-group row" style="margin-top: 2%">
            <label for="key" class="col-sm-2 col-form-label">Key to search</label>
            <div class="col-sm-10">
              <input type="text" required width="100%" class="form-control" name="key">
            </div>
            </div>
              <button type="submit" style="margin-bottom: 1%;float: right;" class="btn btn-primary">Search</button>
        </form>
      </div>
    </div>
</body>
</html>