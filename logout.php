<?php

require_once("config.php");


destroySession("ThisUser");


header("Location:index.php");
die();

?>