<?php
$base = '../../../';
session_start();
if(!isset($_SESSION['admin']))
	die;
if(isset($_POST['select'])) {
	$id = $curr = $_POST['curr'];
	file_put_contents($base."include/id",$id);
} else {
	$id = intval(file_get_contents($base."include/id"));
	$curr = $_POST['curr']? $_POST['curr'] : $id;
}
require $base.'include/mysql-config.php';
$stmt = $l->prepare('select count(*) from access where test = ?');
$stmt->bind_param('d', $curr);
$stmt->execute();
$stmt->bind_result($access);
$stmt->fetch();
$stmt->close();
$stmt = $l->prepare('select count(*) from success where test = ?');
$stmt->bind_param('d', $curr);
$stmt->execute();
$stmt->bind_result($success);
$stmt->fetch();
$stmt->close();

if(!isset($_SESSION['data'])) {
	$_SESSION['data'] = array();
	$_SESSION['result'] = array();	
}

require $base.'include/tests/response_'.$curr.'.php';

$response['id'] = $id;
$response['curr'] = $curr;
$response['access'] = $access;
$response['success'] = $success;
echo json_encode($response);
?>