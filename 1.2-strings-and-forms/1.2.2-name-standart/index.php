<?php

$fullName = mb_convert_case($_POST['firstName'],MB_CASE_TITLE,"UTF-8");
$lastName = mb_convert_case ($_POST['lastName'],MB_CASE_TITLE,"UTF-8");
$middleName = mb_convert_case ($_POST['middleName'],MB_CASE_TITLE,"UTF-8");

$fio = [iconv_substr($fullName, 0, 1, "UTF-8"), 
        iconv_substr($lastName, 0, 1, "UTF-8"), 
        iconv_substr($middleName, 0, 1, "UTF-8")];

$surnameAndInitials = 'Иванов И.И.';


echo "Полное имя: '$fullName $lastName $middleName'<br>";
echo "Фамилия и инициалы: '$lastName $fio[0]. $fio[2].'<br>";
echo "Аббревиатура: '$fio[0]$fio[1]$fio[2]'<br>";
?> 