<?php
require_once "Session.php";
Session::start();
Session::removeAll();
header("Location: index.php");
exit;