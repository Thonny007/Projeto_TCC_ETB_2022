$.ajax({
    url: '../tabelaClientes.php?id=1',
    method: 'get',
    success(data){
        $('#data').html(data);
    }
});