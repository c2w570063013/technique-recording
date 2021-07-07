phpstorm 终端翻墙之后 入在.zshrc(安装了oh my zsh) 加入 
```shell
export https_proxy=http://127.0.0.1:7890 http_proxy=http://127.0.0.1:7890 all_proxy=socks5://127.0.0.1:7890
```
.导致phpstorm也会跟着翻墙。(mysql也会)。所以mysql模块在连接一些国内的数据库，导致走了代理。
解决方案:

暂时诸事掉~/.zshr 的
```shell
export https_proxy=http://127.0.0.1:7890 http_proxy=http://127.0.0.1:7890 all_proxy=socks5://127.0.0.1:7890
```