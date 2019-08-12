new Vue({
        el: '#app',
        data: {
          key : "",
          valuecount:1,
          addedExpire:false,
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
              if(this.type == 'String') this.valuecount=1;
            }
        }
});