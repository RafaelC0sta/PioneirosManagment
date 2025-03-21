<?php
// este if foi para resolver um pequeno bug -> overflow de requests para o login
if (session_status() === PHP_SESSION_NONE) {
  session_start();
}

$session = isset($_SESSION['pioneiro']);

if ($session) {
  $nome = $_SESSION['pioneiro'];
  $cargo = $_SESSION['cargo'];
} else {
  $nome = "";
  $cargo = "";
}

$primeiroNome = strtok($nome, " ");
?>
<script src="https://unpkg.com/@tailwindcss/browser@4"></script>

<header class="bg-blue-400 text-white relative z-1">
  <nav class="mx-auto flex items-center justify-between p-6 lg:px-8" aria-label="Global">
    <!-- Mobile menu button (only visible on small screens) -->
    <div class="flex md:hidden">
      <button id="menu-toggle" type="button" class="text-white hover:cursor-pointer">
        <span class="sr-only">Open main menu</span>
        <svg class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
        </svg>
      </button>
    </div>

    <!-- Menu always visible from md (tablet) and up -->
    <div class="hidden md:flex md:gap-x-10">
      <a href="/pioneirosequipas/public/" class="text-lg font-semibold">Home</a>
      <a href="/pioneirosequipas/public/equipas.php" class="text-lg font-semibold">Equipas</a>
      <a href="/pioneirosequipas/public/cargos/<?= htmlspecialchars($cargo); ?>" class="text-lg font-semibold"><?= htmlspecialchars($cargo); ?></a>
    </div>

    <div class="hidden md:flex md:gap-x-9">
      <a href="/pioneirosequipas/public/perfil.php" class="text-lg font-semibold"><?= htmlspecialchars($primeiroNome); ?></a>
      <a href="/pioneirosequipas/private/logout.php" class="text-lg font-semibold">Log out &rarr;</a>
    </div>
  </nav>

  <!-- Mobile Menu -->
  <div id="mobile-menu" class="hidden absolute left-0 top-full w-full bg-blue-400 px-6 opacity-0 scale-y-0 origin-top transition-all duration-500 ease-in-out overflow-hidden shadow-lg">
    <div class="space-y-2 py-4">
      <a href="/pioneirosequipas/public/" class="border block text-md font-semibold text-white hover:bg-blue-500 p-2 rounded">Home</a>
      <a href="/pioneirosequipas/public/equipas.php" class="border block text-md font-semibold text-white hover:bg-blue-500 p-2 rounded">Equipas</a>
      <a href="/pioneirosequipas/public/cargos/<?= htmlspecialchars($cargo); ?>" class="border block text-md font-semibold text-white hover:bg-blue-500 p-2 rounded"><?= htmlspecialchars($cargo); ?></a>
      <div class="py-6 space-y-1">
        <a href="/pioneirosequipas/public/perfil.php" class="border block text-md font-semibold text-white hover:bg-blue-500 p-2 rounded"><?= htmlspecialchars($primeiroNome); ?></a>
        <a href="/pioneirosequipas/private/logout.php" class="border block text-md font-semibold text-white hover:bg-blue-500 p-2 rounded">Log out</a>
      </div>
    </div>
  </div>
</header>

<script>
  const menuToggle = document.getElementById('menu-toggle');
  const mobileMenu = document.getElementById('mobile-menu');

  menuToggle.addEventListener('click', () => {
    if (mobileMenu.classList.contains('hidden')) {
      mobileMenu.classList.remove('hidden');
      setTimeout(() => {
        mobileMenu.classList.remove('opacity-0', 'scale-y-0');
      }, 10);
    } else {
      mobileMenu.classList.add('opacity-0', 'scale-y-0');
      setTimeout(() => {
        mobileMenu.classList.add('hidden');
      }, 500);
    }
  });
</script>