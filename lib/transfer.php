<?php

/**
 * Syra API Wrapper
 *
 * @author    Melissa Choy <mel@otilas.com.au>
 * @version   v1.1
 * @copyright 2013 Otilas Pty Ltd
 */

class SyraTransfer extends SyraAPI {
  
  // Checks if a domain name is transferrable.
  public function check($params = array()) {
    $response = $this->send_request('TransferCheck', $params);
    if (isset($response->Success)) {
      $result = (object) array('Success' => $response->Success, 'IsEligibleForRenewal' => $response->IsEligibleForRenewal);
      return $result;
    } else {
      return $this->api_errors($response);
    }
  }
  
  // Retrieves the transfer information.
  public function info($params = array()) {  
    $response = $this->send_request('TransferInfo', $params);
    if (isset($response->TransferDetails)) {
      return $response->TransferDetails;
    } else {
      return $this->api_errors($response);
    }  
  }
  
  // Starts the transfer of a domain name.
  public function start($params = array()) {  
    $response = $this->send_request('TransferStart', $params);
    if (isset($response->TransferDetails)) {
      return $response->TransferDetails;
    } else {
      return $this->api_errors($response);
    }  
  }
  
  // Cancels the transfer of a domain name.
  public function cancel($params = array()) {    
    $response = $this->send_request('TransferCancel', $params);
    if (isset($response->Success)) {
      return $response->Success;
    } else {
      return $this->api_errors($response);
    }
  }
  
}