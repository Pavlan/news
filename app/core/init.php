<?php

define('APP_DIR', dirname(__DIR__));
define('ROOT_DIR', dirname(APP_DIR));
define('CONFIG_DIR', APP_DIR . '/config');
define('VIEWS_DIR', APP_DIR . '/views');

const DEBUG = 1;

if (DEBUG) {
    error_reporting(-1);
} else {
    error_reporting(0);
}