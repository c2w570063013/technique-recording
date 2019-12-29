Modify tables with laravel migration
```shell script
# 1.creat a new migration
php artisan make:migration modify_table
# 2.modify tables on the new created file, for example:
public function up()
    {
        if(!Schema::hasTable('test3')){
            Schema::rename('test2', 'test3');
        }
        Schema::table('test3', function(Blueprint $table){
//            $table->string('test5')->comment('test2');
            $table->renameColumn('test5', 'test6');
        });

    }
# 3:execute the migrate command
php artisan migrate
## tip: if you want to do more changes on your exist tables, you can just change series number of the new created migratation above. i.g.:
2019_12_20_061259_modify_table.php -> 2019_12_20_061260_modify_table.php 
# then execute the command:
php artisan migrate

```
laravel tables relation
```shell script
public function latestMessages()
    {
        return $this->model::query()
            ->select('content', 'author', 'created_at', 'tv_series_id')
            ->limit(5)
            ->get();
    } 

class MessagesBoard extends Model
{
    protected $table = 'messages_board';

    public function series()
    {
        return $this->belongsTo('App\Models\Series', 'tv_series_id');
    }
}
```
like the code showed above, 'tv_series_id' is necessary to be selected to be able to call the 
'series' relationship... 'tv_series_id' is the foreign_key for the message table