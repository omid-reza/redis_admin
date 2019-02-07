<h1 align="center" >redis admin</h1>
<p align="center">
    <a href="LICENSE" target="_blank">
        <img alt="Software License" src="https://poser.pugx.org/redis_admin/redis_admin/license">
    </a>
    <a href="https://packagist.org/packages/redis_admin/redis_admin" target="_blank">
        <img alt="Latest Stable Version" src="https://poser.pugx.org/redis_admin/redis_admin/v/stable">
    </a>
    <a href="https://packagist.org/packages/redis_admin/redis_admin" target="_blank">
        <img alt="Latest Unstable Version" src="https://poser.pugx.org/redis_admin/redis_admin/v/unstable">
    </a>
    <a href="https://php.net/" target="_blank">
        <img alt="Minimum PHP Version" src="https://img.shields.io/badge/php-%3E%3D%207.1.3-8892BF.svg">
    </a>
    <a href="https://http://redis.io/" target="_blank">
        <img alt="Minimum redis version" src="https://img.shields.io/badge/redis-%3E%3D%201.0.0-FC5252.svg">
    </a>
    <a href="https://www.codefactor.io/repository/github/snip77/redis_admin">
        <img src="https://www.codefactor.io/repository/github/snip77/redis_admin/badge" />
    </a>
    <a href="https://packagist.org/packages/redis_admin/redis_admin">
        <img alt="composer.lock" src='https://poser.pugx.org/redis_admin/redis_admin/composerlock'>
    </a>
</p>

## Features :
  - see all keys
  - see record detail
  - search for match keys
  - edit keys
  - delete keys
  - insert record
    - set expire time
    
    

## Requirments
#### Redis
  You can install redis from https://redis.io/download
      
 #### Php
  You can install php from http://php.net/downloads.php


## Installation :

###   Use composer:
   If you don't have Composer yet, download it following the instructions on http://getcomposer.org/ or just run the following command:

```php
    curl -s http://getcomposer.org/installer | php 
```

  Then, use the `create-project` command to generate a new application:
  
 ```
    composer create-project redis_admin/redis_admin PATH_TO_INSTALL
 ```
 
 #### Composer will install the redis Console and all its dependencies under the `PATH_TO_INSTALL` directory

## OR

### install manually
    
   #### clone project from github with this command :
```php
    git clone https://github.com/snip77/redis_admin.git
```
   #### install requirements with this command:
```php
    composer install
```

### setup host and port :
  You can do it start page for or go to ```db.yaml``` in  config directory and put information in this file(need yaml struct!)
  
  
## Use :
  #### use default port:
  Default port for app is `2000`
  - run this command in main directory
    
```php
    php serve
```  

  - Visit `localhost:2000` in your browser
  
  #### set option port:
   You can set port like this:
```php
php serve PORT_NUMBER
``` 
  - Visit `localhost:PORT_NUMBER` in your browser
  
  For example 
 
 ```php
php serve 2010
``` 
  - Visit `localhost:2010` in your browser
  
  
## requirments for use :
  
  - redis server
