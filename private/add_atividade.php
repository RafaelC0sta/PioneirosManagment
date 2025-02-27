<?php
    include("connection.php");

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $local = $_POST['local'];
        $data_inicio = $_POST['data_inicio'];
        $data_fim = $_POST['data_fim'];
        $noites_campo = $_POST['noites_campo'];
        $tema = $_POST['tema'];
        $imaginario = $_POST['imaginario'];
        $ementa = $_POST['ementa'];
        $observacoes = $_POST['observacoes'];

        $query = "INSERT INTO atividades (local, data_inicio, data_fim, noites_campo, tema, imaginario, ementa, observacoes)
                    Values (?, ?, ?, ?, ?, ?, ?, ?)";
        
        $stmt = $connection->prepare($query);
        $stmt->bind_param("sssissss", $local, $data_inicio, $data_fim, $noites_campo, $tema, $imaginario, $ementa, $observacoes);

        if ($stmt->execute()) {
            $atividade_id = $stmt->insert_id;
            header("../../index.php");

            if (isset($_POST['presente'])) {
                foreach ($_POST['presente'] as $pioneiro_id) {
                    $sql_presenca = "INSERT INTO presencas (atividade_id, pioneiro_id, status) VALUES (?, ?, 'presente')";
                    $stmt_presenca = $connection->prepare($sql_presenca);
                    $stmt_presenca->bind_param("ii", $atividade_id, $pioneiro_id);
                    $stmt_presenca->execute();
                    
                    $sql_adicionarNoites = "UPDATE pioneiros SET noites_campo = noites_campo + ? WHERE id=?";
                    $stmt_atualizarNoitesCampo = $connection->prepare($sql_adicionarNoites);
                    $stmt_atualizarNoitesCampo->bind_param("ii", $noites_campo, $pioneiro_id);
                    
                    if ($stmt_atualizarNoitesCampo->execute()) {
                        header("Location: ../public/equipas.php");
                        exit();
                    } else {
                        echo "Erro ao atualizar na base de dados";
                    }
                }
            }
    
            if (isset($_POST['falta'])) {
                foreach ($_POST['falta'] as $pioneiro_id) {
                    $sql_presenca = "INSERT INTO presencas (atividade_id, pioneiro_id, status) VALUES (?, ?, 'falta')";
                    $stmt_presenca = $connection->prepare($sql_presenca);
                    $stmt_presenca->bind_param("ii", $atividade_id, $pioneiro_id);
                    $stmt_presenca->execute();
                }
            }
        } else {
            echo "Erro ao adicionar atividade: " . $connection->error;
        }
    }    
    $stmt->close();
    $stmt_atualizarNoitesCampo->close();
    $stmt_presenca->close();
    $connection->close();
?>