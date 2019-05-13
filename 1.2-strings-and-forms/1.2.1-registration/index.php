<?php 

if (!preg_match("/^[a-zA-Z0-9]+$/",$_POST['login'])){
  echo "Логин  не верный формат<br>";
} else {
echo "Логин соответствует <br>";
}

if(strlen($_POST['password']) < 8){
  echo "Пароль не соответствует<br>";
} else {
  echo "Пароль соответствует<br>";
}

if (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
  echo "Почта не соответствует<br>";
} else {
  echo "Почта соответствует<br>";
}

if(strlen($_POST['firstName']) < 0){
  echo "Пол 'Имя' пустое<br>";
} else {
  echo "Пол 'Имя' не пустое<br>";
}

if(strlen($_POST['lastName']) < 0){
  echo "Пол 'Фамилия' пустое<br>";
} else {
  echo "Пол 'Фамилия' не пустое<br>";
}

if(strlen($_POST['middleName']) < 0){
  echo "Пол 'Отчество' пустое<br>";
} else {
  echo "Пол 'Отчество' не пустое<br>";
}

$code = str_replace(' ', '', $_POST['code']);
$code = strtolower($code);

if(strcmp('nd82jaake', $code) == 0){
  echo "Кодовое слово совподает<br>";
} else {
  echo "Кодовое слово не совподает<br>";
}

