```shell script
# change apps sources to China
cp sources.list sources.list_backup
vim sources.list
## then add domestic source links to 'sources.list'

apt update && apt upgrade
apt-get install sudo
chmod u+w /etc/sudoers
## add a line "you_name ALL=(ALL) ALL" below "root ALL=(ALL) ALL"
chmod u-w /etc/sudoers

#set up timezone to Shanghai
echo "y" |cp /usr/share/zoneinfo/Asia/Shanghai /etc/localtime 
apt-get install -y ntpdate;ntpdate cn.pool.ntp.org
date
# install basic tool
sudo apt install curl
sudo apt install vim
sudo apt install git
sudo apt install python3-pip
# Install shadowsocks3 from github.
pip3 install -U git+https://github.com/shadowsocks/shadowsocks.git@master
# setting sslocal to $PATH
vim ~/.bashrc
# add below line to the top of .bashrc
export PATH="/home/wayne/.local/bin:$PATH"
# enable it to be globle
source ~/.bashrc

#install mysql
wget http://repo.mysql.com/mysql-apt-config_0.8.13-1_all.deb
sudo dpkg -i mysql-apt-config_0.8.13-1_all.deb
# During the installation of MySQL apt config package, It will prompt to select MySQL version to install. Select the MySQL 8.0 or 5.7 option to install on your system.
sudo dpkg-reconfigure mysql-apt-config
sudo apt update 
sudo apt install nodejs npm
npm install -g pm2
sudo apt install mysql-server
sudo apt install redis-server
sudo systemctl restart mysql.service
sudo mysql_secure_installation
# install php7.4
sudo apt -y install lsb-release apt-transport-https ca-certificates 
sudo wget -O /etc/apt/trusted.gpg.d/php.gpg https://packages.sury.org/php/apt.gpg
echo "deb https://packages.sury.org/php/ $(lsb_release -sc) main" | sudo tee /etc/apt/sources.list.d/php.list
sudo apt update
sudo apt -y install php7.4
sudo apt install -y php7.4-fpm php7.4-mysql php7.4-curl php7.4-gd php7.4-mbstring php7.4-xml php7.4-xmlrpc php7.4-opcache php7.4-zip php7.4 php7.4-json php7.4-bz2 php7.4-bcmath php7.4-redis
# disable Apache service
sudo systemctl disable --now apache2
# fix showing Chinese problems
sudo apt-get install locales
sudo dpkg-reconfigure locales
## select "zh_CN UTF-8 UTF-8"

# install Chinese font
sudo apt-get install ttf-arphic-uming
sudo apt-get install ttf-wqy-zenhei

sudo apt install -y expect
sudo apt install speedtest-cli
sudo apt install nethogs


```

enable mysql root Accessible from remote
```shell script
mysql -u root -p
mysql>use mysql;
mysql>update user set host = '%' where user = 'root';
mysql>flush privileges;
mysql>select host, user from user;
```
 