<?php

session_start();
include('./includes/connect.php');

if (!isset($_SESSION['loggedin'])) {
  header("Location: home.php");
} else {

 $id = $_SESSION['userid'];

 pg_query($dbConn, "DELETE FROM public.users WHERE id=$id");

 session_destroy();

 sleep(1);

 header("Location: home.php");

}

?>
