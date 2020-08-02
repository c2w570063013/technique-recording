## Mysql enable remote access
## install mysql 5.7 on debian
https://tecadmin.net/install-mysql-on-debian-10-buster/
> Warning: don't run mysql_secure_installation after installed mysql-server

1. Edit mysql config
```shell script
vim /etc/mysql/mysql.conf.d/mysqld.cnf
## change "bind-address=127.0.0.1" to "bind-address=0.0.0.0" 
```


2.Change mysql table
```shell script
mysql -u root –p
mysql>use mysql;
mysql>update user set host = '%' where user = 'root';
mysql>select host, user from user;
```
Restart mysql
```shell script
/etc/init.d/mysql stop
/etc/init.d/mysql start
``` 
Or
```shell script
systemctl restart mysql
```

https://www.digitalocean.com/community/tutorials/how-to-install-the-latest-mysql-on-debian-10

https://blog.csdn.net/h996666/article/details/80921913