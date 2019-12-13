### 1.find out usage disk space of server  
```shell script
df -T -h /
```

### 2.find out the memory usage
```shell script
free -h
```

### 3.connect to remote server over proxy
ssh -o ProxyCommand="nc -X 5 -x proxy.net:1080 %h %p" user@server.net

For example:
```shell script
ssh -o ProxyCommand="nc -X 5 -x 127.0.0.1:7891 %h %p" root@34.80.137.206
```

### 4.scp
To copy a file from a local to a remote system run the following command:
```shell script
scp file.txt remote_username@10.10.0.2:/remote/directory
```

### 5.inject content of a file into another file
```shell script
cat /tmp/id_rsa.john.pub >> ~/.ssh/authorized_keys
``` 