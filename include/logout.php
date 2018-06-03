<?php
include "header.php";

if(isset($_SESSION['u_name']) and isset($_SESSION['u_role']))
{
	unset($_SESSION['u_name']);
	unset($_SESSION['u_role']);
	$_SESSION['wrongName'] = null;
}


header("Location: ../index.php");

?>