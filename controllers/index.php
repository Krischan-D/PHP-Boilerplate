<?php

use Core\Database;


$config = require('config.php');
// dd($config);
$db = new Database($config['database']);

$notes = $db->query('SELECT * FROM users')->getAll();


require('views/index.view.php');
