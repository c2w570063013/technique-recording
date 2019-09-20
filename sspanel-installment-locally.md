### Install sspanel locally on vagrant--debian 9


### Preface
Install this project locally is quite painful for me at the 
beginning. In 
order to help most of you guys avoid the wrong path and vast time I 
took I write this article for you particularly. To make the local 
develop env unified with the production env 
I use 'vagrant'+'debian 9 box'. 

> **Note:** if you are in China, you'd better make your local environment 
able to pass the GFW or you will get really annoyed by the extremely slow
>network speed.  
 
#### 1.Install vagrant and virtual box
- Check out https://www.vagrantup.com/ and download the right vagrant version for
your OS.
- Head to https://www.virtualbox.org/ to get the latest VirtualBox 

#### 2. Add debian box to vagrant and edit config
- Create your folder for holding Vagrant config file. 
Typing the following commands a file named 'Vagrantfile' will be 
generated in your current folder which is primarily 
for vagrant configuration. 
```shell script
mkdir your_folder
cd your_folder
vagrant int generic/debian9 # checkout more debian box on https://app.vagrantup.com/debian/boxes/stretch64
```

- Edit config 'Vagrantfile'
```yaml
Vagrant.configure("2") do |config|
...other config
config.vm.box = "generic/debian9"
config.vm.network "forwarded_port", guest: 80, host: 8080
config.vm.network "private_network", ip: "192.168.33.10"
config.vm.synced_folder "/Users/waynechen/code", "/home/vagrant/code",
    owner: "www-data", group: "www-data"

end
```
>**Note**: setting owner and group to 'www-data' is vital for making
>this project work on local vagrant environment. I will explain it later.  

- Add debian box by typing the command below 
then you will see a selection asking 
which Virtual machine you are using and hit '4' to make it fit into your 
virtual box. This may take a while to finish downloading and installing
debian box.
```shell script
vagrant box add generic/debian9   
```

- Start and import vagrant box to vitual box. Connect 
to this vitual box debian system
```shell script
vagrant up
vagrant ssh 
```

#### 3. Passing the GFW on vagrant box (if you are not in mainland China, just pass this step.) 
Check out https://github.com/c2w570063013/technique-recording/blob/master/Passing-GFW-on-terminal.md; 

#### 4. Update source list and install some fundamental essential packages.  
```shell script
apt update && apt upgrade -y
apt install -y curl vim wget unzip apt-transport-https lsb-release ca-certificates git
```

#### 5. Add Backports source for the incoming packages installing
```shell script
cat >> /etc/apt/sources.list.d/backports.list << EOF
deb http://deb.debian.org/debian $(lsb_release -sc)-backports main
deb-src http://deb.debian.org/debian $(lsb_release -sc)-backports main
EOF

apt -t stretch-backports update && apt -y -t stretch-backports upgrade
```

#### 6. Set system time as UTC+8
```shell script
ln -snf /usr/share/zoneinfo/Asia/Shanghai /etc/localtime && echo Asia/Shanghai > /etc/timezone
```

#### 7. Install the latest nginx
```shell script
apt install curl gnupg2 ca-certificates lsb-release
echo "deb http://nginx.org/packages/debian `lsb_release -cs` nginx"  |  tee /etc/apt/sources.list.d/nginx.list
curl -fsSL https://nginx.org/keys/nginx_signing.key |  apt-key add -
apt-key fingerprint ABF5BD827BD9BF62
apt update
apt install nginx
apt install -y nginx-extras
nginx -v
```

#### 8. Install php7.3
```shell script
wget -O /etc/apt/trusted.gpg.d/php.gpg https://packages.sury.org/php/apt.gpg
sh -c 'echo "deb https://packages.sury.org/php/ $(lsb_release -sc) main" > /etc/apt/sources.list.d/php.list'

apt update
apt install -y php7.3-fpm php7.3-mysql php7.3-curl php7.3-gd php7.3-mbstring php7.3-xml php7.3-xmlrpc php7.3-opcache php7.3-zip php7.3 php7.3-json php7.3-bz2 php7.3-bcmath
```

>ps: the command for restarting php is 'systemctl restart php7.3-fpm'

#### 9. Install Percona Server 8.0
>note: Percona Server is a distribution published by Oracle which is similar to MySQL Enterprise distribution.
 
Be aware that Percona Server and MySQL are completely compatible.

#### 10.Install Percona Server
```shell script
wget https://repo.percona.com/apt/percona-release_latest.$(lsb_release -sc)_all.deb
dpkg -i percona-release_latest.$(lsb_release -sc)_all.deb
percona-release setup ps80

apt install -y percona-server-server
```
During the installation you will see a pop up window of 
selection for choosing the encryption mode, pick the second option.

##### after the above steps, you have completed necessary environment installation for the project.

#### 11.Install SSPanel
```shell script
cd /var/www/
mkdir your_domain
cd your_domain
git clone -b master https://github.com/Anankke/SSPanel-Uim.git tmp && mv tmp/.git . && rm -rf tmp && git reset --hard
git config core.filemode false
wget https://getcomposer.org/installer -O composer.phar
php composer.phar
php composer.phar install
cd ../
chmod -R 755 your_domain/
chown -R www-data:www-data your_domain/
```
>Ps: In fact, the last two commands above don't work on vagrant box, 
>this is the reason why you have to config the 'Vagrantfile'
>to make the owner and group to be 'www-data' as mentioned before.

#### 12.Configure nginx file
Create /etc/nginx/sites-enabled/your_domain.conf
```shell script
server {  
        listen 80;
        listen [::]:80;
        root /var/www/your_domain/public; # change to your domain
        index index.php index.html;
        server_name your_domain; # change to your domain

        location / {
            try_files $uri /index.php$is_args$args;
        }

        location ~ \.php$ {
            include snippets/fastcgi-php.conf;
            fastcgi_pass unix:/run/php/php7.3-fpm.sock;
        }
}
``` 

restart nginx
```shell script
nginx -t
nginx -s reload
``` 

#### 13. Create database and import data
```shell script
mysql -u root -p
mysql>CREATE DATABASE your_database;
mysql>use your_database;
mysql>source /var/www/your_database/sql/glzjin_all.sql;
mysql>exit
```

#### 14. Configure website
````shell script
cd /var/www/your_domain/
cp config/.config.example.php config/.config.php
vim config/.config.php
````
Make sure you set the right database which is fitting to your host.

#### 15. Create admin and  sync users
```shell script
php xcat createAdmin
php xcat syncusers
php xcat initQQWry
php xcat resetTraffic
php xcat initdownload
```

#### 16. Configure cron job
```shell script
crontab -e

30 22 * * * php /var/www/your_domain/xcat sendDiaryMail
0 0 * * * php -n /var/www/your_domain/xcat dailyjob
*/1 * * * * php /var/www/your_domain/xcat checkjob
*/1 * * * * php /var/www/your_domain/xcat syncnode
```

#### 17. Change your local host
Open hosts
```shell script
vim /etc/hosts
```
Add a line to hosts:
```shell script
192.168.33.10   your_domain
```

### All settings are done, learn more? 
Checkout https://blog.anank.ke/w/SSPanel_with_LNMP or 
http://webcache.googleusercontent.com/search?q=cache:vc5MHRG2uDgJ:https://blog.anank.ke/w/SSPanel_with_LNMP&hl=zh-CN&gl=hk&strip=1&vwsrc=0 