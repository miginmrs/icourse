<?php
$base = '../../';
session_start();
if(!isset($_SESSION['user']))
	die;
$id = intval(file_get_contents($base."include/id"));
$curr = $_POST['curr']? $_POST['curr'] : $id;
require $base.'include/mysql-config.php';
$stmt = $l->prepare('replace into access (test, user) values (?,?)');
$stmt->bind_param('dd', $id, $_SESSION['user']);
$stmt->execute();
$stmt->close();
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

require $base.'include/tests/prepare_'.$id.'.php';
require $base.'include/tests/response_'.$id.'.php';

$response['id'] = $id;
$response['access'] = $access;
$response['success'] = $success;
$response['data'] = $_SESSION['data'][$id];
echo json_encode($response);
?>