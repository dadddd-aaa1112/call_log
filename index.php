<?php
require_once 'config/connect.php';
?>

<!DOCTYPE html>
<html>
	<head>
		<title>Журнал вызовов</title>
	</head>
	<body>
  <style>
    th, td {
        padding: 10px;
    }

    th {
        background: #0b287e;
        color: #fff;
    }

    td {
        background: #7191f0;
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
    <a class="nav-item" href="telephone.php">Просмотреть всех абонентов</a>
    <a class="nav-item" href="operators.php">Информация по операторам</a>
</div>
    <table>
        <tr>
            <th>ID</th>
            <th>Кто звонил</th>
            <th>Кому звонили</th>
            <th>Когда звонили</th>
            <th>Продолжительность, сек</th>
            <th>Стоимость, руб</th>
            <th colspan="3">Действия</th>
        </tr>

        <?php


$calls = mysqli_query($connect, "SELECT * FROM `call_log`");
$calls = mysqli_fetch_all($calls);

$abonsAll = mysqli_query($connect, "SELECT * FROM `abon`");
$abonsAll = mysqli_fetch_all($abonsAll);

foreach ($calls as $call) {
    ?>
        <tr>
            <td><?= $call[0] ?></td>
            <td><?= $call[1] ?></td>
            <td><?= $call[2] ?></td>
            <td><?= $call[3] ?></td>
            <td><?= $call[4] ?></td>
            <td><?= $call[5]/100 ?></td>
            <td><a href="show.php?id=<?= $call[1] ?>">Просмотреть статистику по абоненту</a></td>
            <td><a href="update.php?id=<?= $call[0] ?>">Изменить</a></td>
            <td><a style="color: red;" href="vendor/delete.php?id=<?= $call[0] ?>">Удалить</a></td>
        </tr>
    <?php
}
?>
</table>

<h3>Создать новую запись</h3>
<form action="vendor/create.php" method="post">
<label>Кто звонил</label>
<select name="who_called">
<?php
    foreach ($abonsAll as $abon) {
    ?>
        <option value="<?= $abon[1] ?>"><?= $abon[1] ?> </option>
    <?php
}
?>   
</select><br> <br> 

<label>Кому звонили</label>
<select name="who_was_called">
<?php
    foreach ($abonsAll as $abon) {
    ?>
        <option value="<?= $abon[1] ?>"><?= $abon[1] ?> </option>
    <?php
}
?>   
</select><br> <br> 

<label>Когда звонили</label>
<input type="datetime-local" name="date" placeholder="Выберите дату и время"><br> <br> 
<label>Продолжительность</label>
<input type="number" name="period" placeholder="Введите продолжительность разговора"> <br> <br> 
<button type="submit">Создать</button>
</form>
	
	</body>
</html>