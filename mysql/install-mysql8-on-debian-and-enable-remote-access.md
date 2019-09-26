## Install mysql8 on debian10 and enable remote access
install mysql8
```shell script
sudo apt update
sudo apt install gnupg
cd /tmp
wget http://repo.mysql.com/mysql-apt-config_0.8.13-1_all.deb
sudo dpkg -i mysql-apt-config_0.8.13-1_all.deb
sudo apt update
apt install mysql-server
```
during the installation, you will see:
```shell script
Select default authentication plugin:
    Use Strong Password Encryption (RECOMMENDED)
    Use Legacy Authentication Method (Retain MySQL 5.x ... 
``` 
choose the second option due to your local client may not support the first strong encryption type.

enable remote access after enter mysql:
```shell script
mysql -uroot -p
mysql> use mysql; 
mysql> update user set host='%' where user ='root';
mysql> FLUSH PRIVILEGES;
mysql> GRANT ALL PRIVILEGES ON *.* TO 'root'@'%'WITH GRANT OPTION;
mysql> FLUSH PRIVILEGES;
mysql> select host,user,plugin from user;# here you will see the root plugin was assigned with 'mysql_native_password' but the others are assigned with 'caching_sha2_password'. this would be the normal status 
mysql> exit
systemctl restart mysql
```
if still can't access mysql on your local client,the prompt was like:
```shell script
MySQL said: Authentication plugin 'caching_sha2_password' cannot be loaded: 
dlopen(/usr/local/lib/plugin/caching_sha2_password.so, 2): image not found
``` 
checkout the encryption of the root plugin:
```shell script
mysql> use mysql;
mysql> select host,user,plugin from user;
```
if you see that the plugin of root is 'caching_sha2_password' then 
change it to 'mysql_native_password' due to your client still not 
supports 'caching_sha2_password' plugin yet.
```shell script
mysql> update user set plugin='mysql_native_password' where user='root';
mysql> FLUSH PRIVILEGES;
mysql> exit
systemctl restart mysql
```  

> Notice: if still can't connect to the mysql server from remote, checkout your firewall
to see if the port '3306' is open.

# Uninstall mysql
```shell script
sudo apt-get remove --purge mysql-server mysql-client mysql-common -y
sudo apt-get autoremove -y
sudo apt-get autoclean
rm -rf /etc/mysql #Remove the MySQL folder:
sudo find / -iname 'mysql*' -exec rm -rf {} \; #Delete all MySQL files on your server:
```

original references from:

https://www.digitalocean.com/community/tutorials/how-to-install-the-latest-mysql-on-debian-10

https://blog.csdn.net/h996666/article/details/80921913

https://help.cloud66.com/maestro/how-to-guides/databases/shells/uninstall-mysql.html