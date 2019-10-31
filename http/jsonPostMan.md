### Sent data with Json on Postman.

#### Postman
Header:
```php
Content-Type    application/json
```

Body->raw:
```php
{"name":"hellow"}
```

### PHP backend
```php
$data = json_decode(file_get_contents('php://input'), true);
```