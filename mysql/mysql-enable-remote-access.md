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
Or
```shell script
systemctl restart mysql
```

https://www.digitalocean.com/community/tutorials/how-to-install-the-latest-mysql-on-debian-10

https://blog.csdn.net/h996666/article/details/80921913