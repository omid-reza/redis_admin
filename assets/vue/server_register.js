new Vue({
        el: '#app',
        data: {
          host:"",
          port:"",
          errors: [],
          password:"",
          database:"",
          password_confirm:"",
          btn_password_text:"Use Password"
        },
        methods:{
            checkForm: function (e) {
              if (this.host) return true;
              
              this.errors = [];
              
              if (!this.host) this.errors.push('Host Field required');
              
              //TODO: should update(have bug)
              if (this.btn_password_text == "Don't Use Password"){
                  if (this.password=='') this.errors.push("Password Field can't be empty.");
                  if (this.password_confirm=='') this.errors.push("Password Confirm Field can't be empty.");
              }

              if (this.password!=this.password_confirm) this.errors.push('password and password confirm should be same');
              
              e.preventDefault();
            },
            change_password_status(){
              this.btn_password_text=((this.btn_password_text == 'Use Password')?"Don't Use Password":'Use Password');
            }
        }
});