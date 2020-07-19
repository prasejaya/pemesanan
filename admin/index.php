<?php
session_start();
if (empty($_SESSION['no_meja'])){
		include "login.php";
} else {
header('location:admin.php?menu=home');
}
?>