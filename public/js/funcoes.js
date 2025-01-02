function confirmDelete() {
    let texto = "DESEJA MESMO APAGAR ESTE REGISTO ?";
    if (confirm(texto) == true) {
        texto = "Apagar";
    } else {
        texto = "Nao apagar";
    }
}