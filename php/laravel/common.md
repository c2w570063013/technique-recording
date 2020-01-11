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