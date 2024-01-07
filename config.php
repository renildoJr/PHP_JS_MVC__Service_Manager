<<<<<<< HEAD
<?php

define("DB_HOST", "localhost");
define("DB_NAME", "prat_mvc");
define("DB_USER", "root");
define("DB_PASS", "8423");

=======
<?php

define("DB_HOST", "localhost");
define("DB_NAME", "prat_mvc");
define("DB_USER", "root");
define("DB_PASS", "8423");

>>>>>>> d9a348a830e6f7b251f5e7d5238f340be8ac8584
$con = new PDO("mysql:host=".DB_HOST.";dbname=".DB_NAME, DB_USER, DB_PASS);