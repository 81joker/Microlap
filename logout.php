<?php
require_once("config/config.php");
unset($_SESSION['SBUser']);
header('Location: login.php');
