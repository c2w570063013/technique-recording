```shell script
php -i | grep php.ini                      # check the php.ini file location
sudo echo "extension=swoole.so" >> php.ini  # add the extension=swoole.so to the end of php.ini
php -m | grep swoole                       # check if the swoole extension has been enabled

```