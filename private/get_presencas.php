<?php
    require("connection.php");

    if(!isset($_GET['id'])) {
        echo "ID da atividade nao fornecido";
        exit;
    }

    $atividade_id = intval($_GET['id']);

    $query = "SELECT p.nome, pr.status 
                FROM presencas pr
                JOIN pioneiros p ON pr.pioneiro_fk = p.id
                WHERE pr.atividade_fk = ?";
    
    $stmt = $connection->prepare($query);
    $stmt->bind_param("i", $atividade_id);
    $stmt->execute();

    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        echo "<table class='w-full border-collapse border'>";
        echo "<thead class='bg-gray-600 text-white'>
                <tr>
                    <th class='p-3 text-center'>Nome</th>
                    <th class='p-3 text-center'>Status</th>
                </tr>
            </thead><tbody class='divide-y'>";
        while ($row = $result->fetch_assoc()) {
            $statusClass = $row['status'] === 'presente' ? 'text-green-600' : 'text-red-600';
            echo "<tr>
                    <td class='p-3 text-center'>" . htmlspecialchars($row['nome']) . "</td>
                    <td class='p-3 text-center $statusClass'>" . htmlspecialchars($row['status']) . "</td>
                </tr>";
        }
        echo "</tbody></table>";
    } else {
        echo "<p>Nenhuma presenca registada para esta atividade.</p>";
    }
?>