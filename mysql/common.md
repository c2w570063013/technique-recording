### Grant permissions for a user
```shell script
GRANT ALL PRIVILEGES ON database.table TO 'user'@'localhost';
e.g.
GRANT ALL PRIVILEGES ON `bit_trade_test`.* TO 'ohdear_ci'@'localhost';
```

### export mysql data
```shell script
mysqldump -u [username] -p [database name] > [database name].sql

sudo mysqldump -u root -p bit_trade_test > bit_trade_test.sql
```

### import mysql data
```shell script
mysql -u [username] -p newdatabase < [database name].sql

mysql -u root -p test_tv_shows < bit_trade_test.sql
```

### import to remote db
```shell
mysql -h 11.2231.121212 -u root -p db_test < new_db.sql 
```

### connect to remote mysql
````shell script
mysql -h 119.25.49.110 -P 3306 -u root -p
````

### change mysql 5.7 password
```shell script
use mysql;
update user set authentication_string=PASSWORD("your password") where User='root';
flush privileges;
```

### mysql check storage path 
```shell script
show variables like '%dir%';
# you'll see 'datadir'
```
### mysql set variable
```shell script
set @latestHeight = (select height from block_reward order by id desc limit 1);
select count(*) from block_reward where miner='f02770' and height>@latestHeight;
```

### create a new mysql user and grant all permissions to this user on a specific database
```shell
create user 'remote-user2'@'%' identified by 'new_password';
grant ALL PRIVILEGES on distributed_cloud.* to 'remote-user2'@'%';
FLUSH PRIVILEGES;
```

### connect to a remote mysql
```shell
mysql -u root -P 3306 -h 61.141.65.181 -p
```

Importing database: Use mysql_version to avoid Unknown collation: 'utf8mb4_0900_ai_ci'
```shell
# fix
Opened the dump.sql file in Notepad++ and hit CTRL+H to find and replace the string “utf8mb4_0900_ai_ci” and replaced it with “utf8mb4_general_ci“.
```

laravel could not find driver mysql 
```shell
apt install php-mysql
```