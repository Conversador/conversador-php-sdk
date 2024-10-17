<?php

error_reporting(E_ALL | E_STRICT);

use DG\BypassFinals;

if (!file_exists(dirname(__DIR__).'/composer.lock')) {
    exit("Please run 'composer install' before running the tests.\n");
}

require_once __DIR__.'/../vendor/autoload.php';

// Used to bypass final classes for mockup
BypassFinals::enable();
