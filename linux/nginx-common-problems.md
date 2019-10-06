### 403 Forbidden -------- nginx/1.14.1
Checkout the files permission you are accessing. Change the owner to www-data
```shell script
# change all current files owner to www-data 
chown www-data:www-data ./*

# change single file owner 
chown www-data:www-data ClashA-universal-release-0.0.1-beta4.apk
```