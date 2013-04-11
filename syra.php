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

include_once "{$dir}/syra/base.php";
include_once "{$dir}/syra/contact.php";
include_once "{$dir}/syra/domain.php";
include_once "{$dir}/syra/host.php";
include_once "{$dir}/syra/transfer.php";
include_once "{$dir}/syra/reseller.php";