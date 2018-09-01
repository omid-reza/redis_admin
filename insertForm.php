<!DOCTYPE html>
<html>
<head>
    <title>insert - redis console</title>
    <style type="text/css">
        body{ background-image: linear-gradient(to left,#FC5252,#F237FE) }
    </style>
    <link rel="stylesheet" type="text/css" href="assets/bootstrap.min.css">
</head>
<body>
    <div class="container" style="margin-top: 20%" id="app">
      <div class=" container card text-white bg-dark mb-3" >
        <form method="post" action="../insert.php">
          <div class="card-header">
            Insert
            <a style="float: right" href="../" class="btn btn-warning">Main Page</a>
          </div>
          <div class="form-group" style="margin-top: 1%">
            <label for="exampleFormControlSelect1">Type</label>
            <select name="type" class="form-control" id="Type" v-model="type" @change="typeChange()">
              <option>String</option>
              <option>Hashe</option>
              <option>List</option>
              <option>Set</option>
            </select>
          </div>
          <div class="form-group row" style="margin-top: 2%" v-if="type != '' && addedExpire == true">
            <label for="key" class="col-sm-2 col-form-label">Expire in (second)</label>
            <div class="col-sm-10">
              <input v-model="expireIn" type="number"  width="100%" class="form-control" name="expire">
            </div>
          </div>
          <div class="form-group row" style="margin-top: 2%" v-if="type != ''">
            <label for="key" class="col-sm-2 col-form-label">Key</label>
            <div class="col-sm-10">
              <input v-model="key" type="text"  width="100%" class="form-control" name="key">
            </div>
          </div>
            <div class="form-group row" style="margin-top: 2%" v-if="type != ''" v-for="index in valuecount">
            <label for="key" class="col-sm-2 col-form-label">value</label>
            <div class="col-sm-10">
              <input type="text"  width="100%" class="form-control" name="value[]">
            </div>
          </div>
            <button v-if="type!=''" type="submit" style="float: right;margin-bottom: 2%" class="btn btn-success">Insert</button> 
            <a v-if="type != ''" v-if="type!='String'" @click="addValue()" style="float: right;margin-right: 1%;color: gray" class="btn btn-light">Add</a>
            <a v-if="type != ''" @click="addExpire()" style="float: right;margin-right: 1%" class="btn btn-warning">
              {{ expireKeyText }}
            </a>
        </form>
      </div>
    </div>
    <script src="assets/vue.js"></script>
    <script>
      var app = new Vue({
        el: '#app',
        data: {
          key : "",
          valuecount:1,
          addedExpire:0,
          expireIn:null,
          type: "",
          expireKeyText:"Add Expire Time",
        },
        methods:{
            addValue(){
               this.valuecount++;
            },
            addExpire(){
              if(this.addedExpire){
                this.addedExpire=false;
                this.expireKeyText="Add Expire Time";
                return;
              }
              this.addedExpire=true;
              this.expireKeyText="Remove Expire Time";    
            },
            typeChange(){
              if(this.type == 'String')
                this.valuecount=1;
            }
        }
      })
    </script>
</body>
</html>