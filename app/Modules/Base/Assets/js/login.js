$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name=csrf-token]').attr('content')
    },
    complete: function(x, e, o) {
        $("#cargando").animate({ opacity: 0 }, {
            queue: false,
            complete: function() {
                $(this).css({ display: 'none' });
            }
        });
    },
    error: function(r) {
        var res = r.responseJSON,
            html = "";

        for (var i in res) {
            html += res[i].join("<br />") + "<br />";
        }

        new PNotify({
            title: 'Error de validacion',
            text: html,
            type: 'error',
            hide: true
        });
    },
    timeout: 0,
    cache: false
});

var app = {
    form: '',
    nombre: '',
    password: '',

    init: function() {
        this.form = $("#formulario");
        this.nombre = $("input[name='nombre']", this.form).val('').focus();
        this.password = $("input[name='password']", this.form).val('');
        this.recordar = $("input[name='recordar']", this.form);

        $("button", this.form).click(this.validarAuth);

        this.form.submit(function() {
            return false;
        });

        $(".form-control", this.form).keypress(this.validarAuth);
    },

    validarAuth: function(e) {
        if (e.type == 'click' || e.which == 13) {
            app._validarAuth();
        }
    },

    _validarAuth: function() {
        if (this.nombre.val() === '') {
            this.nombre.focus();
        } else if (this.password.val() === '') {
            this.password.focus();
        } else {
            this.buscar();

        }
    },

    buscar: function() {
        $("#boton").prop("disable", true);

        $.ajax($url + 'validar', {
            type: "POST",
            data: {
                usuario: this.nombre.val(),
                password: this.password.val(),
                recordar: this.recordar.prop("checked")
            },

            success: function(r) {
                if (r.s === "n") {
                    $("#boton").prop("disable", false);

                    new PNotify({
                        title: 'No se puedo Autenticar',
                        text: r.msj,
                        type: 'error',
                        hide: true
                    });

                    return false;
                }

                if (r.s === "s") {
                    //location.reload();
                    location.href = $url.replace(/\/+$/, '');
                }

                return false;
            }
        });
    },


};


/* $('.user').blur(function() {
    if ($(this).val() == '') {
        $('#foto').prop('src', ruta + '/user.png');
        return false;
    }
    validar($(this).val(), '.user');
});
 */


$('#register-btn').on('click', function() {
    $('#login').css('display', 'none');
    $('#registro').css('display', 'block');
    $('#recuperar').css('display', 'none');
});
$('.register-back-btn').on('click', function() {
    $('#login').css('display', 'block');
    $('#registro').css('display', 'none');
    $('#recuperar').css('display', 'none');
});
$('#forget-password').on('click', function() {
    $('#recuperar').css('display', 'block');
    $('#login').css('display', 'none');
    $('#registro').css('display', 'none');
});

$('#register-submit-btn').on('click', function() {

    console.log($('#register_password').val(), $('#rpassword').val());
    if ($('#register_password').val() != $('#rpassword').val()) {
        new PNotify({
            title: 'Error de validacion',
            text: 'Las dos claves son distintas!!',
            type: 'error',
            hide: true
        });
        return false;
    }


    $('#formulario2').ajaxSubmit({
        'url': $url + 'registro',
        'type': 'POST',
        'success': function(r) {

            if(r.s == 's'){
                new PNotify({
                    title: 'success',
                    text: r.msj,
                    type: 'success',
                    hide: true
                });

                location.reload();
            }
        }
    });
});

app.init();




//valida DNI, RIF y CORREO
function validar($dato, $id) {
    /*
    $dato = dato a validar
    $tipo = que campo validar
	
    */
    $.ajax({
        url: $url + 'foto',
        type: 'POST',
        data: {
            'usuario': $dato
        },
        success: function(r) {
            console.log();
            if (r.foto != '') {
                $('#foto').prop('src', ruta + '/' + r.foto);
            } else {
                $('#foto').prop('src', ruta + '/user.png');
            }
        }
    });
}