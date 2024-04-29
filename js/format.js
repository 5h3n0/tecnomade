function formatCep(input) {
    let valor = input.value.replace(/\D/g, '');
    if (valor.length === 8) {
        valor = valor.replace(/(\d{5})(\d{3})/, '$1-$2');
    } 
    input.value = valor;
}
