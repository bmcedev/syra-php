<?php

/**
 * Syra API Wrapper
 *
 * @author    Melissa Choy <mel@otilas.com.au>
 * @version   v1.1
 * @copyright 2013 Otilas Pty Ltd
 */

class SyraAPI {
  var $test_mode = false;
  private $reseller_api_soap_client;
  
	function __construct($reseller_id=SYRA_RESELLER_ID, $api_key=SYRA_API_KEY, $test_mode=false) {	  
    if($test_mode!=true) {
      if ((defined('SYRA_TEST_MODE') && true == SYRA_TEST_MODE)) {
        $this->test_mode=true;
      }
    } else { $this->test_mode = true; }

    if($this->test_mode!=true) {
      $soap_location = 'http://soap.secureapi.com.au/API-1.1';
      $wsdl_location = 'http://soap.secureapi.com.au/wsdl/API-1.1.wsdl';
    } else {
      $soap_location = 'http://soap-test.secureapi.com.au/API-1.1';
      $wsdl_location = 'http://soap-test.secureapi.com.au/wsdl/API-1.1.wsdl';
    }

    //set the login headers
    $authenticate = array();
    $authenticate['AuthenticateRequest'] = array();
    $authenticate['AuthenticateRequest']['ResellerID'] = $reseller_id;
    $authenticate['AuthenticateRequest']['APIKey'] = $api_key;

    //convert $authenticate to a soap variable
    $authenticate['AuthenticateRequest'] = new SoapVar($authenticate['AuthenticateRequest'], SOAP_ENC_OBJECT);
    $authenticate = new SoapVar($authenticate, SOAP_ENC_OBJECT);

    $header = new SoapHeader($soap_location, 'Authenticate', $authenticate, false);

    $this->reseller_api_soap_client = new SoapClient($wsdl_location, array('soap_version' => SOAP_1_2, 'cache_wsdl' => WSDL_CACHE_NONE));
    $this->reseller_api_soap_client->__setSoapHeaders(array($header));
	}

	protected function send_request($method, $data = null) {
		$prepared_data = $data != null ? array($data) : array();
		try {
			$response = $this->reseller_api_soap_client->__soapCall($method, $prepared_data);
		} catch (SoapFault $response) { }
		
		if (!is_soap_fault($response)) {
      return $response->APIResponse;
    } else {
      throw new Exception('Error occurred while sending request: ' . $response->getMessage());
    }
	}
	
	protected function api_errors($response) {
	  $errors = (object) array('Errors' => $response->Errors);
	  return $errors;
	}
}
