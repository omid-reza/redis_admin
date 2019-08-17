new Vue({
        el: '#app',
        data: {
          key : "",
          errors:[],
          valuecount:1,
          values:[],
          addedExpire:false,
          expireIn:null,
          type: "",
          expireKeyText:"Add Expire Time",
        },
        methods:{
            checkForm: function (e) {
              this.errors=[];
              if (!this.key) this.errors.push('Key Field required');
              for (var i = 0; i < this.values.length; i++)
                if (!this.values[i]) this.errors.push('Fill Value Number '+(i+1));
              
              if (this.values.length<this.valuecount) this.errors.push('Fill All values');
              if (!this.errors.length) return true;
              e.preventDefault();

            },
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
              if(this.type == 'String') this.valuecount=1;
            }
        }
});