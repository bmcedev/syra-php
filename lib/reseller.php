<?php

/**
 * Syra API Wrapper
 *
 * @author    Melissa Choy <mel@otilas.com.au>
 * @version   v1.1
 * @copyright 2013 Otilas Pty Ltd
 */

class SyraReseller extends SyraBase {
  
  // Verifies the ResellerID and APIKey are valid.
  public static function authenticate() {    
  }
  
  // Retrieves the reseller’s current balance.
  public static function get_balance() {    
  }
  
  // Retrieves a list of the reseller’s domains.
  public static function get_domain_list() {
  }
  
  // Retrieves a list of all domain products available to the Reseller.
  public static function get_domain_price_list() {    
  }
  
  // Sends a transfer notification for the reseller to test their notification_url script with
  public static function send_api_notification() {    
  }
  
  // Spawns a number of domains for the reseller to test transferring with
  public static function spawn_domains_for_transfer() {    
  }
  
}