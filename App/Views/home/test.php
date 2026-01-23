<?php
require_once __DIR__ . './../../../vendor/autoload.php';
use App\Models\User;
$user = User::fetchByEmail("licyzahu@mailinator.com");
var_dump($user);