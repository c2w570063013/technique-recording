## Install nginx and php and php-fpm
```shell script
apt update
apt install nginx
apt install php php-fpm
```
> Notice: php7.0-fpm.sock is located at 'run/php/php7.0-fpm.sock;'
 
> But don't recommend this way for installing php because the apache will be installed coming along with php. Installing
> php and the extensions separately 

Configure nginx server
```shell script
server {
    listen 80;
    listen [::]:80;

    root /var/www/html;
    index index.php index.html index.htm index.nginx-debian.html;

    server_name server_domain_or_IP;

    location / {
        try_files $uri $uri/ =404;
    }

    location ~ \.php$ {
        include snippets/fastcgi-php.conf;
        fastcgi_pass unix:/run/php/php7.0-fpm.sock;
    }

    location ~ /\.ht {
        deny all;
    }
}
```
Pay attention to:
```shell script
location ~ \.php$ {
        include snippets/fastcgi-php.conf;
        fastcgi_pass unix:/run/php/php7.0-fpm.sock;
    }

location ~ /\.ht {
        deny all;
    }
```

After configure your server, restart nginx
```shell script
nginx -t
nginx -s reload
``` 