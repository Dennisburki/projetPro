<?php

require_once "my-config.php";
require_once "models/database.php";
require_once "models/accounts.php";

$displayObj = new Accounts();
$displayArray = $displayObj->getApprouvedPost();