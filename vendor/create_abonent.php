<?php

require_once '../config/connect.php';

$abonent= $_POST['abonent'];
$phone = $_POST['phone'];
$operator = $_POST['operator'];

mysqli_query($connect,"INSERT INTO `abon` (`id`, `abon`, `telephone`) VALUES (NULL, '$abonent', '$phone')");

mysqli_query($connect,"INSERT INTO `telephone` (`id`, `telephone`, `operator`) VALUES (NULL, '$phone', '$operator')");

header('Location: /telephone.php');
