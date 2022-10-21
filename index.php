<?php

// ini_set('display_errors', 1);
error_reporting(0);
set_time_limit(-1); 
ini_set('memory_limit', '-1');
date_default_timezone_set('Europe/Moscow'); 	

require_once './vendor/autoload.php';

use App\App;
$app = new App();