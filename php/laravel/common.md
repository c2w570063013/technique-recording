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
laravel 动态获取env 文件
```shell script
https://www.cnblogs.com/shiwenhu/p/12461048.html
```

How to setup Multi-Auth for Laravel APIs
```shell
https://medium.com/@toby.okeke/how-to-setup-multi-auth-for-laravel-apis-cb4203d3d82e
```

laravel passport token remember add a json hearder
```shell
# on postman you should add the following to the header
accept appliction/json
# if you add this following to the hearder, it won't work!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!it took me a long time to figure it out!!
Content-Type appliction/json
```

laravel8 error handling example
```php
namespace App\Exceptions;

use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Illuminate\Http\Request;
use Throwable;

class Handler extends ExceptionHandler
{
    /**
     * A list of the exception types that are not reported.
     *
     * @var array
     */
    protected $dontReport = [
        //
    ];

    /**
     * A list of the inputs that are never flashed for validation exceptions.
     *
     * @var array
     */
    protected $dontFlash = [
        'password',
        'password_confirmation',
    ];

    /**
     * Register the exception handling callbacks for the application.
     *
     * @return void
     */
    public function register()
    {
        $this->reportable(function (Throwable $e) {
            //
        });
        # pay attention to here
        $this->renderable(function(Throwable $e, Request $request){
            dd($e->getMessage(),$request->all());
        });
    }
}
```

laravel get raw sql query 
```phpt
DB::enableQueryLog(); // Enable query log
dd(DB::getQueryLog()); // Show results of log
```

```shell
# notice that rank need to add `` 
$orm = self::query()->selectRaw('id,title,`rank`,is_enable,create_time,update_time,type,image')
```

laravel Class 'Redis' not found
```shell
apt install php-redis
```

composer 设置阿里云源
```shell
composer config repo.packagist composer https://mirrors.aliyun.com/composer/

# 取消当前项目配置
composer config --unset repos.packagist

```

composer required specified version
```shell
composer require guzzlehttp/guzzle 7.0.1
```

composer remove package 
```shell
composer remove myxtype/ethereum-client
```

composer require package 报版本兼容问题，解决方式
```shell
# 报错大概如下
myxtype/ethereum-client dev-master requires guzzlehttp/guzzle ^6.3 -> found guzzlehttp/guzzle[6.3.0, ..., 6.5.x-dev] but it conflicts with your root composer.json require (7.0.1).
# 解决方式 将原先的package 加as
"guzzlehttp/guzzle": "6.5.5 as 7.0",
# 再执行 composer update

# 最后再运行安装那个package
composer require iexbase/tron-api
```

后端无法接收到前端传的数据,前端传的是raw数据
![img.png](img.png)
则前端必须在header上 加上
```shell
Content-Type: application/json
```
