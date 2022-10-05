<?php

define('HOST', 'localhost');
define('USER', 'u1801529_root');
define('PASSWORD', 'root123456');
define('DATABASE', 'u1801529_log');

$connect = mysqli_connect(HOST, USER, PASSWORD, DATABASE);

if (!$connect) {
  printf("Error: %s\n", mysqli_error($connect));
  exit();
}