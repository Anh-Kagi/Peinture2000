<?php
require_once("utils/session.php");

session_destroy();

header("Location: /", true, 302);
exit();
