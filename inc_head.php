<?php
  session_start();
  if( isset( $_SESSION[ 'username' ] ) ) {
    $ss_login = TRUE;
    echo "hi";
  }
  else {
    echo "hello";
  }
?>