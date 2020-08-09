```php
//公用接口返回数据结构
function return_json($code,$msg='',$data = '')
{
    $array = array();
    $array['code'] = $code;
    $array['data'] = $data;
    $array['msg'] = $msg;
    header('Content-Type:application/json; charset=utf-8');
    header('Access-Control-Allow-Origin:*');
    header('Access-Control-Allow-Methods:OPTIONS, GET, POST, DELETE');
    exit(json_encode($array));
}
```
Find php.ini on linux
```shell script
php -i | grep 'php.ini'
```
or 
```shell script
<?php
phpinfo();
```
### How To Install PHP 7.3 / 7.2 / 7.1 on Debian 10 / Debian 9 & Debian 8
https://www.itzgeek.com/how-tos/linux/debian/how-to-install-php-7-3-7-2-7-1-on-debian-10-debian-9-debian-8.html

once the server has both apache and nginx. A error may occurs and to solve that problem. it's better to uninstall Apache.
```shell script
sudo apt autoremove
sudo apt remove apache2*
```

Add extensions to php manually 
```shell script
phpinfo(); #check out the 'extension_dir' location
```
Copy the extension plugin to 'extension_dir', then add extension name to the 'php.ini'
```shell script
extension=swoole_loader.so
```

Install redis extension in php@7.4 on mac os 
```shell script
pecl install redis
``` 
then restart php
```shell script
brew services restart php
```
restart php-fpm on ubuntu/debin
```shell script
service php7.4-fpm restart
```
php.ini location 
```shell script
/etc/php/7.4/fpm/php.ini
```