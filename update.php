<?php

    require_once 'config/connect.php';

    $call_id = $_GET['id'];
    
    $call = mysqli_query($connect, "SELECT * FROM `call_log` WHERE `id` = '$call_id'");
    $call = mysqli_fetch_assoc($call);

    $abonsAll = mysqli_query($connect, "SELECT * FROM `abon`");
    $abonsAll = mysqli_fetch_all($abonsAll);

?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Обновить запись</title>
</head>
<body>
<style>
    .nav-menu {
        padding-bottom: 5px;
    }

</style>
<body>

<div class="nav-menu">
    <a href="index.php">На главную страницу</a>
</div>
    <h3>Обновить запись</h3>
    <form action="vendor/update.php" method="post">
        <input type="hidden" name="id" value="<?= $call['id'] ?>">
        <p>Кто звонил</p>
        <input type="text" name="who_called"  value="<?= $call['who called'] ?>"><br>  
        <p>Кому звонили</p>
        <select name="who_was_called">
        <?php
            foreach ($abonsAll as $abon) {
            ?>
                <option 
                value="<?=$abon[1]?>" <?php if($abon[1] == $call['who was called']): ?> selected="selected"<?php endif; ?>>
                            
                    <?=$abon[1]?>
             </option>
            <?php
        }
        ?>   
        </select><br> 
        <p>Когда звонили</p>               
        <input type="datetime-local" name="date" value="<?= str_replace(' ', 'T', $call['date']) ?>"><br>   
        <p>Продолжительность</p>   
        <input type="number" name="period"  value="<?= $call['period'] ?>"> <br> <br>       
        <button type="submit">Обновить</button>
    </form>
</body>
</html>