### remove linked link
```shell script
valete unlink public
```

### mac valet 502 Bad Gateway nginx/1.15.8
```shell script
composer global update
valet install
```

problem:
```shell script
In brew.php line 251.
Unable to determine linked PHP when parsing '7.4'
```
solution:
```shell script
vim ~/.composer/vendor/laravel/valet/cli/Valet/Brew.php
# add a line to 'const SUPPORTED_PHPVERSIONS'
'php@7.4' 
```
original link:
https://dev.to/robertobutti/laravel-wvalet-php-7-4-homebrew-2e2d