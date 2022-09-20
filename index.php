<?php
include 'calculator.php';
?>
<!DOCTYPE html>
<html lang="ru">

<head>
	<meta charset="utf-8">
	<title>Обо мне</title>
	<link rel="stylesheet" href="styles/style.css">
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Inter:wght@400&family=Roboto:wght@400&display=swap" rel="stylesheet">
	<script src="https://cdn.tailwindcss.com"></script>
</head>

<body>
	<div class="h-24 font-sans text-base text-white w-3/4 bg-blue-800 mx-auto px-5 ">
		<ul class="list-none">
			<li class="drop-shadow-md text-xl w-1/3 float-left mx-2.5 mt-5">Николай Ильин</li>
			<li class="float-left mx-2.5 mt-5"><a class="no-underline hover:underline visited:text-white" href="index.php#about">Обо мне</a></li>
			<li class="float-left mx-2.5 mt-5"><a class="no-underline hover:underline visited:text-white" href="index.php#activity">Моя деятельность</a></li>
			<li class="float-left mx-2.5 mt-5"><a class="no-underline hover:underline visited:text-white" href="index.php#calculator">Калькулятор</a></li>
			<li class="float-left mx-2.5 mt-5"><a class="no-underline hover:underline visited:text-white" href="index.php#difficulties">Сложности</a></li>
			<li class="float-left mx-2.5 mt-5"><a class="no-underline hover:underline visited:text-white" href="index.php#mood">Настроение</a></li>
			<li class="float-left mx-2.5 mt-5"><a class="no-underline hover:underline visited:text-white" href="index.php#contacts">Контакты</a></li>
		</ul>
	</div>
	<div id="about" class="font-sans text-sky-800 font-bold text-2xl w-3/4 mx-auto mb-12">
		<div class="float-left mx-12">
			<div class="text-4xl my-12">Меня зовут Николай!</div>
			<div class="my-12 italic font-semibold">Я хочу обучаться программированию</div>
			<div class="my-12 italic font-semibold">А еще я люблю фотографировать</div>
		</div>
		<div class="mt-12"><img src="./img/foto.jpg" /></div>
	</div>
	<div id="activity" class="font-sans text-sky-800 text-4xl bg-sky-50 w-3/4 py-6 mx-auto">
		<div class="text-4xl font-bold mb-6">Моя деятельность</div>
		<div class="text-9xl font-black flex lg:flex-row sm:flex-col">
			<div class="upperblock">1<div class="text">Пробую разобраться в программировании</div>
			</div>
			<div class="bottomblock">2<div class="text">Фотографирую птиц</div>
			</div>
			<div class="upperblock">3<div class="text">Собираю одскульное железо</div>
			</div>
			<div class="bottomblock">4<div class="text">Играю на гитаре</div>
			</div>
			<div class="upperblock">5<div class="text">Учу английский</div>
			</div>
		</div>
	</div>
	<div id="calculator" class="font-sans text-sky-800 text-base w-3/4 py-6 mx-auto">
		<div class="text-4xl font-bold mb-6">Калькулятор</div>
		<form action="#calculator" method="post">
			<input name="number1" class="border border-black px-1" type="text" placeholder="Введите число" value="<?php if (isset($_POST['number1'])) {
																														echo $_POST['number1'];
																													} ?>" />
			<select name="action" class="border border-black">
				<option value="" selected disabled hidden>Выберите действие</option>
				<?php
				$act = array('+', '-', '*', '/');
				for ($i = 0; $i < count($act); $i++) {
					$selected = '';
					if ($_POST['action'] == $act[$i]) $selected = 'selected';
					echo "<option value=\"" . $act[$i] . "\" " . $selected . ">" . $act[$i] . "</option>";
				}
				?>
			</select>
			<input name="number2" class="border border-black px-1" type="text" placeholder="Введите число" value="<?php if (isset($_POST['number2'])) {
																														echo $_POST['number2'];
																													} ?>" />
			<button name="button" class="bg-blue-800 hover:bg-blue-700 text-white py-1 px-4 rounded">Рассчитать</button>
		</form>
		<div class="font-bold flex flex-row my-2.5">
			<div>Ваш результат:&nbsp;</div>
			<div id="result"><?php echo $result; ?></div>
		</div>
		<div>
			Лог последних пяти действий:<br />
			<?php
			while ($data = mysqli_fetch_assoc($calcLog)) {
				echo $data['number1'] . $data['action'] . $data['number2'] . "=" . $data['result'] . "<br />";
			}
			?>
		</div>
	</div>
	<div id="difficulties" class="font-sans text-sky-800 text-4xl bg-sky-50 w-3/4 py-6 mx-auto">
		<div class="text-4xl font-bold mb-6">Сложности</div>
		<div class="text-9xl font-black flex lg:flex-row sm:flex-col">
			<div class="upperblock">
				<p>?</p>
				<div class="text"></div>
			</div>
			<div class="bottomblock">
				<p>?</p>
				<div class="text"></div>
			</div>
			<div class="upperblock">
				<p>?</p>
				<div class="text"></div>
			</div>
			<div class="bottomblock">
				<p>?</p>
				<div class="text"></div>
			</div>
			<div class="upperblock">
				<p>?</p>
				<div class="text"></div>
			</div>
		</div>
	</div>
	<div id="mood" class="font-sans text-sky-800 w-3/4 py-6 mx-auto">
		<div class="text-4xl font-bold mb-6">Настроение</div>
		<img class="block mx-auto" src="./img/smile.png" />
	</div>
	<div id="contacts" class="font-sans text-white w-3/4 flex flex-row bg-blue-800 mx-auto p-5">
		<div class="drop-shadow-md text-xl w-3/4 float-left">Николай Ильин</div>
		<div class="text-base w-1/5 float-left">+7&nbsp;917&nbsp;710&nbsp;33&nbsp;60</div>
		<div class="w-1/12 float-right"><a href="http://vk.com/dooomer"><img src="./img/vk.png" /></a></div>
	</div>
</body>

</html>