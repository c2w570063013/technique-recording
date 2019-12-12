### 403 Forbidden -------- nginx/1.14.1
Checkout the files permission you are accessing. Change the owner to www-data
```shell script
# change all current files owner to www-data 
chown www-data:www-data ./*

# change single file owner 
chown www-data:www-data ClashA-universal-release-0.0.1-beta4.apk
```


### xxx is not in the sudoers file. This incident will be reported
1)添加文件的写权限。也就是输入命令"chmod u+w /etc/sudoers"。
 
2)编辑/etc/sudoers文件。也就是输入命令"vim /etc/sudoers",输入"i"进入编辑模式，找到这一 行："root ALL=(ALL) ALL"在起下面添加"xxx ALL=(ALL) ALL"(这里的xxx是你的用户名)，然后保存（就是先按一 下Esc键，然后输入":wq"）退出。

3)撤销文件的写权限。也就是输入命令"chmod u-w /etc/sudoers"。  