php issue after upgrading MacOS to 11.2.2
>ps: valet default uses php8.0 and run: 'valet use php@7.4' doesn't work, here is the approach to fix it
```shell
composer global update
valet install
valet use php@7.4 --force

# optional: you can also run this command at the beginning if it still doesn't work after running the above commands
valet on-latest-version
``` 

php-redis problem

```shell
# check out php version first 
# phpinfo();
pecl install redis
php --ini
# edit /opt/homebrew/etc/php/7.4/php.ini 
# remove redundant extension="redis.so", only remain one line for this
valet install
valet use php@7.4 --force
```

when you restart Mac os system, remember to type this command
```shell
valet use php@7.4 --force
# if it hints this and run this command
composer global update
```