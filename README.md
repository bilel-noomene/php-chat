# PHP Chat Application

## Requirements
This project requires PHP 7.1 or higher. 

## Installation
- Clone the project.
- For the database configuration, you can use the environment parameters or create a new file `env.local.php` 
(copy it from env.php) in the project root directory.
- You should create an empty database that matches your configuration.
- Run the command `php bin/init` to create the database schema and load data fixtures.
- Create an Apache VirtualHost with the following configuration (assume that our domain is php-chat.lo). You
can declare the environment parameters here.   
```
<VirtualHost *:80>
    ServerName php-chat.lo
    ServerAlias www.php-chat.lo 

    SetEnv APP_ENV 'dev'
    SetEnv DATABASE_USER 'root'
    SetEnv DATABASE_PASSWORD 'root'
    SetEnv DATABASE_NAME 'php-chat'
    
    DocumentRoot /path/to/project/php-chat/public
    <Directory /path/to/project/php-chat/public>
        AllowOverride All
        Order Allow,Deny
        Allow from All
    	Require all granted

        FallbackResource /index.php
    </Directory>


    ErrorLog /var/log/apache2/php-chat.lo_error.log
    CustomLog /var/log/apache2/php-chat.lo_access.log combined
</VirtualHost>

```
- You can login with the email `user@test.com` and password `123456`.

##Note
This project does not use ajax or a real-time connection.