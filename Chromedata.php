<?

namespace TANIOS\Chromedata;
use \SoapClient;

/**
 * Chrome Data API Class
 *
 * @author Sleiman Tanios
 * @copyright Sleiman Tanios - TANIOS 2017
 * @version 1.0
 */

class Chromedata 
{

    const WSDL_URL = 'http://services.chromedata.com/Description/7b?wsdl';

    private $_number;

    private $_secret;

    private $_country;

    private $_language;

    private $_client;

    private $_accountInfo;

	public function __construct($config)
    {
        if (is_array($config)) {
            $this->setNumber($config['number']);
            $this->setSecret($config['secret']);
            $this->setCountry($config['country']);
            $this->setLanguage($config['language']);
            $this->setClient(self::WSDL_URL);
         	$this->setAccountInfo();
        } else {
            echo 'Error: __construct() - Configuration data is missing.';
        }
    }

	public function setNumber($number)
    {
        $this->_number = $number;
    }

    public function getNumber()
    {
        return $this->_number;
    }

    public function setSecret($secret)
    {
        $this->_secret = $secret;
    }

    public function getSecret()
    {
        return $this->_secret;
    }

    public function setCountry($country)
    {
        $this->_country = $country;
    }

    public function getCountry()
    {
        return $this->_country;
    }

    public function setLanguage($language)
    {
        $this->_language = $language;
    }

    public function getLanguage()
    {
        return $this->_language;
    }

    public function setClient($url){
    	$client = new SoapClient($url);
    	$this->_client = $client;
    }

    public function getClient(){
    	return $this->_client;
    }

    /* baseRequest requires: number, secret, country, language */
    public function setAccountInfo(){
    $this->_accountInfo = array(
    	'number'=>$this->getNumber(),
    	'secret'=>$this->getSecret(),
    	'country'=>$this->getCountry(),
    	'language' =>$this->getLanguage());
	}

	public function getAccountInfo(){
    	return $this->_accountInfo;
    }

    public function getCarInfoByVin($vin) {
    
		/* Initialize webservice  */
		$client = $this->getClient();
	
		/* Set parameters for the request */
		$params = array(
			"accountInfo" => $this->getAccountInfo(),
			"vin"=>$vin
		);

		/* Invoke webservice method - describeVehicle  */
		$response = $client->__soapCall("describeVehicle", array($params));
		return $response;

    }

    public function getCarInfoByInfo($modelYear,$makeName,$modelName) {
    
		/* Initialize webservice  */
		$client = $this->getClient();
	
		/* Set parameters for the request */
		$params = array(
		"accountInfo" => $this->getAccountInfo(),
		"modelYear"=>$modelYear,
		"makeName"=>$makeName,
		"modelName"=>$modelName
		);

		/* Invoke webservice method - describeVehicle  */
		$response = $client->__soapCall("describeVehicle", array($params));
		return $response;

    }


}




