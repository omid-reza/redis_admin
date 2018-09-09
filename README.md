# redis-console
Manage Redis server keys

![Loading . . .](Cover/index.png)

## Features :
  - see all keys
  - see record detail
    - types availble
      - Strings
      - lists
      - sorted lists
      - sets
      - hashs
  - search for match keys
  - edit keys
    - types
      - string
  - delete keys
  - insert record
    - types  availble 
      - Strings
      - Lists
      - Hashs
      - Sets
      - sorted lists
    - set expire time
    
    

## Requirments
#### Redis
  Install redis from https://redis.io/download for your os
      
 #### Php
  Install from http://php.net/downloads.php


## Installation :

###   Use composer:
   If you don't have Composer yet, download it following the instructions on http://getcomposer.org/ or just run the following command:

```php
    curl -s http://getcomposer.org/installer | php 
```

  Then, use the `create-project` command to generate a new application:
  
 ```
    composer create-project redis-console/redis-console -s dev path/to/install
 ```
 
 #### Composer will install the redis Console and all its dependencies under the `path/to/install` directory
 
### setup host and port :
  for set up you should go to ```db.yaml``` in  config directory :
  
##### host : change host value to your host(default is localhost) :

```yaml
        - host : localhost
```
      
####  port  : change port value to your redis port in your host(default port for redis is 6379)

```yaml
          port : 6379
```

## Use :
  #### use default port:
  Default port for app is `2000`
  - run this command in main directory
    
```php
    php artisan
```  

  - Visit `localhost:2000` in your browser
  
  #### set option port:
   You can set port like this:
```php
php artisan PORT_NUMBER
``` 
  - Visit `localhost:PORT_NUMBER` in your browser
  
  For example 
 
 ```php
php artisan 2010
``` 
  - Visit `localhost:2010` in your browser
  
  
## requirments for use :
  
  - runs redis server
