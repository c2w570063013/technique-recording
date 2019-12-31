vim '~/.zshrc', add lines to the end of this file:
```shell script
export http_proxy=socks5://127.0.0.1:1086; export https_proxy=socks5://127.0.0.1:1086; export all_proxy=socks5://127.0.0.1:1086
```
> notice: you should checkout your vpn app's socks5 port according to yours.
>PS: I am using the 'OH MY ZSH' on my terminal 