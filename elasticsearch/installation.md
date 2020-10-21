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

### upgrade elasticsearch on centos
```shell script
wget https://artifacts.elastic.co/downloads/elasticsearch/elasticsearch-7.9.2-x86_64.rpm
wget https://artifacts.elastic.co/downloads/elasticsearch/elasticsearch-7.9.2-x86_64.rpm.sha512
shasum -a 512 -c elasticsearch-7.9.2-x86_64.rpm.sha512
# if there is shasum command, install it
yum install perl-Digest-SHA

### upgrade es
rpm -Uvh elasticsearch.rpm

### install. PS: it's not a command for upgrading, or you'll get lot's of conflicts 
sudo rpm --install elasticsearch-7.9.2-x86_64.rpm
```