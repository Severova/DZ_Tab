<?
require('Headers.php');
require('Classes.php');
ini_set('display_errors', 1);
?>

<html>
<head>
    <title> Tabtabus </title>
    <link rel="stylesheet" type="text/css" href="mysite.css">
</head>
<body>
<?
$TaskManager = new TaskManager();

if ($TaskManager->oCurrentTask)
    $TaskManager->buildResult();
else
    $TaskManager->buildMenu();
?>
</body>
</html>