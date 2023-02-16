<?php
require_once __DIR__ . '/../db.php';
session_start();
//DESTROY SESSION
$lastPage = $_SESSION['lastPage'];
$_SESSION = array();
session_destroy();
if (isset($lastPage)) {
    header("Location: /" . $lastPage);
} else {
    header("Location: /index.php?name=Home");
}
exit;