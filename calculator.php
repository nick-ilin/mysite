<?php
$rezult = "Рассчет не производился.";
if (isset($_POST['button'], $_POST['number1'], $_POST['number2'], $_POST['action'])) {
	if (is_numeric($_POST['number1']) && is_numeric($_POST['number2'])) {
		$number1 = $_POST['number1'];
		$number2 = $_POST['number2'];
		$action = $_POST['action'];
		switch ($action) {
			case "+":
				$rezult = $number1 + $number2;
				break;
			case "-":
				$rezult = $number1 - $number2;
				break;
			case "*":
				$rezult = $number1 * $number2;
				break;
			case "/":
				if ($number2 != 0) {
					$rezult = $number1 / $number2;
				} else {
					$rezult = "Деление на ноль";
				}
				break;
		}
	}
} else {
	$rezult = "Введите числа и действие";
}
?>