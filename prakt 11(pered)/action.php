<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <title>Проверка регистрации</title>
</head>
<body>

    <?php

        class Form{

            //$data = []; //Приходится коментировать, потому что denver не воспринимает обьявление массива. Хз почему
            //$osibki = [];

            function __construct() {
                $this->data[familiy] = ($_POST['familiy']);
                $this->data[name] = ($_POST['name']);
                $this->data[otch] = ($_POST['otch']);
                $this->data[birthday] = ($_POST['birthday']);
                $this->data[pol] = ($_POST['pol']);
                $this->data[group] = ($_POST['group']);
                $this->data[country] = ($_POST['country']);
                $this->data[adress] = ($_POST['adress']);
                $this->data[tel] = "7".($_POST['tel']);
                $this->data[email] = ($_POST['email']);
                $this->data[hobbi] = ($_POST['hobbi']);
                $this->data[dop_inf] = ($_POST['dop_inf']);
            }

            function Proverka(){
                $data = $this->data;

                // Проверка ФИО происходит в index.html . Но если нужно я могу прописать похожие регулярные выражения как я прописал в email и телефоне. 
                // А также чтобы избавиться от всех пробелов в ФИО нужно просто дать разрешение - /S(любой непробельный символ)
                
                //familiy
                //name
                //otch

                if(empty($data[pol])){
                    $data[pol] = "не указанно";
                }

                if(empty($data[birthday])){
                    $data[birthday] = "не указанно";
                }

                if(empty($data[country])){
                    $data[country] = "не указанно";
                }
                if(empty($data[adress])){
                    $data[adress] = "не указанно";
                }
                if (empty($hobbi)){
                    $data[hobbi] = "не указанно";
                }


                if(empty($data[tel])){
                    $osibki[] = "Номер не указан";
                }elseif(!preg_match("/[0-9]{10}$/", $data[tel])) $osibki[] = "Телефон задан в неверном формате(напишите 10цифр после '+7')";

                if(empty($data[email])){
                    $osibki[] = "email не указан";
                }elseif(!preg_match("/[0-9A-Za-z]*[@gmail.com|@mail.ru]$/", $data[email])) $osibki[] = "Мейл введен неверно";
                
            }

            function Vivod() {
                if(empty($osibki)){
                    $data = $this->data;

                    if (!empty($data[hobbi])){
                        $hobbi = implode(',', $data[hobbi]);
                        $data[hobbi] = $hobbi;
                    }
                    if (empty($hobbi)) $data[hobbi] = "не указанно";
                    
                    echo "<h1>Проверьте форму</h1>";
                    echo "<p>Все правильно ?</p>";

                    echo "</br>";

                    echo "ФИО: $data[familiy] $data[name] $data[otch]</br>";
                    echo "Дата рождения: $data[birthday]</br>";
                    echo "Пол: $data[pol]</br>";
                    echo "Группа: $data[group]</br>";
                    echo "Страна: $data[country]</br>";
                    echo "Адрес: $data[adress]</br>";
                    echo "Телефон: $data[tel]</br>";
                    echo "E-mail: $data[email]</br>";
                    echo "Увлечения: $data[hobbi]</br>";
                    echo "Дополнительно: $data[dop_inf]</br>";

                    echo "</br>";
                    
                }else{
                    echo "<h1>Были выявлены ошибки</h1>";
                    echo "</br>";

                    foreach ($osibki as $value) echo "$value</br>";

                    echo "</br>";
                    echo "<a href='index.html'>Перезаполнить таблицу</a>";
                }
            }

            function Zapis(){
                $data = $this->data;
                
                if(empty($osibki)) { 
                    $fp = fopen ('info_pers/bd.txt', 'a+');
                    foreach ($data as $key => $values) {
                        fwrite ($fp, "$data[$key] ");
                    }

                    fwrite ($fp, PHP_EOL);
                    fclose ($fp);
                    echo "Данные записаны!";
                }else{ echo "<h1>Были выявлены ошибки</h1>"; }
            }
        }

        $form = new Form();
        if (!empty($_POST)) {
            $form->Proverka();
            $form->Vivod();
            $form->Zapis();
        }

    ?>

</body>
</html>