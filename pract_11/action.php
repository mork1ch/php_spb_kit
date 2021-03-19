<?php

	class Form {
		// public $err = [];
		// public $data = [];
		
		function __construct() {
			if(isset($_POST['lname'])) $this->data[0]  = ($_POST['lname']);
			if(isset($_POST['fname'])) 	$this->data[1]  = ($_POST['fname']);
			if(isset($_POST['tname'])) 	$this->data[2]  = ($_POST['tname']);
			if(isset($_POST['telephone'])) 		$this->data[3]  = ($_POST['telephone']);
			if(isset($_POST['email'])) 		$this->data[4]  = ($_POST['email']);
		}
		
		function Check() {
			$data = $this->data;
			
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
			elseif (strlen($data[3]) != 12 ||  (substr($data[3], 0, 2) != "8" and
												substr($data[3], 0, 2) != "7"))
				$err[] = "Неверная запись номера телефона. Должен содержать 11 символов, начало с 7, 8";
			
			if (empty($data[4]) && $data[4] = ' ')
				$err[] = "Пустой E-mail.";
			elseif (stristr($data[4], ' ')) 
				$err[] = "В E-mail присутствует пробел.";
			elseif (is_numeric(strripos($data[4], '@')) != true || (substr($data[4], - 4, 4) != ".com" and 
																	substr($data[4], - 3, 3) != ".ru" and 
																	substr($data[4], - 3, 3) != ".ua"))
				$err[] = "Неверная запись E-mail. Должнен содержать @, разрешенные почты - .com, .ru, .ua";
		}
		
		function Display() {
			if (empty($err)) {
				$data = $this->data;
				
				if (empty($data[3])) $data[3] = "---";
				
				if (empty($data[4])) $data[4] = "---";
				else {
					if ($data[4] == "M") $data[4] = "Мужской";
					if ($data[4] == "W") $data[4] = "Женский";
				}
				
				if (empty($data[5])) $data[5] = "---";
				if (empty($data[6])) $data[6] = "---";
				if (empty($data[7])) $data[7] = "---";
				
				if (empty($data[10])) $active = "---";
				else $active = implode(',', $data[10]);
				$data[10] = $active;
				
				if (empty($data[11])) $data[11] = "---";
				
				echo "ФИО: $data[0] $data[1] $data[2]</br>";
				echo "Телефон: $data[3]</br>";
				echo "E-mail: $data[4]</br>";
			}
			else {
				echo "Вывод данных не удался. Причина:</br>";
				foreach ($err as $value) echo "$value</br>";
			}
		}
		
		function Write() {
			$data = $this->data;
			if (empty($data[3])) $data[3] = "---";
			
			if (empty($data[4])) $data[4] = "---";
			
			if (empty($err)) {
				$fp = fopen ('data/profiles.txt', 'a+');
				foreach ($data as $key => $values) {
					fwrite ($fp, "$data[$key] ");
				}
				fwrite ($fp, PHP_EOL);
				fclose ($fp);
				echo "Данные записаны!";
			}
			else echo "Запись данных не удалась.";
		}
	}
	
	$form = new Form();
	if (!empty($_POST)) {
		$form->Check();
		$form->Display();
		$form->Write();
	}
?>