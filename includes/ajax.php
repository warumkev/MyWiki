<?php
 include('connect.php');

$ajaxResult = pg_query($dbConn, "SELECT * FROM messages");

// Loop through the results and output them
while ($msg = pg_fetch_assoc($chatMessages)) {

    $id = $msg['id'];
    $content = $msg['content'];
    $sender = $msg['author_id'];
    $getSender = pg_query($dbConn, "SELECT username FROM public.users WHERE id = '$sender'");
    $getSender = pg_fetch_assoc($getSender);

  ?>
  <p><strong><?php echo $getSender['username'];?>:</strong> <span class="text-muted"><?php echo base64_decode($content);?></span></p>
  <?php } ?>
