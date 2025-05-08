<?php

$title = "EduFreeDocs - Suprime Administrator Schools";

if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

if (isset($_SESSION['userType'])) {
    if ($_SESSION['userType'] != 'SupAdministrator') {
        header("Location: Home.php");
        exit();
    }
}

include 'includes/header.inc.php';

if (isset($_SESSION['SchoolName_err'])) {
    $SchoolName_err = $_SESSION['SchoolName_err'];
} else {
    $SchoolName_err = "";
}
ob_start();
?>

<?php
$SupAdmin_content = ob_get_clean();

unset($_SESSION['SchoolName_err']);
include 'includes/SupAdmin.inc.php';
