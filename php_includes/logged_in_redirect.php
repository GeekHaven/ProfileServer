<?php

include_once 'dbconnect.php';

if(isset($_SESSION['user']))
{
header("Location: form.php");
}
?>