<?php
  
  $config = [
    'DB_DRIVER'   => 'mysql',
    'DB_HOST'     => 'localhost',
    'DB_USERNAME' => 'root',
    'DB_PASSWORD' => '',
    'DB_NAME'     => 'shop',
    'DB_PORT'     => '3306',
  ];
 
  foreach ($config as $key => $value) {
    putenv("$key=$value");
  }
?>