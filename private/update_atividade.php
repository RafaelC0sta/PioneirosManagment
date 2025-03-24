<?php 
require "connection.php";

$id = $_POST['id'];
$data_inicio = date('Y-m-d', strtotime($_POST['data_inicio']));
$data_fim = date('Y-m-d', strtotime($_POST['data_fim']));
$noites_campo = $_POST['noites_campo'];
$imaginario = $_POST['imaginario'];
$tema = $_POST['tema'];
$ementa = $_POST['ementa'];
$observacoes = $_POST['observacoes'];

$sql = "UPDATE atividades SET data_inicio = ?, data_fim = ?, noites_campo = ?, imaginario = ?, tema = ?, ementa = ?, observacoes = ? WHERE id = ?";
$stmt = $connection->prepare($sql);
$stmt->bind_param("ssissssi", $data_inicio, $data_fim, $noites_campo, $imaginario, $tema, $ementa, $observacoes, $id);

if (!$stmt->execute()) {
  echo "Erro ao atualizar na base de dados: " . $stmt->error;
} else {
  header("Location: ../public/atividades.php");
  exit();
}

$stmt->close();
$connection->close();

?>