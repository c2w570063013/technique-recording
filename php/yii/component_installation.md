install symfony var_dump
```shell script
composer require --dev symfony/var-dumper
```

adding helper.
```shell script
#1. add following code snippet to composer.json

"autoload": {
        "files": [
            "helpers/helper.php",
            "helpers/helper2.php"
        ]
    },

#2. execute
composer du
```