1.Buy ssl at namecheap https://www.namecheap.com

2.Generate a Certificate Signing Request (CSR) on your host server
```shell script
openssl req -new -newkey rsa:2048 -nodes -keyout server.key -out server.csr
```
>Notice: you have to input the 'server name' while on the 
>process of filling out the basic info. e.g.: crosseveryconrner.com

3.Copy the server.csr generated on last step to the https://www.namecheap.com to activate the ssl.

4.Use the method of http-base method to finalize the ultimate validation. 
Which means you gotta download a file when choose method and upload this 
file to the root of website's directory's '.well-known/pki-validation' directory 
where you can access it by browsing 'your0domain.com/.well-known/pki-validation/1C6944F905C021ADSD4D4157C77A9AB4F3.txt'.
 Once you you see the content of that file means you got it.
 
5.'Save and change method'. you may need to wait for a while for getting the generated
ssl files.

6.Download certificate and upload them to your server.

7.Configure your nginx like this:
```shell script
server {  
        listen 443 ssl;
        #listen [::]:80;
        ssl_certificate /home/git/test_crosseverycorner_xyz/test_crosseverycorner_xyz.crt;
        ssl_certificate_key /root/test.crosseverycorner.xyz.key;
        ssl on;
        root /var/www/us-tv-shows/public; # change to your domain
        index index.php index.html;
        server_name test.crosseverycorner.xyz; # change to your domain

        location / {
            try_files $uri /index.php$is_args$args;
        }

        location ~ \.php$ {
            include snippets/fastcgi-php.conf;
            fastcgi_pass unix:/run/php/php7.3-fpm.sock;
        }
}

```  
>notice: [ssl_certificate] is the certificate uploaded to 
>the host server from where you bought it. 
>[ssl_certificate_key] is your local key which you generated in previous step.

8.reload your nginx
```shell script
nginx -t
nginx -s reload
```