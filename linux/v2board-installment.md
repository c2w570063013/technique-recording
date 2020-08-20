1.clone repo to local
```shell script
git clone https://github.com/v2board/v2board.git
```

2.composer install
```shell script
cd v2board
composer install
```
3.install redis

4.install php redis

5.create a database for v2board

6.start install v2board
```shell script
cd v2board
php artisan v2board:install
```
7.configure schedule task on crontab
```shell script
crontab -e
*/1 * * * * php /var/www/v2board/artisan schedule:run
```
8.start queue with pm2
```shell script
install npm and nodejs
#install pm2
npm install -g pm2
pm2 start pm2.yaml
pm2 list #check wheather it works
```

PS:
>on windows, you need to configure the rewrite on vhosts.conf. like:
```shell script
server {
        listen        80;
        server_name  v2board.test;
        root   "D:/code/v2board/public";
        location / {
            #下面这行手动添加的
            try_files $uri $uri/ /index.php$is_args$query_string;
            index index.php index.html error/index.html;
            error_page 400 /error/400.html;
            error_page 403 /error/403.html;
            error_page 404 /error/404.html;
            error_page 500 /error/500.html;
            error_page 501 /error/501.html;
            error_page 502 /error/502.html;
            error_page 503 /error/503.html;
            error_page 504 /error/504.html;
            error_page 505 /error/505.html;
            error_page 506 /error/506.html;
            error_page 507 /error/507.html;
            error_page 509 /error/509.html;
            error_page 510 /error/510.html;
            autoindex  off;
        }
        location ~ \.php(.*)$ {
            fastcgi_pass   127.0.0.1:9000;
            fastcgi_index  index.php;
            fastcgi_split_path_info  ^((?U).+\.php)(/?.+)$;
            fastcgi_param  SCRIPT_FILENAME  $document_root$fastcgi_script_name;
            fastcgi_param  PATH_INFO  $fastcgi_path_info;
            fastcgi_param  PATH_TRANSLATED  $document_root$fastcgi_path_info;
            include        fastcgi_params;
        }


        #####后面加上去的 2020.7.21vvvv
        location /downloads {
        }
        
        location ~ .*\.(js|css)?$
        {
            expires      1h;
            error_log off;
            access_log off; 
        }
        #####后面加上去的 2020.7.21^^^^

}

```



### 注意，有些问题。如果是迁移过来的项目。登录的时候数据库报错，如:
```shell script
请求失败 SQLSTATE[HY000] [1045] Access denied for user 'root'@'localhost' (using password: YES)
```
则可以执行:
```shell script
php artisan config:clear
```

### 对接gmail 之后，记得重启队列
```shell script
pm2 stop pm2.yaml
pm2 start pm2.yaml
```


Done!