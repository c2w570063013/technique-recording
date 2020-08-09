Install samba on Linux
```shell script
sudo apt-get install samba
```
Configure samba
```shell script
vim /etc/samba/smb.conf
``` 
Below [global] Add
```shell script
security = user
``` 
Add the below lines to the end of smb.conf
```shell script
[share]
path = /home/username/share
available = yes
browsealbe = yes
public = yes
writable = yes
```
Save and exist


Add a samba on system
```shell script
sudo adduser xxx
```
Add a Samba user
```shell script
sudo smbpasswd -a xxx
```
Restart samba
```shell script
sudo /etc/init.d/samba restart
# if below commmand doesn 't work. run following command.
/etc/init.d/samba-ad-dc restart
```
On mac's finder, press "cmd+K", Input "smb://samba_address"
>Notice: samba_address is your samba's ip address 


setting permission group to samba user
```shell script
usermod -a -G www-data(group) public_share(user)
```