<?php use language\language; ?>
<!DOCTYPE html>
<html>
  <head>
      <title><?php echo language::get_string('Insert'); ?></title>
      <link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css">
      <link rel="stylesheet" type="text/css" href="assets/css/InsertForm.css">
  </head>
  <body>
    <?php if (!isset($_GET['server'])) { ?>
              <div class="container jumbotron PartTwo">
                  <span class="btn btn-outline-danger PartOne">
                    <?php echo language::get_string('Errors'); ?>
                  </span>
                  <div class="alert alert-danger" role="alert">
                    <?php  echo language::get_string('Please set server_id in header !'); ?>
                  </div>
              </div>
      <?php } else { ?>
        <div class="container PartSeven" id="app">
          <div sif="errors.length" class="container">
            <div class="alert alert-warning" v-for="error in errors" v-text="error"></div>
          </div>
          <div class=" container card text-white bg-dark mb-3" >
            <form method="post" action="../insert" @submit="checkForm">
              <div class="card-header">
                <?php echo language::get_string('Insert'); ?>
                <a href="../keys?server=<?php echo $_GET['server']; ?>" class="btn btn-warning PartOne">
                  <?php echo language::get_string('Main Page'); ?>
                </a>
              </div>
              <div class="form-group PartTwo">
                <label><?php echo language::get_string('Type'); ?></label>
                <select name="type" class="form-control" v-model="type" @change="typeChange()">
                  <option>Set</option>
                  <option>List</option>
                  <option>String</option>
                  <option>Hashe</option>
                  <option>Sorted List</option>
                </select>
              </div>
              <div  v-if="type != ''">
                <div class="form-group row PartThree">
                  <label for="key" class="col-sm-2 col-form-label"><?php echo language::get_string('Key'); ?></label>
                  <div class="col-sm-10">
                    <input v-model="key" type="text"  width="100%" class="form-control" name="key">
                  </div>
                </div>
                  <div class="form-group row PartThree" v-for="index in valuecount">
                    <label for="key" class="col-sm-2 col-form-label">
                      <?php echo language::get_string('Value'); ?>
                    </label>
                    <div class="col-sm-10">
                      <input v-model="values[index-1]" type="text"  width="100%" class="form-control" name="value[]">
                      <input type="hidden" name="server" value="<?php echo $_GET['server']; ?>">
                    </div>
                  </div>
                  <div class="form-group row PartThree">
                    <label for="key" class="col-sm-2 col-form-label">
                      <?php echo language::get_string('Expire After (Second)').' ('.language::get_string('Optional').')'; ?>
                    </label>
                    <div class="col-sm-10">
                      <input v-model="expireIn" type="number"  width="100%" class="form-control" name="expire">
                    </div>
                  </div>
                  <button v-if="type!=''" type="submit" class="btn btn-success PartFour">
                    <?php echo language::get_string('Save'); ?>
                  </button>
                  <a v-show="type!='String'" @click="addValue()" class="btn btn-light PartFive" style="color: gray;">
                    <?php echo language::get_string('Add Value'); ?>
                  </a>
                </div>
            </form>
          </div>
        </div>
        <script src="assets/vue/vue.js"></script>
        <script src="assets/vue/insertForm.js"></script>
      <?php } ?>
  </body>
</html>