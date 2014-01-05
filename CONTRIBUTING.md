# Contribution Guidelines

### Requirements:  
1. Node.js & NPM  
2. Grunt  
3. PHP-CS-Fixer  
4. Composer  
5. Vagrant & Virtualbox  

### Setup:  
##### Clone  
    - git clone https://github.com/connyay/giffy-laravel.git giffy.co  
    - cd giffy.co  
    - composer install  
    - sudo chmod -R 777 app/storage  

##### Vagrant  
    - cd giffy.co/vagrant  
    - vagrant up (this will take awhile the first time)  
    - add '33.33.33.33 giffy.dev' and '33.33.33.33 api.giffy.dev' to hosts file (/etc/hosts)  

##### Deploy  
    - cd giffy.co  
    - php artisan giffy:deploy --env=dev  
