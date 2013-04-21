<?php

/**
 * Syra API Wrapper
 *
 * @author    Melissa Choy <mel@otilas.com.au>
 * @version   v1.1
 * @copyright 2013 Otilas Pty Ltd
 */

class SyraReseller extends SyraAPI {
  
  // Verifies the ResellerID and APIKey are valid.
  public function authenticate($params = array()) {  
    $response = $this->send_request('Authenticate', $params);
    if (isset($response->Success)) {
      return $response->Success;
    } else {
      return $this->api_errors($response);
    }  
  }
  
  // Retrieves the reseller’s current balance.
  public function get_balance() {
    $response = $this->send_request('GetBalance');
    if (isset($response->Balance)) {
      return $response->Balance;
    } else {
      return $this->api_errors($response);
    }
  }
  
  // Retrieves a list of the reseller’s domains.
  public function get_domain_list() {
    $response = $this->send_request('GetDomainList');
    if (isset($response->DomainList)) {
      return $response->DomainList;
    } else {
      return $this->api_errors($response);
    }    
  }
  
  // Retrieves a list of all domain products available to the Reseller.
  public function get_domain_price_list() {  
    $response = $this->send_request('GetDomainPriceList');
    if (isset($response->DomainPriceList)) {
      return $response->DomainPriceList;
    } else {
      return $this->api_errors($response);
    }  
  }
  
  // Sends a transfer notification for the reseller to test their notification_url script with
  public function send_api_notification($params = array()) {    
    if($this->test_mode) {   
      $response = $this->send_request('SendAPINotification', $params);
      if (isset($response->Success)) {
        return $response->Success;
      } else {
        return $this->api_errors($response);
      } 
    } else {
      throw new Exception('send_api_notification method is only available for test_mode');
    }
  }
  
  // Spawns a number of domains for the reseller to test transferring with
  public function spawn_domains_for_transfer() {    
    if($this->test_mode) {    
      $response = $this->send_request('SpawnDomainsForTransfer');
      if (isset($response->SpawnedTransferList)) {
        return $response->SpawnedTransferList;
      } else {
        return $this->api_errors($response);
      }
    } else {
      throw new Exception('spawn_domains_for_transfer method is only available for test_mode');
    }
  }
  
}