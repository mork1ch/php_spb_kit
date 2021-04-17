<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <title>11</title>
</head>
<body>

    <?php

        class Form{

            public $familiy,$name,$otch,$fio,$birthday,$pol,$group,$country,$adress,$tel,$email,$hobbi,$dop_inf;
            public $osibki = [];

            function __construct() {
                $this->familiy = ($_POST['familiy']);
                $this->name = ($_POST['name']);
                $this->otch = ($_POST['otch']);
                $this->fio = ($_POST['familiy']).' '.($_POST['name']).' '.($_POST['otch']);

                $this->birthday = ($_POST['birthday']);
                $this->pol = ($_POST['pol']);
                $this->group = ($_POST['group']);
                $this->country = ($_POST['country']);
                $this->adress = ($_POST['adress']);
                $this->tel = "7".($_POST['tel']);
                $this->email = ($_POST['email']);
                $this->hobbi = ($_POST['hobbis']);
                $this->dop_inf = ($_POST['dop_inf']);
            }

            function Proverka() {

                if(empty($this->familiy)){
                    $osibki[] = "Не указана фамилия";
                }elseif(!preg_match("/[A-Za-zА-Яа-я]*$/", $this->familiy)){
                    $osibki[] = "В фамилии присутствуют цифры";
                }elseif(!preg_match("/^[A-Za-zА-Яа-я]*\S*$/", $this->familiy)){
                    $osibki[] = "В фамилии присутствует пробел";
                }

                if(empty($this->name)){
                    $osibki[] = "Не указано имя";
                }elseif(!preg_match("/[A-Za-zА-Яа-я]*$/", $this->name)){
                    $osibki[] = "В имени присутствуют цифры";
                }elseif(!preg_match("/^[A-Za-zА-Яа-я]*\S*$/", $this->name)){
                    $osibki[] = "В имени присутствует пробел";
                }

                if(empty($this->otch)){
                    $osibki[] = "Не указано отчество";
                }elseif(!preg_match("/[A-Za-zА-Яа-я]*$/", $this->otch)){
                    $osibki[] = "В отчестве присутствуют цифры";
                }elseif(!preg_match("/^[A-Za-zА-Яа-я]*\S*$/", $this->otch)){
                    $osibki[] = "В отчестве присутствует пробел";
                }
                
                if(empty($this->birthday)){
                    $birthday = "не указанно";
                }

                if(empty($this->country)){
                    $country = "не указанно";
                }

                if(empty($this->adress)){
                    $adress = "не указанно";
                }elseif(preg_match("/^[0-1A-Za-zА-Яа-я]*\S*$/", $this->adress)){
                    $adress = "не указанно)";
                }

                if(empty($this->tel)){
                    $osibki[] = "Номер не указан";
                }elseif(!preg_match("/^[0-9][0-9]{10}$/", $this->tel)){
                    $osibki[] = "Телефон задан в неверном формате(напишите 10цифр после '+7')";
                }

                if(empty($this->email)){
                    $osibki[] = "email не указан";
                }elseif(!preg_match("/[0-9A-Za-z]*[@gmail.com|@mail.ru]$/", $this->email)){
                    $osibki[] = "Мейл введен неверно";
                }elseif(!preg_match("/^[0-1A-Za-zА-Яа-я]*\S*$/", $this->email)){
                    $osibki[] = "Мейл введен пробел";
                }

                if (!empty($_POST['hobbis'])){
                    $hobbis = implode(',', $this->hobbi);
                    $this->hobbi = $hobbis;
                    $_POST['hobbis'] = $this->hobbi;
                }else{
                    $this->hobbi = 'Не указанно';
                }

                if (empty($this->dop_inf)){
                    $this->dop_inf = 'Не указанно';
                }

                if(!empty($osibki)){
                    echo "<h1>Были выявлены ошибки</h1>";
                    echo "</br>";

                    foreach ($osibki as $value){
                        echo "$value</br>";
                    }
    
                    echo "</br>";
                    echo "<a href='index.html'>Перезаполнить таблицу</a>";
                }

                $GLOBALS["osibki"] = $osibki;
            }

            function Vivod() {

                echo "<h1>Проверьте форму</h1>";
                echo "<p>Все правильно ?</p>";

                echo "</br>";

                echo "ФИО: $this->fio</br>";
                echo "Дата рождения: $this->birthday</br>";
                echo "Пол: $this->pol</br>";
                echo "Группа: $this->group</br>";
                echo "Страна: $this->country</br>";
                echo "Адрес: $this->adress</br>";
                echo "Телефон: $this->tel</br>";
                echo "E-mail: $this->email</br>";
                echo "Увлечения: $this->hobbi</br>";
                echo "Дополнительно: $this->dop_inf</br>";

                echo "</br>";
            }

            function Zapis(){

                $json = json_encode($_POST,JSON_UNESCAPED_UNICODE);
                $information = json_decode($json, true);

                $fp = fopen ('info_pers/bd.txt', 'a+');
                foreach ($information as $key => $value) {
                    fwrite ($fp, "$information[$key] ");
                }

                fwrite ($fp, PHP_EOL);
                fclose ($fp);

                echo "Запись произведена успешно!";
            }
        }

        $form = new Form();
        if (!empty($_POST)) {
            $form->Proverka();
            if(empty($osibki)){
                $form->Vivod();
                $form->Zapis();
            }
        }

    ?>

</body>
</html>