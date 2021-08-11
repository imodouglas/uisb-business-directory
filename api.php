<?php
session_start();
require 'includes/env.inc.php';
include 'includes/autoloader.php';
header("Content-Type: application/json");


$config = new ConfigController();
$business = new BusinessController();

// echo json_encode($business->businessSearch("web hub"));


