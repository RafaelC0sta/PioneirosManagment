<?php
require '../private/checkLogin.php';
require '../private/connection.php';

$cargo = $_SESSION['cargo'];
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Atividades</title>
  <script src="https://unpkg.com/@tailwindcss/browser@4"></script>
</head>

<body>
  <?php include("header.php"); ?>

  <div class="p-6">
    <div class="max-w-[1650px] mx-auto">
      <h2 class="text-3xl font-bold">Atividades</h2>
      <div class="mt-6 bg-white shadow-sm rounded-md overflow-hidden">
        <div class="overflow-x-auto">
          <?php
          $selectAtividades = "SELECT * FROM atividades";
          $result = $connection->query($selectAtividades);

          if ($result && $result->num_rows > 0):
          ?>
            <table class="w-full min-w-full border-collapse">
              <thead class="bg-gray-600 text-white">
                <tr>
                  <th class="p-4 text-center">Local</th>
                  <th class="p-4 text-center">Data de Início</th>
                  <th class="p-4 text-center">Data de Fim</th>
                  <th class="p-4 text-center">Noites de Campo</th>
                  <th class="p-4 text-center">Tema</th>
                  <th class="p-4 text-center">Imaginário</th>
                  <th class="p-4 text-center">Ementa</th>
                  <th class="p-4 text-center">Observações</th>
                  <th class="p-4 text-center">Presencas</th>
                  <?php if ($cargo === "Secretario"): ?>
                    <th class="p-4 text-center" colspan="2">Ações</th>
                  <?php endif; ?>
                </tr>
              </thead>

              <tbody class="divide-y">
                <?php
                while ($row = $result->fetch_assoc()) {
                  echo "<tr class='hover:bg-gray-100'>";
                  echo "<td class='p-4 text-center' data-label='Local'>" . htmlspecialchars($row['local']) . "</td>";
                  echo "<td class='p-4 text-center' data-label='Data de Início'>" . htmlspecialchars($row['data_inicio']) . "</td>";
                  echo "<td class='p-4 text-center' data-label='Data de Fim'>" . htmlspecialchars($row['data_fim']) . "</td>";
                  echo "<td class='p-4 text-center' data-label='Noites de Campo'>" . htmlspecialchars($row['noites_campo']) . "</td>";
                  echo "<td class='p-4 text-center' data-label='Tema'>" . htmlspecialchars($row['tema']) . "</td>";
                  echo "<td class='p-4 text-center' data-label='Imaginário'>" . htmlspecialchars($row['imaginario']) . "</td>";
                  echo "<td class='p-4 text-center' data-label='Ementa'>" . htmlspecialchars($row['ementa']) . "</td>";
                  echo "<td class='p-4 text-center' data-label='Observações'>" . htmlspecialchars($row['observacoes']) . "</td>";
                  echo "<td class='p-4 text-center' data-label='Presencas'>Ver</td>";
                  if ($cargo === "Secretario") {
                    echo "<td data-label='Ações'><a href='form_update.php?id=" . htmlspecialchars($row['id']) . "'><div class='icon'><img src='../images/editing.png' alt='edit_icon' style='width: 25px;'></div></a></td>";
                    echo "<td data-label='Ações'><a href='#' onclick=confirmDelete(" . htmlspecialchars($row['id']) . ")><img alt='deleteIcon' src='../images/delete.png' style='width: 25px;'></a></td>";
                  }
                  echo "</tr>";
                }
                ?>
              </tbody>
            </table>
          <?php
          else:
            echo "<p>Não foram encontradas atividades</p>";
          endif;
          ?>
        </div>
      </div>
    </div>
  </div>
</body>

</html>