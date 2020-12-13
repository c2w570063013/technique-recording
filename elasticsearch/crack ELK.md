links:

https://www.azurew.com/elk/3750.html

critical move:
```shell script
#1. download x-pack-core-7.xx.jar
#1.1 download crack files at: https://pan.baidu.com/s/1EjVU6fOFCJJtOtA87NuDHw 
/usr/share/elasticsearch/modules/x-pack-core/x-pack-core-7.5.0.jar

jar -xvf x-pack-core-7.5.0.jar

# 2.replace
LicenseVerifier.class 路径在 /org/elasticsearch/license/LicenseVerifier.class
XPackBuild.class 路径在 /org/elasticsearch/xpack/core/XPackBuild.class

# 3.repack (in current dir)
jar cvf x-pack-core-7.5.0.jar *

# add a line to /etc/elasticsearch/elasticsearch.yml
xpack.security.enabled: false

# 4.restart 
systemctl restart kibana elasticsearch

# 5.import licence 
 curl -XPUT -u elastic 'http://localhost:9200/_xpack/license' -H "Content-Type: application/json" -d @license.json

# 6.edit /etc/elasticsearch/elasticsearch.yml again.
xpack.security.enabled: true
xpack.security.transport.ssl.enabled: true

# restart es
systemctl restart elasticsearch

#7. setting password
/usr/share/elasticsearch/bin/elasticsearch-setup-passwords interactive

#8. edit kibana config vim /etc/kibana/kibana.yml
elasticsearch.username: "elastic"
elasticsearch.password: "your password"

# restart 
systemctl restart kibana elasticsearch
```