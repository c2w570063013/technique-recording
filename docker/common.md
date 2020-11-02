remove image by tag
```shell script
# php is the image name and 7.2-fpm is the image tag
docker rmi php:7.2-fpm
```
# if you have changed any images version from docker-compose, you need to run:
```shell script
docker-compose build
```