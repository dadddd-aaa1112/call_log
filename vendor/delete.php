<?php

require_once '../config/connect.php';


$id = $_GET['id'];


mysqli_query($connect, "DELETE FROM `call_log` WHERE `call_log`.`id` = '$id'");


header('Location: /');