new Vue({
        el: '#app',
        data: {
          host:"",
          port:"",
          errors: [],
          password:"",
          database:"",
          password_confirm:""
        },
        methods:{
            checkForm: function (e) {
              this.errors = [];
              if (!this.host) this.errors.push('Host Field required');
              if (this.btn_password_text == "Don't Use Password"){
                  if (!this.password) this.errors.push("Password Field can't be empty.");
                  if (!this.password_confirm) this.errors.push("Password Confirm Field can't be empty.");
              }
              if (this.password!=this.password_confirm) this.errors.push('password and password confirm should be same');
              if (!this.errors.length) return true;
              e.preventDefault();
            }
        }
});