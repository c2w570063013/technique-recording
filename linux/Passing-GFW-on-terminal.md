## Passing the GFW on linux and enable it work on terminal
> **Note:** If you want to have better user experience with using
>linux in China when downloading packages, 
>you either change source list to domestic source or
>keep using the international source list but 
>passing the GFW on your 
>terminal. This post will be focusing on the second option.

**Assuming you are using ubuntu or debian distributions**

**PS: You can change the source list to China domestic source first 
to ensure the speed. Head to https://mirror.tuna.tsinghua.edu.cn/help/debian/ 
and get the right source list**
- 0.switch to the domestic source list first
```shell script
mv /etc/apt/sources.list /etc/apt/sources.list_back
touch /etc/apt/sources.list # fill this file with domestic source
apt update
```

- 1.Install pip3
```shell script
apt update
apt install python3-pip
```

- 2.Install shadowsocks3 from github.
```shell script
pip3 install -U git+https://github.com/shadowsocks/shadowsocks.git@master
```
- 3.Check out the shadowscoks version
```shell script
sslocal --v
```
There you are, yu will see output 'Shadowsocks 3.0.0' on terminal 
after typing 'sslocal --v'

- 4.Create a config for connect to the shadowsocks server.
```shell script
vim /etc/shadowsocks/config.conf
```  

```json
{

    "server":"server_ip",
    "server_port":8388,
    "local_address":"127.0.0.1",
    "local_port":1080,
    "password":"mypassword",
    "timeout":300,
    "method":"aes-256-cfb"
}
```

5.Install polipo to make it be able to pass GFW on terminal
```shell script
apt-get install polipo
```
6.Edit polipo config
```shell script
vim /etc/polipo/config
```
Add these three lines:
```yaml
socksParentProxy = “localhost:1080”
socksProxyType = socks5
logLevel=4
```

- 7.Restart polipo
```shell script
service polipo stop
service polipo start
```

- 8.Start shadowsocks on background
```shell script
sslocal -c /etc/shadowsocks/config.json -d start
```

- 9.Export http_proxy and https_proxy on your current terminal to 
make it be able to cross GFW.
```shell script
export http_proxy=http://localhost:8123
export https_proxy=http://localhost:8123
```

- 10.Checkout your ip to see if it works.
```shell script
curl ip.gs
```
If you found this ip address is the extract proxy ip, 
congratulations. 

- 00.switch back to your former source list
 ```shell script
mv /etc/apt/sources.list /etc/apt/sources.list_back2
mv /etc/apt/sources.list_back /etc/apt/sources.list
apt update
```