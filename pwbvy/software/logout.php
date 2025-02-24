<?php
 session_start();
 if($_SESSION['user_type']==1){
session_destroy();
header('location:login.php');
}
 if($_SESSION['user_type']==2){
session_destroy();
header('location:login.php');
}
 if($_SESSION['user_type']==3){
session_destroy();
header('location:login.php');
}else{	session_destroy();header('location:login.php');}
?>