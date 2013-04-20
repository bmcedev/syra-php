<?php

/**
 * Syra API Wrapper
 *
 * @author    Melissa Choy <mel@otilas.com.au>
 * @version   v1.1
 * @copyright 2013 Otilas Pty Ltd
 */

class SyraHost extends SyraAPI {
  
  // Retrieves the host information.
  public function info($params = array()) {    
    $response = $this->send_request('HostInfo', $params);
    if (isset($response->HostDetails)) {
      return $response->HostDetails;
    } else {
      return $this->api_errors($response);
    }
  }
  
  // Creates a host object.
  public function create($params = array()) { 
    $response = $this->send_request('HostCreate', $params);
    if (isset($response->HostDetails)) {
      return $response->HostDetails;
    } else {
      return $this->api_errors($response);
    }   
  }
  
  // Updates a host object.
  public function update($params = array()) {    
    $response = $this->send_request('HostUpdate', $params);
    if (isset($response->HostDetails)) {
      return $response->HostDetails;
    } else {
      return $this->api_errors($response);
    }
  }
  
  // Deletes a host object.
  public function delete($params = array()) {    
    $response = $this->send_request('HostDelete', $params);
    if (isset($response->Success)) {
      return $response->Success;
    } else {
      return $this->api_errors($response);
    }
  }
  
}