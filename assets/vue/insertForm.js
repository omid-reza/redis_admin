new Vue({
        el: '#app',
        data: {
          key : "",
          type: "",
          errors:[],
          values:[],
          valuecount:1,
          expireIn:null
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
            typeChange(){
              if(this.type == 'String') this.valuecount=1;
            }
        }
});