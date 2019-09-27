## Set up a shadowsocks server on VPS(with Ubuntu or Debian OS)
### 1.Install shadowsocks3.0
```shell script
apt install python3-pip
pip3 install -U git+https://github.com/shadowsocks/shadowsocks.git@master
ssserver --version
``` 
### 2.create a config for shadowsocks
```shell script
vim /etc/shadowsocks/config.conf
```  
```shell script
{
        "server":"::",
        "server_port":8388,
        "local_address": "127.0.0.1",
        "local_port":1080,
        "password":"your_password",
        "timeout":300,   
        "method":"aes-256-cfb",
        "fast_open": false
}
```
### 3.Start shadowsocks
Running on terminal manually
```shell script
ssserver -c /etc/shadowsocks/config.conf
```
Or running on background
```shell script
ssserver -c /etc/shadowsocks/config.conf -d start
``` 

> Notice: If server is pingable, the ssserver already opened and client still not able to connect to ssserver,
>then consider trying to change your server_port, like 8388 to 10102

### 4.Enable BBR to increase speed
Install BBR  
```shell script
wget --no-check-certificate https://github.com/teddysun/across/raw/master/bbr.sh && chmod +x bbr.sh && ./bbr.sh
```
Restart system
```shell script
reboot
```

### 5.Check out if BBR has already opened
```shell script
sysctl net.ipv4.tcp_available_congestion_control
```
If the output was like:
>net.ipv4.tcp_available_congestion_control = reno cubic bbr
 
means that BBR is running properly.