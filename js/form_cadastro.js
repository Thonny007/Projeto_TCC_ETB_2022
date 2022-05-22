const table_clt = $('#table_clt');
const btn = $('#btn_mostrar');
table_clt.hide();
btn.on('click', () => {
    table_clt.toggle();
});