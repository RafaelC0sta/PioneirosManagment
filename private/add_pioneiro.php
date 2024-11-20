<?php 
    require "../private/connection.php";

    $nome = $_POST['nome'];
    $id_cne = $_POST['id_cne'];
    $dt_nascimento = date('Y-m-d', strtotime($_POST['dt_nascimento']));
    $equipa = $_POST['equipa'];
    $cargo = $_POST['cargo'];
    $etapaprogresso = $_POST['etapaprogresso'];
    $noitescampo = $_POST['noitescampo'];
    $doencas = $_POST['doencas'];
    
    $stmt = $connection->prepare("INSERT INTO pioneiros (nome, id_cne, dt_nascimento, equipa, cargo, etapaprogresso, noitescampo, doencas) VALUES (?, ?, ?, ?, ?, ?, ?, ?) ");
    $stmt->bind_param("sissssis", $nome, $id_cne, $dt_nascimento, $equipa, $cargo, $etapaprogresso, $noitescampo, $doencas);
    
    if (!$stmt->execute()) {
        echo "Erro ao inserir da base de dados: " . $stmt->error;
    } else {
        echo "Pioneiro Adicionado com sucesso!";
    }
    
    $stmt->close();
    $connection->close();

?>