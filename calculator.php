<?php
class Calculator
{
	public function __construct(int $number1, int $number2, string $action)
	{
		$this->number1 = $number1;
		$this->number2 = $number2;
		$this->action = $action;
	}
	public function calculate()
	{
		$link = mysqli_connect('localhost', 'root', 'root', 'base');
				switch ($this->action) {
					case "+":
						$result = $this->number1 + $this->number2;
						break;
					case "-":
						$result = $this->number1 - $this->number2;
						break;
					case "*":
						$result = $this->number1 * $this->number2;
						break;
					case "/":
						if ($this->number2 != 0) $result = $this->number1 / $this->number2;
						break;
				}
				if ($this->number2 != 0) {
					$query = "INSERT INTO calc (number1,number2,action,result) VALUES(" . $this->number1 . "," . $this->number2 . ",\"" . $this->action . "\"," . $result . ");";
					mysqli_query($link, $query) or die(mysqli_error($link));
				} else {
					$result = "Деление на ноль";
				}
		echo $result;
	}
}