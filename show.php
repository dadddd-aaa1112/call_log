<?php

    require_once 'config/connect.php';

    $call_who = $_GET['id'];
   
    $call = mysqli_query($connect, "SELECT * FROM `call_log` WHERE `who called` = '$call_who'");
    $calls = mysqli_fetch_all($call);

    $sumPeriod = 0;
    $sumCost = 0;

    foreach($calls as $key=>$elem) {    
    $sumPeriod += $elem[4];
    $sumCost += $elem[5]/100;
   }
   
  ?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Обновить запись</title>
</head>
<style>
    .text {
        font-weight: bold;
    }
    .nav-item {
        margin-left: 5px;
        
    }

    .nav-menu {
        padding-bottom: 5px;
    }
</style>
<body>

<div class="nav-menu">
    <a href="index.php">На главную страницу</a>
    <a class="nav-item" href="telephone.php">На страницу абонентов</a>    
</div>  

    <h3>Статистика по абоненту</h3>         
        <p class="text">Абонент</p>
        <span><?= $call_who ?></span>                 
        <p class="text">Общая продолжительность разговоров, сек</p>   
        <span><?= $sumPeriod ?></span> 
        <p class="text">Округление в минуты (для тарификации)</p>   
        <span><?=  ceil($sumPeriod/60) ?></span>   
        <p class="text">Общая сумма, руб</p>
        <span><?= $sumCost ?></span>           
   
</body>
</html>