# Chrome Data PHP Wrapper
A PHP wrapper for the Chrome Data Webservices. Feedback or bug reports are appreciated.

## Get started

---

### Installation

```
include('Chromedata.php');
```

### Initialize the class

```php
use TANIOS\Chromedata\Chromedata;
$chromedata = new Chromedata(array(
    'number'      => 'NUMBER',
    'secret'   => 'SECRET',
    'country' => 'COUNTRY',
    'language' => 'LANGUAGE'
));
```


### Get info by VIN

```php
$vin = "VIN_NUMBER";
$response = $chromedata->getCarInfoByVin($vin);
print_r($response);
```


## Credits

Copyright (c) 2017 - Programmed by Sleiman Tanios