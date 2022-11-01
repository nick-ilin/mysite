<?php
class Calculator
{
	public function __construct(int $number1, int $number2, string $action)
	{
		$this->number1 = $number1;
		$this->number2 = $number2;
		$this->action = $action;
	}
	private function getConnection()
	{
		$connection = mysqli_connect('localhost', 'root', 'root', 'base') or die("Couldn't connect");
		return $connection;
	}
	public function calculate()
	{
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
			mysqli_query($this->getConnection(), $query);
		} else {
			$result = "Деление на ноль";
		}
		return $result;
	}
	public function getLog()
	{
		$logQuery = "SELECT number1,number2,action,result FROM calc ORDER BY id DESC LIMIT 5";
		$calcLog = mysqli_query($this->getConnection(), $logQuery);
		return $calcLog;
	}
}
