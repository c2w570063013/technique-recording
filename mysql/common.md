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