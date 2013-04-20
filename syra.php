<?php

/**
 * Syra API Wrapper
 *
 * @author    Melissa Choy <mel@otilas.com.au>
 * @version   v1.1
 * @copyright 2013 Otilas Pty Ltd
 */

// --------------------------------------------------------------------

$dir = realpath(dirname(__FILE__));

require_once "{$dir}/lib/base.php";
require_once "{$dir}/lib/contact.php";
require_once "{$dir}/lib/domain.php";
require_once "{$dir}/lib/host.php";
require_once "{$dir}/lib/transfer.php";
require_once "{$dir}/lib/reseller.php";