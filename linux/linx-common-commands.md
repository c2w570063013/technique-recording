# linux compressing and decompressing
```shell script
#（注：tar是打包，不是压缩！）
# 解包
tar xvf FileName.tar
# 打包
tar cvf FileName.tar DirName

# 解压
unzip FileName.zip
# 压缩
zip FileName.zip DirName

#see more: https://blog.csdn.net/tjcyjd/article/details/78267219
```

### find out usage disk space of server  
```shell script
df -T -h /
```

### find the size of a directory
```shell script
du -sh directory/
``` 


### find out the memory usage
```shell script
free -h
```

### connect to remote server over proxy
ssh -o ProxyCommand="nc -X 5 -x proxy.net:1080 %h %p" user@server.net

For example:
```shell script
ssh -o ProxyCommand="nc -X 5 -x 127.0.0.1:7891 %h %p" root@34.80.137.206
```

### scp
To copy a file from a local to a remote system run the following command:
```shell script
scp file.txt remote_username@10.10.0.2:/remote/directory
## using proxy
scp -o ProxyCommand="nc -X 5 -x 127.0.0.1:7891 %h %p" bit_trade_test.sql git@66.42.40.223:/home/git
## scp a folder 
scp -o -r ProxyCommand="nc -X 5 -x 127.0.0.1:7891 %h %p" bit_trade_test.sql git@66.42.40.223:/home/git
```
Copy a directory from remote to local
```shell script
scp -r user@your.server.example.com:/path/to/foo /home/user/Desktop/
# With a port 
scp -P 2222 -r user@your.server.example.com:/path/to/foo /home/user/Desktop/
```


### inject content of a file into another file
```shell script
cat /tmp/id_rsa.john.pub >> ~/.ssh/authorized_keys
``` 

### ssh auto disconnect solution
```shell script
vim /etc/ssh/sshd_config
# change the following item 
ClientAliveInterval  60
```

### add user to root group
```shell script
adduser wayne sudo
```

### check number of cpu core
```shell script
nproc --all
```

### display memory usage ranking 
```shell script
top 
# then press "shift+m"
``` 

### add a directory to a path
```shell script
#Edit .bashrc in your home directory and add the following line:
export PATH="/path/to/dir:$PATH"
# and then source your .bashrc
source ~/.bashrc
```

### check whether a port is available 
```shell script
telnet ip_address port
# for instance
telnet 923.12.3312.2 8080
```