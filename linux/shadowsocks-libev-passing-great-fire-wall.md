Install shadowsocks-libev
```shell script
sudo apt update
sudo apt install shadowsocks-libev
sudo vim /etc/shadowsocks-libev/config.json
```
Configure shadowsocks-libev
```shell script
{
    "server":"server_ip",
    "server_port":8981,
    "local_port":1080,
    "password":"passwd",
    "timeout":60,
    "method":"aes-256-cfb"
}
``` 
Start shadowsocks-libev service
```php
ss-local -c /etc/shadowsocks-libev/config.json
```
Configure GFW
> supposed your ssr server post is '8985' 
```php
sudo iptables -I INPUT -p tcp --dport 8985 -j ACCEPT
sudo iptables -I INPUT -p udp --dport 8985 -j ACCEPT 
```
Install polipo to make it be able to pass GFW on terminal
```php
apt-get install polipo
```
Edit polipo config
```shell script
vim /etc/polipo/config
```
Add these three lines to this config file:
```yaml
socksParentProxy = "localhost:1080"
socksProxyType = socks5
logLevel=4
```

Restart polipo
```shell script
service polipo stop
service polipo start
service polipo status
```
Test!!1
```php
curl ip.gs
```