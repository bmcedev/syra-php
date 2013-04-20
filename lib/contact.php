<?php

/**
 * Syra API Wrapper
 *
 * @author    Melissa Choy <mel@otilas.com.au>
 * @version   v1.1
 * @copyright 2013 Otilas Pty Ltd
 */

class SyraContact extends SyraAPI {
  
  // Checks the existence of a contact identifier.
  public function check($params = array()) {  
    $response = $this->send_request('ContactCheck', $params);
    if (isset($response->AvailabilityList)) {
      return $response->AvailabilityList;
    } else {
      return $this->api_errors($response);
    }  
  }
  
  // Retrieves the contact information.
  public function info($params = array()) {   
    $response = $this->send_request('ContactInfo', $params);
    if (isset($response->ContactDetails)) {
      return $response->ContactDetails;
    } else {
      return $this->api_errors($response);
    } 
  }
  
  // Creates a contact object.
  public function create($params = array()) {    
    $response = $this->send_request('ContactCreate', $params);
    if (isset($response->ContactDetails)) {
      return $response->ContactDetails;
    } else {
      return $this->api_errors($response);
    }
  }
  
  // Updates an existing contact object.
  public function update($params = array()) {
    $response = $this->send_request('ContactUpdate', $params);
    if (isset($response->ContactDetails)) {
      return $response->ContactDetails;
    } else {
      return $this->api_errors($response);
    }
  }
  
  // Creates a registrant object from a contact object.
  public function clone_to_registrant($params = array()) {
    $response = $this->send_request('ContactCloneToRegistrant', $params);
    if (isset($response->ContactDetails)) {
      return $response->ContactDetails;
    } else {
      return $this->api_errors($response);
    }
  }
  
  // Retrieves a list of contact identifiers belonging to the reseller.
  public function get_identifier_list() {
    $response = $this->send_request('GetContactIdentifierList');
    if (isset($response->ContactIdentifierList)) {
      return $response->ContactIdentifierList;
    } else {
      return $this->api_errors($response);
    }
  }
  
}