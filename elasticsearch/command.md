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

start logstash which was installed by deb package
```shell script
cd /usr/share/logstash
bin/logstash -f logstash.conf

# in reality we should run it with absolute path
bin/logstash -f /etc/logstash/conf.d/redis.conf
## input to darkwhole 
bin/logstash -f /etc/logstash/conf.d/redis.conf >/dev/null &
## also see
/dev/null 2>&1

# On deb and rpm, you place the pipeline configuration files in the /etc/logstash/conf.d directory. 
# Logstash tries to load only files with .conf extension in the /etc/logstash/conf.d directory and ignores all other files
```  
let filebeat recollect logs from the beginning 
```shell script
cd filebeat/
rm data/registry

# ps: Since Filebeat stores the state of each file it harvests in the registry, deleting the registry file forces Filebeat to read all the files it’s harvesting from scratch.
./filebeat -e -c filebeat.yml -d "publish"
```