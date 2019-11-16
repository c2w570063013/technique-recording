### Mac $PATH file location:
```shell script
/etc/paths
```

### enable open sublime on terminal
```shell script
ln -s "/Applications/Sublime Text.app/Contents/SharedSupport/bin/subl" /usr/local/bin/subl
```

### Mac select vertically
```shell script
alt+shit+cursor
```

### Mac cross GFW on terminal
if you are using the original terminal, then you can just add 
'export https_proxy=http://127.0.0.1:7890;export http_proxy=http://127.0.0.1:7890;export all_proxy=socks5://127.0.0.1:7891export https_proxy=http://127.0.0.1:7890;export http_proxy=http://127.0.0.1:7890;export all_proxy=socks5://127.0.0.1:7891'

to your '.bash_profile' and 
```shell script
source .bash_profile
``` 
if you are using 'Oh My ZSH', then you need to add the above line to '.zshrc'