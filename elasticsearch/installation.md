Install elasticsearch on debian:
https://www.elastic.co/guide/en/elasticsearch/reference/current/deb.html
### start or stop elasticsearch
```shell script
sudo systemctl start elasticsearch.service
sudo systemctl stop elasticsearch.service
```
### elasticsearch config file location
```shell script
/etc/elasticsearch/elasticsearch.yml
```
### enable remote access. edit '/etc/elasticsearch/elasticsearch.yml'
```shell script
transport.host: localhost 
transport.tcp.port: 9300 
http.port: 9200
network.host: 0.0.0.0
```


Install kibana on debian:
https://www.elastic.co/guide/en/kibana/current/deb.html#_sysv_init_vs_systemd
### start or stop elasticsearch
```shell script
sudo systemctl start kibana.service
sudo systemctl stop kibana.service
```
### kibana config file location
```shell script
/etc/kibana/kibana.yml
```