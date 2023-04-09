<?php 
  include 'inc_head.php';
  session_destroy();
?>

<!doctype html>
<html lang="ko">
  <head>
    <meta charset="utf-8">
    <title>Sign Out</title>
  </head>
  <body>
    <?php
      if ( $ss_session ) {
        session_destroy();
        header("Location: index.html");
        exit;
      } else {
        header("Location: index.html");
      }
    ?>
  </body>
</html>