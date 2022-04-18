const table = $('#table_cliente');
const btn = $('#btn_mostrar');
table.hide();
btn.on('click', () => {
    table.toggle();
});