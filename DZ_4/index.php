<?php
	
require_once('Headers.php');
require_once('Classes.php');

ini_set('display_errors', 1);

	
$dsn = 'mysql:dbname=Car_db;host=localhost';
$user = 'root';
$password = '';

try {
    Object::$db = new PDO($dsn, $user, $password);
} catch (PDOException $e) {
    echo 'Подключение не удалось: ' . $e->getMessage();
}

$oReviews = new Reviews();

$oReviews 
	->setUserName('Проба 4')
	->setTitleReviews('Проба 3')
	->setText('Проба 3')
	->setDate('1999-11-11')
	->setTime('00:00:03')
	->setEmail('fdgkjj@jdkjfh.com')
	->save();

var_dump($oReviews->getUserName());

$oReviews2 = Reviews::findById(1);

$oReviews2
    ->setUserName('Проба 6')
    ->save();

var_dump($oReviews2->getUserName());
var_dump($oReviews2);







