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
	->setUserName('Проба 610')
	->setTitleReviews('Проба 310')
	->setText('Проба 3')
	->setDate('1999-11-11')
	->setTime('00:00:03')
	->setEmail('fdgkjj@jdkjfh.com')
	->save();

var_dump($oReviews->getUserName());

$oReviews2 = Reviews::findById(1);
var_dump($oReviews2->getUserName());
$oReviews2
    ->setUserName('Проба 80')
    ->save();

var_dump($oReviews2->getUserName());
var_dump($oReviews2);

echo "</br>";
echo "</br>";

$oActPP = ActPP::findById(3);
var_dump($oActPP->dateAct);
var_dump($oActPP);
var_dump($oActPP->getSumFines());

$oActPP
	->sumFinesAdd()
	->save();

	echo "</br>";
	echo "</br>";

$oRentalContract = RentalContract::findById(3);
var_dump($oRentalContract);

$oRentalContract
	->SummAdd()
	->save();
var_dump($oRentalContract->getSumm());

echo "</br>";
echo "</br>";

$oAuto= Auto::findById(1);
$oAuto 
	->StatusAdd('2018-04-03','2018-04-10')
	->save();

var_dump($oAuto -> getStatus());
var_dump($oAuto);

echo "</br>";
echo "</br>";

$oModelAuto = ModelAuto::getListObjectByCategory ("nameModel", "idBodyAuto", "1");

var_dump($oModelAuto);