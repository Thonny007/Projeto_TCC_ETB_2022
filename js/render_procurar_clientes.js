const proc = $('#btn-procurar');
const nome = $("#name");

function chamarTabela() {
    $.ajax({
         url: `tabelaClientes.php?name=${nome.val()}`,
         method: 'get',
         success(data) {
             $('#data').html(data);
         },
        error(e){
            $('#data').html(e);
        }

     });
}

proc.on("click", chamarTabela);