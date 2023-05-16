<?php
require_once('root/config.php');
session_start();
$userid = $_SESSION['userid'];
unset($_SESSION['userid']);
session_destroy();
redirect_page(SITE_URL);

?>