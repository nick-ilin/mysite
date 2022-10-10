<?php
$link = mysqli_connect('localhost', 'root', 'root', 'base');
$result = '';
$logQuery = "SELECT number1,number2,action,result FROM calc ORDER BY id DESC LIMIT 5";
$calcLog = mysqli_query($link, $logQuery) or die(mysqli_error($link));
if (isset($_POST['button'], $_POST['number1'], $_POST['number2'], $_POST['action'])) {
	if (is_numeric($_POST['number1']) && is_numeric($_POST['number2'])) {
		$number1 = $_POST['number1'];
		$number2 = $_POST['number2'];
		$action = $_POST['action'];
		switch ($action) {
			case "+":
				$result = $number1 + $number2;
				break;
			case "-":
				$result = $number1 - $number2;
				break;
			case "*":
				$result = $number1 * $number2;
				break;
			case "/":
				if ($number2 != 0) $result = $number1 / $number2;
				break;
		}
		if ($number2 != 0) {
			$query = "INSERT INTO calc (number1,number2,action,result) VALUES(" . $number1 . "," . $number2 . ",\"" . $action . "\"," . $result . ");";
			mysqli_query($link, $query) or die(mysqli_error($link));
		} else {
			$result = "Деление на ноль";
		}
	}
} else {
	$result = "Введите числа и действие";
}
