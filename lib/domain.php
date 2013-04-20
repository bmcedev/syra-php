<?php

/**
 * Syra API Wrapper
 *
 * @author    Melissa Choy <mel@otilas.com.au>
 * @version   v1.1
 * @copyright 2013 Otilas Pty Ltd
 */

class SyraDomain extends SyraAPI {
  
  // Checks the existence of a domain name. 
  public function check($params = array()) {
    $response = $this->send_request('DomainCheck', $params);
    if (isset($response->AvailabilityList)) {
      return $response->AvailabilityList;
    } else {
      return $this->api_errors($response);
    }
  }
  
  // Retrieves the domain information. 
  public function create($params = array()) {
    $response = $this->send_request('DomainCreate', $params);
    if (isset($response->DomainDetails)) {
      return $response->DomainDetails;
    } else {
      return $this->api_errors($response);
    }
  }
  
  // Retrieves the domain information.
  public function info($params=array()) {  
    $response = $this->send_request('DomainInfo', $params);
    if (isset($response->DomainDetails)) {
      return $response->DomainDetails;
    } else {
      return $this->api_errors($response);
    }
  }
  
  // Updates an existing domain object.
  public function update($params = array()) { 
    $response = $this->send_request('DomainUpdate', $params);
    if (isset($response->DomainDetails)) {
      return $response->DomainDetails;
    } else {
      return $this->api_errors($response);
    }   
  }
  
  // Renews a domain object.
  public function renew($params = array()) { 
     $response = $this->send_request('DomainRenew', $params);
     if (isset($response->DomainDetails)) {
       return $response->DomainDetails;
     } else {
       return $this->api_errors($response);
     } 
  }
  
  // Deletes a domain object.
  public function delete($params = array()) {  
    $response = $this->send_request('DomainDelete', $params);
    if (isset($response->Success)) {
      return $response->Success;
    } else {
      return $this->api_errors($response);
    }  
  }
  
}