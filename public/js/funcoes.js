function confirmDelete(id) {
    let texto = "DESEJA MESMO APAGAR ESTE REGISTO ?";
    if (confirm(texto)) {
        window.location.href = `../private/delete_pioneiro.php?id=${id}`;
    }
}