<?php 
    require "connection.php";

    $nome = $_POST['nome'];
    $id_cne = $_POST['id_cne'];
    $dt_nascimento = date('Y-m-d', strtotime($_POST['dt_nascimento']));
    $equipa = $_POST['equipa'];
    $cargo = $_POST['cargo'];
    $etapaprogresso = $_POST['etapaprogresso'];
    $noitescampo = $_POST['noitescampo'];
    $observacoes = $_POST['observacoes'];

    $equipasValidas = ['Karol Wojtyla', 'Nelson Mandela', 'Salgueiro Maia'];
    if (!in_array($equipa, $equipasValidas)) {
        die("Tentativa inválida de alterar a equipa!");
    }
    
    $stmt = $connection->prepare("INSERT INTO pioneiros (nome, id_cne, dt_nascimento, equipa, cargo, etapa_progresso, noites_campo, observacoes) VALUES (?, ?, ?, ?, ?, ?, ?, ?) ");
    $stmt->bind_param("sissssis", $nome, $id_cne, $dt_nascimento, $equipa, $cargo, $etapaprogresso, $noitescampo, $doencas);
    

    if (!$stmt->execute()) {
        echo "Erro ao inserir da base de dados: " . $stmt->error;
    } else {
        header("Location: ../public/equipas.php");
        exit();
    }

    $stmt->close();
    $connection->close();

?>