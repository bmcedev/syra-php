# syra-php

PHP API Wrapper for Syra Reseller System

## Usage

`define('SYRA_RESELLER_ID', 'someusername');`
`define('SYRA_API_KEY', 'someapikeygoeshere');`

_if you want to enable test mode you can set this via the `SYRA_TEST_MODE` constant_

`define('SYRA_TEST_MODE', true);` 

$params = array(
	'DomainName' => 'somedomain.com.au'
);

$domain = new SyraDomain();
$domain->info($params);

---

Copyright (c) 2013, Otilas Pty Ltd.