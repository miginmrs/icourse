<?php 
session_start(); 
$curr = $_POST['curr'];
$result = $_POST['result'];
$expected = $_SESSION['result'][$curr];
if($expected != $result) {
	die;
}
require '../include/mysql-config.php';
$stmt = $l->prepare('replace into success (test, user) values (?,?)');
$stmt->bind_param('dd', $curr, $_SESSION['user']);
$stmt->execute();
$stmt->close();
die('1');
?>