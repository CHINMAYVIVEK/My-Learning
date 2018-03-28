<?php
 session_start();
    include ('connection.php');

  if(!isset($_SESSION['id']) || (trim($_SESSION['id']) == ''))
      {
        echo '<script language="javascript">';
        echo 'alert("Not Authorised"); location.href="index.php"';
        echo '</script>';
      }
     $id = $_SESSION['id'];
     $ad_name= $_SESSION['name'];
     $ad_level =  $_SESSION['level'];
     $ad_email = $_SESSION['email']


?>
