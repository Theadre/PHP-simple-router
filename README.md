## Prerequisites
- apache server
- php 7.1 or higher

Web site have to be disaled :
```
# a2dissite example.com
```

# GETTING STARTED

### Configure a PHP router in your project
Copy in default path of your project directory
- index.php
```
<?php
$redirect = $_SERVER['REQUEST_URI']; // You can also use $_SERVER['REDIRECT_URL'];

switch ($redirect) {
    case '/'  :
    case ''   :
        require __DIR__ . '/views/home.php';
        break;

    case '/about' :
        require __DIR__ . '/views/about.php';
        break;
    default:
        require __DIR__ . '/views/404.php';
        break;
}
```

- .htaccess
```
RewriteEngine On
RewriteBase /
RewriteCond %{REQUEST_FILENAME} !-d
RewriteCond %{REQUEST_FILENAME} !-f
RewriteRule ^(.+)$ index.php [QSA,L]
```

### Configure your apache vhost
Copy the content of vhost.conf file in your vhost config file in `/etc/apache2/sites-availables/example.com.conf`
- vhost.conf
```
<VirtualHost *:80>
    ServerAdmin admin@gmail.com
    ServerName example.com
    ServerAlias www.example.com
    DocumentRoot /var/www/html/example.com

    <directory /var/www/html/example.com/>
        Options -Indexes +FollowSymLinks +MultiViews
        AllowOverride All
        Require all granted
    </directory>

    ErrorLog ${APACHE_LOG_DIR}/example.com_error.log
    CustomLog ${APACHE_LOG_DIR}/example.com_access.log combined

    RewriteEngine on
    RewriteCond %{SERVER_NAME} =example.com [OR]
    RewriteCond %{SERVER_NAME} =www.example.com
    RewriteRule ^ https://%{SERVER_NAME}%{REQUEST_URI} [END,NE,R=permanent]
</VirtualHost>
```

### Then
```
# a2ensite example.conf

# service apache2 restart
```

## How to use in HTML file
In `<a></a>` tag, use `href="/"` or `href="/about"`
