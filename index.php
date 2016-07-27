<?php
$request  = str_replace("/profileserver/", "", $_SERVER['REQUEST_URI']);
$params = split("/", $request);

$pages = array("login", "register", "attendance","logout");


if(in_array($params[0], $pages)) {
	include($params[0].".php");
} else if($params[0]=="") {
	include "home.html";
} else if($params[0]=="edit") {
	include "form.php";
} else if($params[0]=="404") {
	include "php_includes/404.php";
} else {
	$_GET['roll_no'] = $params[0];
	include 'user.php';
}
?>