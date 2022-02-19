<?php


require_once('../my-config.php');
require_once('../models/database.php');
require_once('../models/destination.php');

$statObj = new Destinations();
$statArray = $statObj->getStatFirst();

$statOtherObj = new Destinations();
$statOtherArray = $statOtherObj->getStatOther();