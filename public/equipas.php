<?php
    require '../private/checkLogin.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Equipas</title>
    <script src="https://unpkg.com/@tailwindcss/browser@4"></script>
</head>
<?php include("header.php");?>
<body>
    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-5 p-5">
        <div class="bg-white border border-gray-300 rounded-lg shadow-md p-4 text-center hover:shadow-xl">
            <a href="karol.php">
                <img src="../images/karol.jpg" alt="karol" class="w-full h-[250px] sm:h-[350px] rounded-lg filter grayscale">
                <h2 class="mt-3 text-xl text-blue-500">Karol Wojtyla</h2>
            </a>
        </div>
        <div class="bg-white border border-gray-300 rounded-lg shadow-md p-4 text-center hover:shadow-xl">
            <a href="nelson.php">
                <img src="../images/nelson.jpg" alt="nelson" class="w-full h-[250px] sm:h-[350px] rounded-lg filter grayscale">
                <h2 class="mt-3 text-xl text-blue-500">Nelson Mandela</h2>
            </a>
        </div>
        <div class="bg-white border border-gray-300 rounded-lg shadow-md p-4 text-center hover:shadow-xl">
            <a href="salgueiro.php">
                <img src="../images/salgueiro.jpg" alt="salgueiro" class="w-full h-[250px] sm:h-[350px] rounded-lg filter grayscale">
                <h2 class="mt-3 text-xl text-blue-500">Salgueiro Maia</h2>
            </a>
        </div>
    </div>
</body>
</html>