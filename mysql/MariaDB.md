### set up root password
```shell script
mysql> set password for username@localhost = password('new_pwd');
# for example
mysql> set password for root@localhost = password('123'); 
```

### enable remote connection
```shell script
cat /etc/mysql/mariadb.cnf
## you'll see all config cnf for mysql. like 
## 'includedir /etc/mysql/conf.d/' and 'includedir /etc/mysql/mariadb.conf.d/'
vim /etc/mysql/mariadb.conf.d/50-server.cnf
## you will see 'bind-address = 127.0.0.1' and comment it out using the # character at this line's beginning:
service mysql restart


## if it still don't work. connect to mysql
mysql -uroot -p

## Not that 'password' need to be replaced with your root's password
GRANT ALL PRIVILEGES ON *.* TO 'root'@'%' IDENTIFIED BY 'password' WITH GRANT OPTION;
FLUSH PRIVILEGES;
exit;


## restart mysql
service mysql restart
```
