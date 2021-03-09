Elasticsearch: Bulk request throws error 
```json
"error" : {
    "root_cause" : [
      {
        "type" : "illegal_argument_exception",
        "reason" : "The bulk request must be terminated by a newline [\n]"
      }
    ],
    "type" : "illegal_argument_exception",
    "reason" : "The bulk request must be terminated by a newline [\n]"
  },
  "status" : 400
```
execute:
```shell script
curl -H "Content-Type: application/json" -XPOST "localhost:9200/bank/_bulk?pretty&refresh" --data-binary "@accounts.json"
```
solution: Add empty line at the end of the JSON file and save the file and then try to run the below command

###check weather kibana process is running 
```shell script
ps -ef|grep kibana
ps -aux|grep kibana
```
### check es with the authentication 
```shell script
curl --user username:ped -X GET 'http://localhost:9200/_cat/indices?v'
```
### general logstash datetime formats\
```shell script
ISO8601
```

fix a problem by running this:
>ps: this action would add [2] total shards, but this cluster currently has [1000]/[1000] maximum shards open
```shell
curl --user elastic:xPm1htPa1CdmnTwJylZP -X PUT http://172.21.234.1:9200/_cluster/settings -H "Content-Type: application/json" -d '{ "persistent": { "cluster.max_shards_per_node": "3000" } }'
```