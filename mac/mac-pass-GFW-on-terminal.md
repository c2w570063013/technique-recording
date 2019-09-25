# mac pass GFW on terminal

### 1.Install privoxy
```shell script
brew install privoxy
``` 

### 2.configure privoxy
```shell script
vim /usr/local/etc/privoxy/config
```
add two lines to the end of this file
```shell script
listen-address 0.0.0.0:8118
forward-socks5 / localhost:1086 .
```
>Notice: Have an eye on your cross-GFW proxy port, if you are using
>Clash X, you may change the port to '7891'

### 3.start privoxy
```shell script
sudo /usr/local/sbin/privoxy /usr/local/etc/privoxy/config
```

### 4.checkout if it works
```shell script
netstat -na | grep 8118
```

### 5.proxy http and https 
```shell script
export http_proxy='http://localhost:8118'
export https_proxy='http://localhost:8118'
``` 

#### 6.unset http_proxy,https_proxy
```shell script
unset http_proxy
unset https_proxy
```

### If you want it to be more convenient, add two function to ~/.bash_profile
```shell script
function proxy_off(){
    unset http_proxy
    unset https_proxy
    echo -e "已关闭代理"
}

function proxy_on() {
    export no_proxy="localhost,127.0.0.1,localaddress,.localdomain.com"
    export http_proxy="http://127.0.0.1:8118"
    export https_proxy=$http_proxy
    echo -e "已开启代理"
}
```
Take effect immediately
```shell script
source  ~/.bash_profile
```
  