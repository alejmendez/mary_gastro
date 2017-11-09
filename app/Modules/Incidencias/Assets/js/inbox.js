var aplicacion, $form, tabla;
$(function() {
    chats($id);
    $("#subir").on('click', function(e) {
        e.preventDefault();
        $("#upload:hidden").trigger('click');
    });
    $('#formulario').submit(function() {
        $(this).ajaxSubmit({
            'url': dire + '/incidencias/inbox/inbox/msj',
            'type': 'POST',
            'success': function(r) {
                aviso(r);
                $('#texto').val('');
                $('#upload').val('');
                if (r.s = 's') {
                    chats($id);
                }
            }
        });
        return false;
    });

    $('#cerrar').on('click', function() {
        $.ajax({
            'url': dire + '/incidencias/inbox/inbox/cierre',
            'method': 'POST',
            'data': {
                'id': $id
            },
            'success': function(r) {
                location.reload();
            }
        });
    });

    setInterval('chats($id)', 2000);
});

function chats($id) {

    $.ajax({
        url: dire + '/incidencias/inbox/inbox/chats',
        type: 'POST',
        data: {
            'id': $id,
        },
        success: function(r) {
            //console.log(r);
            msjs(r);
        }
    });
}

function msjs(data) {
    $('#msj').html('');
    var $clase;
    var foto;
    var archivo;
    for (var i in data) {

        foto = $foto + '/' + data[i].foto
        data[i].archivo;
        archivo = '';

        if (data[i].archivo == '') {
            clases = 'none';
        } else {
            clases = 'block';
        }

        if (data[i].quien == 'yo') {
            $('#msj').append(
                '<li class="left clearfix admin_chat">\
                    <span class="chat-img1 pull-right">\
                        <img src="' + foto + '" alt="User Avatar" class="img-circle">\
                    </span>\
                    <div class="chat-body1 clearfix">\
                        <p>' + data[i].msj + '<br>\
                        <img src="' + data[i].archivo + '" alt="" class=""  style="width: 500px;display: ' + clases + ';"></p>\
                        <div class="chat_time pull-left">' + data[i].fecha + '</div>\
                    </div>\
                  </li>'
            );

        } else if (data[i].quien == 'el') {
            $('#msj').append(
                '<li class="left clearfix">\
                    <span class="chat-img1 pull-left">\
                        <img src="' + foto + '" alt="User Avatar" class="img-circle">\
                   </span>\
                    <div class="chat-body1 clearfix">\
                        <p>' + data[i].msj + '</p>\
                        <img src="' + data[i].archivo + '" alt="" class="" style="width: 500px;display: ' + clases + ';"></p>\
                        <div class="chat_time pull-right">' + data[i].fecha + '</div>\
                    </div>\
                </li>'
            );
        }
    }
}