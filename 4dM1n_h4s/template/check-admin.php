<?php
session_start();
if (!isset($_SESSION['admin'])) {
    header("Location: /4dM1n_h4s/login/index.php");
}
?>