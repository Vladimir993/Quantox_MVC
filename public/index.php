<?php

// This file is place where user(browser) has permmision to access application.

// Include configuration
require '../app/config/config.php';

// Include composer autoloader.
require_once '../vendor/autoload.php';

// Include namespace.
use App\Core\App;

// Run Application.
$app = new App();
$app->handle();