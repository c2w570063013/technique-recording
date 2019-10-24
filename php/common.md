```php
//公用接口返回数据结构
function return_json($code,$msg='',$data = '')
{
    $array = array();
    $array['code'] = $code;
    $array['data'] = $data;
    $array['msg'] = $msg;
    header('Content-Type:application/json; charset=utf-8');
    header('Access-Control-Allow-Origin:*');
    header('Access-Control-Allow-Methods:OPTIONS, GET, POST, DELETE');
    exit(json_encode($array));
}
```