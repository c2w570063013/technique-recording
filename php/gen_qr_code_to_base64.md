original way 
```php
public function consumer_code(){
        import('@.ORG.phpqrcode');
        $code = D('Village_group')->get_code($this->user_session['uid']);
        QRcode::png($code,false,2,8,2);
}
```
to base 64
```php
public function consumer_code(){
        ob_start();
        import('@.ORG.phpqrcode');
        $code = D('Village_group')->get_code($this->user_session['uid']);
        QRcode::png($code,false,2,8,2);
        //gen to base64
        $imageString = base64_encode( ob_get_clean() );
        ob_end_clean();
        header('Content-Type: text/html');//not sure if it's neccessary
        return_json(0, 'success', [
            'qrCode' => $imageString
        ]);
    }
```
