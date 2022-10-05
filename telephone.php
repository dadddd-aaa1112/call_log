<?php
require_once 'config/connect.php';
?>

<!DOCTYPE html>
<html>
	<head>
		<title>Абоненты</title>
	</head>
	<body>
  <style>
    th, td {
        padding: 10px;
    }

    th {
        background: #113c14;
        color: #fff;
    }

    td {
        background: #72e679;
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
    <a class="nav-item" href="operators.php">Информация по операторам</a>
</div>
    <table>
        <tr>
            <th>Абонент</th>
            <th>Номер телефона</th>
            <th>Оператор</th>           
            <th>Стоимость за минуту, коп</th>           
        </tr>

<?php

$operators = mysqli_query($connect, "SELECT * FROM `operator`");
$operators = mysqli_fetch_all($operators);

$telephones = mysqli_query($connect, "SELECT * FROM `telephone`");
$telephones = mysqli_fetch_all($telephones);

$abonsAll = mysqli_query($connect, "SELECT * FROM `abon`");
$abonsAll = mysqli_fetch_all($abonsAll);

foreach ($abonsAll as $abon) {
    foreach ($telephones as $telephone) {
        foreach ($operators as $operator) {
            if ($abon[2] ==  $telephone[1] && $telephone[2] ==  $operator[1]) {  
    ?>
        <tr>
            <td><?= $abon[1] ?></td>          
            <td><?= $abon[2] ?></td>
            <td><?= $telephone[2] ?></td>
            <td><?= $operator[2] ?></td>
        </tr>
    <?php
        }
     }
    }
}
?>
</table>

<h3>Создать новую запись</h3>
<form action="vendor/create_abonent.php" method="post">
<label>Абонент</label>
<input type="text" name="abonent" placeholder="Введите абонента"><br><br>       
<label>Номер телефона</label>
<input type="text" name="phone" placeholder="Введите номер телефона"><br><br> 
<label>Оператор</label>
<select name="operator">
<?php
    foreach ($operators as $operator) {
    ?>
        <option value="<?= $operator[1] ?>"><?= $operator[1] ?> </option>
    <?php
}
?>   
</select>   
<br> <br> 
<button type="submit">Создать</button>
</form>	
	</body>
</html>