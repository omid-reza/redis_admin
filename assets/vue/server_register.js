new Vue({
        el: '#app',
        data: {
          errors: [],
          host:"",
          port:""
        },
        methods:{
            checkForm: function (e) {
              if (this.host && this.port) return true;
              
              this.errors = [];
              
              if (!this.host) this.errors.push('host Field required');
              if (!this.port)this.errors.push('port Field required.');
              
              e.preventDefault();
            }
        }
});