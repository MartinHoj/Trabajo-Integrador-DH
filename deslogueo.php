<?php
session_start();
session_destroy();
setcookie("nombreCookie1","",-1);
setcookie("nombreCookie2","",-1);


?>