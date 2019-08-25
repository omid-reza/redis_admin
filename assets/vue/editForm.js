let app=new Vue({
        el: '#app',
        data: {
          key : '',
          value: '',
          errors:[]
        },
        methods:{
            checkForm: function (e) {
              this.errors=[];
              if (!this.key) this.errors.push('New Key Field required');
              if (!this.value) this.errors.push('New Value Field required');
              if (!this.errors.length) return true;
              e.preventDefault();
            }
        }
});
var urlParams = new URLSearchParams(window.location.search);
if (urlParams.has('key'))
  app.key=urlParams.get('key');