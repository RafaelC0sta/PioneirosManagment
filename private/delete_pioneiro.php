<?php
require 'connection.php';

$id = $_GET['id'];

$stmt = $connection->prepare("DELETE FROM pioneiros where id=?");
$stmt->bind_param("i", $id);

if (!$stmt->execute()) {
  echo "Erro ao eleminar na base de dados: " . $stmt->error;
} else {
  header("Location: ../public/equipas.php");
  exit();
}

$stmt->close();
$connection->close();
