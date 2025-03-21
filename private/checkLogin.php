<?php
session_start();

if (!isset($_SESSION['pioneiro'])) {
  header("Location: login.php");
  exit;
}
