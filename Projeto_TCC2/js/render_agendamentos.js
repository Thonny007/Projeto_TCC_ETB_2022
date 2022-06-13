const id = $('#id_adm').val();

const confirmados = $('#confirmados');
const em_espera = $('#em_espera');
const excluidos = $('#excluidos');
const atendidos = $('#atendidos')

const div_data = $('#data');

function renderConfirmados() {
    $.ajax({
        url: `../tabelas/tabelaAgendamentosConfirmados.php?id=${id}`,
        method: 'get',
        success(data) {
            div_data.html(null);
            div_data.html(data);
        },
        error(e) {
            div_data.html(e);
        }

    });
}

function renderEmEspera() {
    $.ajax({
        url: '../tabelas/tabelaAgendamentosEspera.php',
        method: 'get',
        success(data) {
            div_data.html(null);
            div_data.html(data);
        },
        error(e) {
            div_data.html(e);
        }
    });
}

function renderExcluidos() {
    $.ajax({
        url: '../tabelas/tabelaAgendamentosExcluidos.php',
        method: 'get',
        success(data) {
            div_data.html(null);
            div_data.html(data);
        },
        error(e) {
            div_data.html(e);
        }
    });
}

function renderAtendidos() {
    $.ajax({
        url: '../tabelas/tabelaAgendamentosAtendidos.php',
        method: 'get',
        success(data) {
            div_data.html(null);
            div_data.html(data);
        },
        error(e) {
            div_data.html(e);
        }
    });
}

confirmados.on('click', renderConfirmados);
em_espera.on('click', renderEmEspera);
excluidos.on('click', renderExcluidos);
atendidos.on('click', renderAtendidos)

renderEmEspera();