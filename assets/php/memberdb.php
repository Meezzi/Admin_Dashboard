<?php
  session_start();
  
  $db = new mysqli("localhost","root","toor","project_member");
  /* db서버  변경시 수정해야 함 */
  $db->set_charset("utf8");

  function mq1($sql){
    global $db;
    return $db->query($sql);
  }

  ?>