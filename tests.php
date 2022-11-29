<?php
include('./includes/connect.php');



$result = pg_query($dbConn, "SELECT id FROM public.users WHERE username LIKE 'Kevin' AND passwordhash LIKE '81dc9bdb52d04dc20036dbd8313ed055'");

$id = pg_fetch_assoc($result);

$_SESSION['userid'] = $id['id'];

echo $_SESSION['userid'];

?>