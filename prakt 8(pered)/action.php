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

            //$data = []; //Приходится коментировать, потому что denver не воспринимает обьявление массива. Хз почему
            //$osibki = [];

            $data[familiy] = ($_POST['familiy']);
            $data[name] = ($_POST['name']);
            $data[otch] = ($_POST['otch']);

            $data[birthday] = ($_POST['birthday']);
                if(empty($data[birthday])){
                    $data[birthday] = "не указанно";
                }

            $data[pol] = ($_POST['pol']);

            $data[group] = ($_POST['group']);
            
            $data[country] = ($_POST['country']);
            if(empty($data[country])){
                $data[country] = "не указанно";
            }

            $data[adress] = ($_POST['adress']);
            if(empty($data[adress])){
                $data[adress] = "не указанно";
            }

            $data[tel] = "7".($_POST['tel']);
            if(empty($data[tel])){
                $osibki[] = "Номер не указан";
            }elseif(!preg_match("/^[0-9]{10,10}$/", $data[tel])) $osibki[] = "Телефон задан в неверном формате(напишите 10цифр после '+7')";

            $data[email] = ($_POST['email']);
            if(empty($data[email])){
                $osibki[] = "email не указан";
            }elseif(!preg_match("/[0-9A-Za-z]*[@gmail.com|@mail.ru]$/", $data[email])) $osibki[] = "Мейл введен неверно";

            $data[hobbi] = ($_POST['hobbi']);
            
            if (empty($date[hobbi])){
                $hobbi = implode(',', $data[hobbi]);
                $data[hobbi] = $hobbi;}
            
            $data[dop_inf] = ($_POST['dop_inf']);



            if(empty($osibki)){
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

                $fp = fopen ('info_pers/bd.txt', 'a+');
                foreach ($data as $key => $values) {
                    fwrite ($fp, "$data[$key] ");
                }
                fwrite ($fp, PHP_EOL);
                fclose ($fp);
                echo "Данные записаны!";
                
            }else{
                echo "<h1>Были выявлены ошибки</h1>";
                echo "</br>";

                foreach ($osibki as $value) echo "$value</br>";

                echo "</br>";
                echo "<a href='index.html'>Перезаполнить таблицу</a>";
            }

        ?>

    </form>

</body>
</html>