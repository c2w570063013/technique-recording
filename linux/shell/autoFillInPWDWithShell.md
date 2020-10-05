Pay attention to "send "$passwd\r"" <br>
'\r' means enter, if you want to enter pwd within your shell script you need to use expect,and spawn like the below code.
```shell script
#!/usr/bin/expect

set passwd "wayne"

spawn /root/test/test.bash
expect {
"Enter password:" { send "$passwd\r" }
}
interact
```