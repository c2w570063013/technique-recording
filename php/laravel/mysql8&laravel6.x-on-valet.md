For local development I use Laravel Valet. Recently, the brew packages have updated to MySQL 8 which changed a few things about its user management. One thing I continue to run into is this error when working with existing Laravel applications.
>SQLSTATE[HY000] [2054] The server requested authentication method unknown to the client

So, here’s the fix. You can create a user with the “old” authentication mechanisme, which the MySQL database driver for PHP still expects.
>CREATE USER 'ohdear_ci'@'localhost' IDENTIFIED WITH mysql_native_password BY 'ohdear_secret';
 GRANT ALL PRIVILEGES ON ohdear_ci.* TO 'ohdear_ci'@'localhost';

If you already have an existing user with permissions on databases, you can modify that user instead.

>ALTER USER 'ohdear_ci'@'localhost' IDENTIFIED WITH mysql_native_password BY 'ohdear_secret';

After that, your PHP code can once again connect to MySQL 8.


#### quoted from https://ma.ttias.be/mysql-8-laravel-the-server-requested-authentication-method-unknown-to-the-client/