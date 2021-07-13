<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
else{
  session_destroy();
  session_unset();
  session_start();
}
