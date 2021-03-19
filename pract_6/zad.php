<!DOCTYPE html>
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
		<title>Профиль</title>
	</head>
	<body>
		<div>
			<p class="php">Ваш профиль:
			<ul><li>
			<?php
	// $err = [];
	// $data = [];
	
	if(isset($_POST['lname']))  $data[0]  = ($_POST['lname']);
	if(isset($_POST['fname'])) 	$data[1]  = ($_POST['fname']);
	if(isset($_POST['tname'])) 	$data[2]  = ($_POST['tname']);
	if(isset($_POST['telephone'])) 	$data[3]  = ($_POST['telephone']);
	if(isset($_POST['email'])) 	$data[4]  = ($_POST['email']);



	if (empty($data[0]) && $data[0] = ' ') 
		$err[] = "Пустая фамилия.";
	elseif (stristr($data[0], ' ')) 
		$err[] = "В фамилии присутствует пробел.";
		
	if (empty($data[1]) && $data[1] = ' ') 
		$err[] = "Пустое имя.";
	elseif (stristr($data[1], ' '))
		$err[] = "В имени присутствует пробел.";
		
	if (empty($data[2]) && $data[2] = ' ') 
		$err[] = "Пустое отчество.";
	elseif (stristr($data[2], ' ')) 
		$err[] = "В отчестве присутствует пробел.";

        if (empty($data[3]) && $data[3] = ' ')
		$err[] = "Пустой номер телефона.";
	elseif (stristr($data[3], ' ')) 
		$err[] = "В номере телефона присутствует пробел.";
	elseif (strlen($data[3]) != 11 )
		$err[] = "Неверная запись номера телефона. Должен содержать 11 символов, начало с 7 или 8";
	
	if (empty($data[4]) && $data[4] = ' ')
		$err[] = "Пустой E-mail.";
	elseif (stristr($data[4], ' ')) 
		$err[] = "В E-mail присутствует пробел.";
	elseif (is_numeric(strripos($data[4], '@')) != true || (substr($data[4], - 4, 4) != ".com" and 
															substr($data[4], - 3, 3) != ".ru" and 
															substr($data[4], - 3, 3) != ".ua"))
		$err[] = "Неверная запись E-mail. Должнен содержать @, разрешенные почты - .com, .ru, .ua";

	if (empty($err)) {
		if (empty($data[3])) $data[3] = "---";
		if (empty($data[4])) $data[4] = "---";
		
		
		echo "ФИО: $data[0] $data[1] $data[2]</br>";
		echo "Телефон: $data[3]</br>";
		echo "E-mail: $data[4]</br>";
	}
		
		else {
			echo "Запись данных не удалась. Причина:</br>";
			foreach ($err as $value) echo "$value</br>";
		}
		?>
			</li></ul>
		</div>
	</body>
</html>