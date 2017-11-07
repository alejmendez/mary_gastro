var aplicacion, $form, tabla;
$(function () {

    $('#tabla1')
    .on("click", "tbody tr", function () {
        //procesarsolicitud(this.id);
        //contrato(this.id);

        location.href = dire + '/incidencias/inbox/inbox/' + this.id;
    })
    .dataTable({
        processing: true,
        serverSide: true,
        ajax: $url + "datatable",
        oLanguage: datatableEspanol,
        columns: [
            { data: 'created_at', name: 'created_at' },
            { data: 'caso', name: 'caso' },
            { data: 'estatus', name: 'estatus' },
            { data: 'cierre', name: 'cierre' },
        ]
    });
});