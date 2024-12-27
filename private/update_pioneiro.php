<?php 
    require "connection.php";

    $id = $_POST['id'];
    $nome = $_POST['nome'];
    $id_cne = $_POST['id_cne'];
    $dt_nascimento = date('Y-m-d', strtotime($_POST['dt_nascimento']));
    $cargo = $_POST['cargo'];
    $etapaprogresso = $_POST['etapaprogresso'];
    $noitescampo = $_POST['noitescampo'];
    $doencas = $_POST['doencas'];

    
    $stmt = $connection->prepare("UPDATE pioneiros SET nome=?, id_cne=?, dt_nascimento=?, cargo=?, etapa_progresso=?, noites_campo=?, doencas=? WHERE id=?");
    $stmt->bind_param("sisssisi", $nome, $id_cne, $dt_nascimento, $cargo, $etapaprogresso, $noitescampo, $doencas, $id);
    

    if (!$stmt->execute()) {
        echo "Erro ao atualizar na base de dados: " . $stmt->error;
    } else {
        header("Location: ../public/equipas.php");
        exit();
    }

    $stmt->close();
    $connection->close();

?>