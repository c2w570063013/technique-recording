### SSH connect to remote server without using pub_key
1.create a file at '/usr/local/bin/' or somewhere else where the $PATH was assigned
```shell script
#!/usr/bin/expect
set user root  
set ipaddress your_address
set passwd your_password
set timeout 30

spawn ssh $user@$ipaddress
expect {
    "*password:" { send "$passwd\r" }
    "yes/no" { send "yes\r";exp_continue }
}
interact
```
>Notice: if you see something like this after you reinstall the server:
```shell script
@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@
@    WARNING: REMOTE HOST IDENTIFICATION HAS CHANGED!     @
@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@
``` 
then regenerate a ssh-key like:
```shell script
ssh-keygen -R 45.76.208.129 # the last param is your server_ip
```

### prevent auto disconnect
add two lines to '/etc/ssh/sshd_config'
```shell script
ClientAliveInterval 30
ClientAliveCountMax 3
```