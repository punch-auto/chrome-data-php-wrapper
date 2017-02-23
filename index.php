<?

include('Chromedata.php');

use TANIOS\Chromedata\Chromedata;
$chromedata = new Chromedata(array(
    'number'      => 'NUMBER',
    'secret'   => 'SECRET',
    'country' => 'COUNTRY',
    'language' => 'LANGUAGE'
));

$vin = "VIN_NUMBER";
$response = $chromedata->getCarInfoByVin($vin);
print_r($response);