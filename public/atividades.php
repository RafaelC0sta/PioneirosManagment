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
                  echo "<td class='p-4 text-center' id='local' data-label='Local'>" . htmlspecialchars($row['local']) . "</td>";
                  echo "<td class='p-4 text-center' data-label='Data de Início'>" . htmlspecialchars($row['data_inicio']) . "</td>";
                  echo "<td class='p-4 text-center' data-label='Data de Fim'>" . htmlspecialchars($row['data_fim']) . "</td>";
                  echo "<td class='p-4 text-center' data-label='Noites de Campo'>" . htmlspecialchars($row['noites_campo']) . "</td>";
                  echo "<td class='p-4 text-center' data-label='Tema'>" . htmlspecialchars($row['tema']) . "</td>";
                  echo "<td class='p-4 text-center' data-label='Imaginário'>" . htmlspecialchars($row['imaginario']) . "</td>";
                  echo "<td class='p-4 text-center' data-label='Ementa'>" . htmlspecialchars($row['ementa']) . "</td>";
                  echo "<td class='p-4 text-center' data-label='Observações'>" . htmlspecialchars($row['observacoes']) . "</td>";
                  echo "<td class='p-4 text-center' data-label='Presencas'>
                          <button class='ver-presencas bg-blue-500 text-white px-2 py-1 rounded' data-id='{$row['id']}'>Ver</button>
                        </td>";
                  if ($cargo === "Secretario") {
                    echo "<td data-label='Ações'><a href='cargos/secretario/editar_atividade.php?id=" . htmlspecialchars($row['id']) . "'><div class='icon'><img src='../images/editing.png' alt='edit_icon' style='width: 25px;'></div></a></td>";
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

  <div id="modalPresencas" class="fixed inset-0 bg-black bg-opacity-50 hidden items-center justify-center z-50">
    <div class="bg-white p-6 rounded-lg w-full max-w-3xl max-h-[80vh] overflow-y-auto">
      <div class="flex justify-between items-center mb-4">
        <h2 class="text-xl font-bold">Presenças</h2>
        <button id="fecharModal" class="text-gray-600 hover:text-gray-900">&times;</button>
      </div>
      <div id="conteudoPresencas">

      </div>
    </div>
  </div>

<script>
  document.querySelectorAll(".ver-presencas").forEach(button => {
    button.addEventListener("click", function() {
      const atividadeId = this.getAttribute("data-id");

      fetch(`../private/get_presencas.php?id=${atividadeId}`)
        .then(response => response.text())
        .then(data => {
          document.getElementById("conteudoPresencas").innerHTML = data;
          document.getElementById("modalPresencas").classList.remove("hidden");
        });
    });
  });

  document.getElementById("fecharModal").addEventListener("click", () => {
    document.getElementById("modalPresencas").classList.add("hidden");
  });
</script>

</body>
</html>