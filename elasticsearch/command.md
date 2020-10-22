see specific index shard info
```shell script
GET _cat/shards/redfish-log?v
```

see all shards info
```shell script
GET _cat/shards
```

see indexes status
```shell script
GET _cat/indices?v
```

see nodes info 
```shell script
GET /_nodes
```

start filebeat at background
```shell script
cd filebeat/
./filebeat -c filebeat.yml &

# ps start filebeat at current window
./filebeat -e
```