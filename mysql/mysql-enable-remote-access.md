## Mysql enable remote access
Change mysql table
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