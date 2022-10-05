<?php
require_once 'config/connect.php';
?>

<!DOCTYPE html>
<html>
	<head>
		<title>Информация по операторам</title>
	</head>
	<body>
  <style>
    th, td {
        padding: 10px;
    }

    th {
        background: #cac208;
        color: #fff;
    }

    td {
        background: #efe953;
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
    <table>
        <tr>
            <th>Оператор</th>
            <th>Стоимость за минуту, коп</th>
        </tr>
              
        <?php


$operators = mysqli_query($connect, "SELECT * FROM `operator`");
$operators = mysqli_fetch_all($operators);

foreach ($operators as $call) {
    ?>
        <tr>
            <td><?= $call[1] ?></td>
            <td><?= $call[2] ?></td>
           
        </tr>
    <?php
}
?>
</table>
	
	</body>
</html>