<?php


$connect = mysqli_connect('localhost',
 'root',
'',
'log'

);

if (!connect) {
  die('Error connect to database');
}