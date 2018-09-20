new Vue({
        el: '#app',
        data: {
          btn_password_text:"Use Password",
          errors: [],
          host:"",
          port:"",
          password:"",
          password_confirm:"",
          database:""
        },
        methods:{
            checkForm: function (e) {
              if (this.host && this.port) return true;
              
              this.errors = [];
              
              if (!this.host) this.errors.push('host Field required');
              if (!this.port) this.errors.push('port Field required.');
              
              if (this.btn_password_text == "Don't Use Password"){
                  if (this.password=='') this.errors.push("password Field can't be empty.");
                  if (this.password_confirm=='') this.errors.push("password confirm Field can't be empty.");
              }

              if (this.password!=this.password_confirm) this.errors.push('password and password confirm should be same');
              
              e.preventDefault();
            },
            change_password_status(){
              if (this.btn_password_text == 'Use Password'){
                  this.btn_password_text = "Don't Use Password";
              }else{
                this.btn_password_text = "Use Password";
              }
            }
        }
});