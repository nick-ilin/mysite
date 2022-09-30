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
	<link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;700;900&family=Roboto:wght@400;700;900&display=swap" rel="stylesheet">
	<script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="font-['Roboto']">
	<nav class="top-nav bg-blue-800 py-5">
		<div class="font-['Inter'] text-base text-white w-3/4 mx-auto">
			<input id="menu-toggle" type="checkbox" />
			<label class="menu-button-container" for="menu-toggle">
				<div class="menu-button"></div>
			</label>
			<ul class="menu list-none flex">
				<li class="font-['Roboto'] name font-black text-2xl">Николай Ильин</li>
				<li class="grow"></li>
				<li class="ml-6"><a class="hover:border-b" href="index.php#about">Обо мне</a></li>
				<li class="ml-6"><a class="hover:border-b" href="index.php#activity">Моя деятельность</a></li>
				<li class="ml-6"><a class="hover:border-b" href="index.php#calculator">Калькулятор</a></li>
				<li class="ml-6"><a class="hover:border-b" href="index.php#difficulties">Сложности</a></li>
				<li class="ml-6"><a class="hover:border-b" href="index.php#mood">Настроение</a></li>
				<li class="ml-6"><a class="hover:border-b" href="index.php#contacts">Контакты</a></li>
			</ul>
		</div>
	</nav>
	<section>
		<div id="about" class="font-['Inter'] flex flex-col lg:flex-row text-sky-800 font-bold text-2xl w-3/4 py-6 mx-auto">
			<div>
				<div class="text-4xl mt-12">Меня зовут Николай!</div>
				<div class="italic font-semibold mt-12">Я хочу обучаться программированию</div>
				<div class="italic font-semibold mt-12">А еще я люблю фотографировать</div>
			</div>
			<div class="grow"></div>
			<img class="max-w-max" src="./img/foto.jpg" />
		</div>
	</section>
	<section class="bg-sky-50">
		<div id="activity" class="text-sky-800 text-4xl w-3/4 py-6 mx-auto">
			<div class="font-['Inter'] text-4xl font-bold mb-6">Моя деятельность</div>
			<div class="text-9xl font-black flex flex-col lg:flex-row">
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
	</section>
	<section>
		<div id="calculator" class="text-sky-800 text-base w-3/4 py-6 mx-auto">
			<div class="font-['Inter'] text-4xl font-bold mb-6 flex">Калькулятор</div>
			<form action="#calculator" method="post" class="w-1/2">
				<div class="flex flex-col mr-5">
					<input name="number1" class="border border-black px-1 mb-5" type="text" placeholder="Введите число" value="<?php if (isset($_POST['number1'])) {
																																	echo $_POST['number1'];
																																} ?>" />
					<select name="action" class="border border-black mb-5">
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
					<input name="number2" class="border border-black px-1 mb-5" type="text" placeholder="Введите число" value="<?php if (isset($_POST['number2'])) {
																																	echo $_POST['number2'];
																																} ?>" />
					<button name="button" class="bg-blue-800 hover:bg-blue-700 text-white py-1 px-4 mb-5 rounded">Рассчитать</button>
				</div>
			</form>
			<div class="flex flex-col w-1/2">
				<div class="font-bold my-2.5">
					<div>Ваш результат:&nbsp;</div>
					<div class="font-normal" id="result"><?php echo $result; ?></div>
				</div>
				<div>
					<b>Лог последних пяти действий:</b><br />
					<?php
					while ($data = mysqli_fetch_assoc($calcLog)) {
						echo $data['number1'] . $data['action'] . $data['number2'] . "=" . $data['result'] . "<br />";
					}
					?>
				</div>
			</div>
	</section>
	<section class="bg-sky-50">
		<div id="difficulties" class="text-sky-800 text-4xl w-3/4 py-6 mx-auto">
			<div class="font-['Inter'] text-4xl font-bold mb-6">Сложности</div>
			<div class="text-9xl font-black flex flex-col lg:flex-row">
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
	</section>
	<section>
		<div id="mood" class="text-sky-800 w-3/4 py-6 mx-auto">
			<div class="font-['Inter'] text-4xl font-bold mb-6">Настроение</div>
			<img class="block mx-auto" src="./img/smile.png" />
		</div>
	</section>
	<footer class="bg-blue-800">
		<div id="contacts" class="font-['Inter'] text-white w-3/4 flex mx-auto py-5">
			<div class="font-['Roboto'] name font-black text-2xl grow">Николай Ильин</div>
			<div class="text-base leading-8 px-5">+7&nbsp;917&nbsp;710&nbsp;33&nbsp;60</div>
			<div><a href="http://vk.com/dooomer"><img src="./img/vk.png" /></a></div>
		</div>
	</footer>
</body>

</html>