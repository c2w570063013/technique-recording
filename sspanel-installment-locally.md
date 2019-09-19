### Install sspanel locally on vagrant--debian 9


### Preface
Install this project locally is quite painful for me at the 
beginning. In 
order to help most of you guys avoid the wrong path and vast time I 
took I write this article for you particularly. To make the local 
develop env unified with the production env 
I use 'vagrant'+'debian 9 box'. 

> **Note:** if you are in China, you'd better make your local environment 
able to pass the GFW or you will get a extremely slow network speed. 
 
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
Check out ''; 

