nextcloud don't support types of movie encoding:
```shell script
.flv
.avi
.mkv
.wmv
.rmvb
``` 

After upload files to server manually, execute below command on nextcloud root dir:
```shell script
sudo -u www-data php occ files:scan --all #扫描所有用户的所有文件
```
> reference: 
https://www.hotbak.net/key/Nextcloud进阶应用用OCC命令给Nextcloud手动添加文件Qlog.html


error: failed to load resource: the server responded with status of 409(conflict). resolve:
```shell script
clear browser cache
```