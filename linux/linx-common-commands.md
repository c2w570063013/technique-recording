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
### 查看硬盘剩余空间
```shell script
df -hl #查看磁盘剩余空间 
df -h #查看每个根路径的分区大小 
du -sh [目录名] #返回该目录的大小 
du -sm [文件夹] #返回该文件夹总M数
```
see more:

https://blog.csdn.net/xiyanlgu/article/details/47007501

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

### linux mount new disk
For instance:
```shell script
# mount sdb1 to /mnt/usb
mount /dev/sdb1 /mnt/usb

# umount sdb1
 umount /mnt/usb
```

https://blog.csdn.net/electrocrazy/article/details/61681227
### mount a 4t disk
https://www.cnblogs.com/yongpan/p/10919511.html

### linux delete history 
echo > /root/.bash_history
source /root/.bash_history
history -c

### linux suffered from computer virus and fix it, tsm
https://blog.csdn.net/adsszl_no_one/article/details/105344467

### linux get malicious mining virus
key: kswapd0
https://codenie.github.io/post/kswapd0-wa-kuang-bing-du-cha-sha-guo-cheng/

### check out ports occupation
```shell script
lsof -i:5601
lsof -i|grep 5601
netstat -tunlp|grep 5601
```

### check history login records
```shell script
who /var/log/wtmp
```

### check the specific running process
```shell script
ps aux | grep mysqld 
```

### prevent automatically disconnection
```shell script
ssh -o ServerAliveInterval=30 user@host    
```

### linux kill pts
```shell script
# you'll see what pts you are currently using
tty
# then you can kill it 
pkill -9 -t pts/3
```

### Install deb package on debian
```shell script
sudo dpkg -i /path/to/deb/file
sudo apt-get install -f
```

### solve past content to terminal with indent problem
```shell script
# using echo 
echo '
content
' > file.text
```