function formatDin(value) {
    var valor = value.replace(/\D/g, ''); // Remove non-numeric characters
    valor = parseFloat(valor / 100).toFixed(2); // Convert to BRL and format
    return 'R$ ' + valor.replace('.', ',').replace(/(\d)(?=(\d{3})+(?!\d))/g, '$1.');
}