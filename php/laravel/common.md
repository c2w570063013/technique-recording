check out if laravel are able to connect to mysql
```shell script
//    try {
//
//        \Illuminate\Support\Facades\DB::connection()->getPdo();
//    } catch (\Exception $e) {
//        die("Could not connect to the database.  Please check your configuration. error:" . $e );
//    }

```
get id from url on blade
```shell script
#route
Route::get('category/{id?}', 'HomeController@categories');

#blade
$request->route('id');
```
share a laravel website project to the local network
```shell script
sudo php artisan serve --port=80 --host=192.168.0.111
``` 

.php is not allowed in the route suffix when using https

laravel 访问除主页之外404的问题 <br>
解决: 在nginx配置中加入以下内容
```shell script
location / {
    try_files $uri $uri/ /index.php?$query_string;
}
```
将 Laravel 用户密码加密方式修改为 md5+salt 方式
```shell script
https://learnku.com/articles/23760
```