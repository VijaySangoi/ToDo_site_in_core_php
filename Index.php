<?php
session_start();
$_SESSION['UID'] = NULL;
header('Location:html/Login.php');

