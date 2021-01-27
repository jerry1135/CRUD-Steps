<?php
 session_start();
 session_destroy();

 session_unset($_SESSION['userid']);
 header('location:login.php');
 exit;



?>