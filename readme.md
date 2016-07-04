Get the current user IP in a quick way:

This is practivally https://gitlab.4com.de/filipac/ip, but with added php-docs.

```php
use Filipac\Ip;
<?php
$ip = Ip::get();
echo "Hello, your ip is {$ip}";
?>
```

Install using composer. Package name is ```4picht/ip```.

Add this to **composer.json**
```json
"require": {
    "4picht/ip": "~1.0"
}
```

