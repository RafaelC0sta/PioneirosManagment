<?php
require "connection.php";

$id = $_POST['id'];
$nome = $_POST['nome'];
$id_cne = $_POST['id_cne'];
$dt_nascimento = date('Y-m-d', strtotime($_POST['dt_nascimento']));
$cargo = $_POST['cargo'];
$etapaprogresso = $_POST['etapaprogresso'];
$noitescampo = $_POST['noitescampo'];
$observacoes = $_POST['observacoes'];


$stmt = $connection->prepare("UPDATE pioneiros SET nome=?, id_cne=?, dt_nascimento=?, cargo_fk=?, etapa_progresso_fk=?, noites_campo=?, observacoes=? WHERE id=?");
$stmt->bind_param("sisiiisi", $nome, $id_cne, $dt_nascimento, $cargo, $etapaprogresso, $noitescampo, $observacoes, $id);


if (!$stmt->execute()) {
  echo "Erro ao atualizar na base de dados: " . $stmt->error;
} else {
  header("Location: ../public/equipas.php");
  exit();
}

$stmt->close();
$connection->close();
