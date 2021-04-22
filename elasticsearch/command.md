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
list specific indexes with prefix
```shell script
GET /_cat/indices/logstash-zk*?v&s=index
```
show indices storage usage
```shell script
GET _cat/allocation?v&pretty
```
delete by query
```shell script
POST /logstash-sealer-*/_delete_by_query
{
  "query": {
    "bool": {
      "must": [
        {
          "match": {
            "log_type": "failed"
          }
        }
      ],
      "must_not": [
        {
          "match": {
            "message": "replace"
          }
        }
      ]
    }
  }
}
```

count aggregation bucket number:
```shell
GET /logstash-sealer*/_search
{
  "aggs": {
    "aaa": {
      "terms": {
        "field": "host.name.keyword",
        "size": 1
      }
    },
    "count":{
      "cardinality": {
        "field": "host.name.keyword"
      }
    }
  },
  "query": {
    "range": {
      "timestamp": {
        "gte": "2020-12-01",
        "lte": "2020-12-28"
      }
    }
  }, 
  "size": 0
}
```

Cluster Setting
解决:
this action would add [2] total shards, but this cluster currently has [999]/[1000] maximum shards open
```shell script
GET _cluster/settings


PUT _cluster/settings
{
  "persistent": {
    "cluster.max_shards_per_node": "3000"
  }
}
```
解决返回最大条数10000条
```shell
PUT _settings
{
  "index.max_result_window": 200000
}
```
elasticsearch add mapping field
```shell
PUT logstash-sealer-zktime*/_mapping
{
  "properties": {
    "time.hm": {
      "type": "long"
    }
  }
}
```