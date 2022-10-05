<?php

define('HOST', 'localhost');
define('USER', 'root');
define('PASSWORD', 'root');
define('DATABASE', 'log');

$connect = mysqli_connect(HOST, USER, PASSWORD, DATABASE);

if (!$connect) {
  printf("Error: %s\n", mysqli_error($connect));
  exit();
}