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
Done!