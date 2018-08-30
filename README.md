# redis-console
Manage Redis server keys(show-edit-delete)

### requirments
#### Redis
  
      Install redis from https://redis.io/download for you os
 #### Php
  
      You should have php for start server
 
### setup host and port :
  for set up you should go to ```config.php``` in root directory :
  
##### host : change host variable value to your host(default is localhost) :
```php
        private $host='localhost'; 
```
      
####  port  : change port variable value to your redis port inyour host(default port for redis is 6379)

```php
        private $port=6379;
```

### Use :

  - run this command in main directory
    
```php
    Php -S localhost:8000
```
  - Visit `localhost:8000` in your browser
  
## Note :

  For use you need to start Your `redis server`
