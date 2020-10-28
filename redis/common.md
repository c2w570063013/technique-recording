enable redis for remote access
```shell script
# edit /etc/redis/redis.conf, change bind 127.0.0.1 to 
bind 0.0.0.0

# login to redis and set password
redis-cli
CONFIG SET requirepass 'password'
exit
redis-cli
auth password
# done!
```