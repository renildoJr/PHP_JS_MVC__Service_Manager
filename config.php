<?php

define("DB_HOST", "localhost");
define("DB_NAME", "prat_mvc");
define("DB_USER", "root");
define("DB_PASS", "8423");

$con = new PDO("mysql:host=".DB_HOST.";dbname=".DB_NAME, DB_USER, DB_PASS);