## Prerequisites
- apache server
- php 7.1 or higher

Web site have to be disaled :
```
a2dissite example.com
```

# GETTING STARTED

### Configure a PHP router in your project
Copy in default path of your project directory
- index.php
- .htaccess

### Configure your apache vhost
Copy the content of vhost.conf file in your vhost config file in `/etc/apache2/sites-availables/example.com.conf`

### Then
```
a2ensite example.conf
service apache2 restart
```