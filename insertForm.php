<!DOCTYPE html>
<html>
<head>
    <title>insert - redis admin</title>
    <link rel="stylesheet" type="text/css" href="assets/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="assets/css/insertForm.css">
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
      <div class="container PartSeven" id="app">
        <div class=" container card text-white bg-dark mb-3" >
          <form method="post" action="../insert.php">
            <div class="card-header">
              Insert
              <a href="../keys.php?server=<?php echo $_GET['server']; ?>" class="btn btn-warning PartOne">Main Page</a>
            </div>
            <div class="form-group PartTwo">
              <label for="exampleFormControlSelect1">Type</label>
              <select name="type" class="form-control" id="Type" v-model="type" @change="typeChange()">
                <option>String</option>
                <option>Hashe</option>
                <option>Set</option>
                <option>List</option>
                <option>Sorted List</option>
              </select>
            </div>
            <div class="form-group row PartThree" v-if="type != '' && addedExpire == true">
              <label for="key" class="col-sm-2 col-form-label">Expire in (second)</label>
              <div class="col-sm-10">
                <input v-model="expireIn" type="number"  width="100%" class="form-control" name="expire">
              </div>
            </div>
            <div class="form-group row PartThree" v-if="type != ''">
              <label for="key" class="col-sm-2 col-form-label">Key</label>
              <div class="col-sm-10">
                <input v-model="key" type="text"  width="100%" class="form-control" name="key">
              </div>
            </div>
              <div class="form-group row PartThree" v-if="type != ''" v-for="index in valuecount">
              <label for="key" class="col-sm-2 col-form-label">value</label>
              <div class="col-sm-10">
                <input type="text"  width="100%" class="form-control" name="value[]">
                <input type="hidden" name="server" value="<?php echo $_GET['server']; ?>">
              </div>
            </div>
              <button v-if="type!=''" type="submit" class="btn btn-success PartFour">Insert</button> 
              <a v-if="type != ''" v-if="type!='String'" @click="addValue()" class="btn btn-light PartFive" style="color: gray;">Add</a>
              <a v-if="type != ''" @click="addExpire()" class="btn btn-warning PartSix">
                {{ expireKeyText }}
              </a>
          </form>
        </div>
      </div>
      <script src="assets/vue.js"></script>
      <script src="assets/vue/insertForm.js"></script>
    <?php
      } ?>
</body>
</html>