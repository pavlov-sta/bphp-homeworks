# Задача 1. Роутер

## Описание
Во всех современных сервисах есть системы, обрабатывающие маршруты - роутеры.
Они нужны для того, чтобы в зависимости от контекста вызвать необходимый скрипт
для обработки и предоставления нужной информации пользователю. 

Он может работать, например, следующим образом:
1. В строке запроса, кроме адреса сайта, присутствуют так же параметры `GET` запроса.
Пример такой строки: `www.example.com/index.php?article_id=123123`.
Т.к. все что идет после знака вопрос (`?`) является параметрами `GET` запроса,
то в таком случае, используя переменную `$_GET`, мы можем получить значения параметра `article_id`.
2. Получая значение параметра `article_id`, можно понять какую статью нам необходимо открыть.
3. Вызывается скрипт, которому передается это значение и после чего, пользователю показывается нужная статья.

В рамках этого задания, вам необходимо разработать систему маршрутизации.

## Техническое задание
* В файле [availableLinks.php](./availableLinks.php) находится массив, элементами которого являются доступные 
страницы на сайте. Значения уже есть в файле [index.php](./index.php) в переменной `$availableLinks`.
* Получив все параметры `GET` запроса нужно:
    1. Проверить, есть ли параметер `page`.
    2. Если такого параметра нет, то нужно переадресовать пользователя на страницу `error.php` со статусом `Bad Request`.
    Файл `error.php` нужно предварительно создать. Сообщение об ошибке может быть любое.
    3. Если нужный параметр присутствует, то нужно проверить, что такая страница существует (есть ли в массиве).
    Если страницы не существует, то нужно переадресовать пользователя на страницу `404.php` со статусом `Not Found`. 
    Страницу `404.php` нужно предварительно создать. Сообщение об ошибке может быть любое.
    4. Если страница существует, то нужно вывести на экран сообщение:
    `Вы находитесь на странице <b>%pagename%</b>`.

## Пример
Пользователь открыл следующую ссылку: `example.com/index.php?page='news'`. Такая ссылка доступна, 
поэтому он увидит сообщение на экране: `Вы находитесь на странице news`. Если он откроет ссылку: `example.com/index.php`,
то он увидит сообщение об ошибке, о неверном запросе.

## Алгоритм выполнения
1 Создать класс `Router`, который будет обрабатывать параметры `GET` запроса. Механизм обработки *примерно* следующий:
    * В конструктор класса передается значение;
    * Далее вызывается метод, который проверяет параметр по требованиям из следующего пункта и выбрасывает исключение
    или же возвращает `true`, в случае удовлетворения условиям.
2. В файле [index.php](./index.php) получить параметры `GET` запроса и проверить их согласно требованиям.
3. Если метод, возвращает `true`, то отображаем пользователю сообщение об успехе, если выбрасывается исключение,
то переадресуем пользователя на нужную страницу, которая соответствует выброшенному исключению.
