<?php

require_once '../config/connect.php';


$who = $_POST['who_called'];
$who_was_called = $_POST['who_was_called'];
$date = $_POST['date'];
$period = $_POST['period'];


$abons = mysqli_query($connect, "SELECT * FROM `abon` where `abon` = '$who'");
$abons = mysqli_fetch_assoc($abons);
$abons = $abons['telephone'];

$telephones = mysqli_query($connect, "SELECT * FROM `telephone` where `telephone` = '$abons'");
$telephones = mysqli_fetch_assoc($telephones);
$telephones = $telephones['operator'];

$operatorsCost = mysqli_query($connect, "SELECT * FROM `operator` where `operator` = '$telephones'");
$operatorsCost = mysqli_fetch_assoc($operatorsCost);

$cost = ceil($period/60) * $operatorsCost['cost minute'];

mysqli_query($connect,"INSERT INTO `call_log` (`id`, `who called`, `who was called`, `date`, `period`, `cost`) VALUES (NULL, '$who', '$who_was_called', '$date', '$period', '$cost')");

header('Location: /');
