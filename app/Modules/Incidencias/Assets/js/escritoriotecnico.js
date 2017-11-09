 $('#tabla1')
     .on("click", "tbody tr", function() {
         //procesarsolicitud(this.id);
         //contrato(this.id);

         location.href = dire + '/incidencias/inbox/inbox/' + this.id;
     })
     .dataTable({
         processing: true,
         serverSide: true,
         ajax: $url + "activas",
         oLanguage: datatableEspanol,
         columns: [
             { data: 'incidencias.created_at', name: 'created_at' },
             { data: 'caso', name: 'incidencias.caso' },
             { data: 'dni', name: 'personas.dni' },
             { data: 'nombres', name: 'personas.nombres' },
             { data: 'incidencias.estatus', name: 'estatus' },
         ]
     });
 $('#tabla2')
     .on("click", "tbody tr", function() {
         //procesarsolicitud(this.id);
         //contrato(this.id);

         location.href = dire + '/incidencias/inbox/inbox/' + this.id;
     })
     .dataTable({
         processing: true,
         serverSide: true,
         ajax: $url + "cerrados",
         oLanguage: datatableEspanol,
         columns: [
             { data: 'incidencias.created_at', name: 'created_at' },
             { data: 'caso', name: 'incidencias.caso' },
             { data: 'dni', name: 'personas.dni' },
             { data: 'nombres', name: 'personas.nombres' },
             { data: 'incidencias.estatus', name: 'estatus' },
             { data: 'incidencias.cierre', name: 'estatus' },
         ]
     });