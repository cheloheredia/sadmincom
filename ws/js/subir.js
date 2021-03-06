/*
 * @author Marcelo Heredia
 * Jan, 2014
*/
$(function() 
{
    $( "#fecha" ).datepicker();
    $("#protagonista").autocomplete({
        source: function(request, response) {
            $.ajax({
                url: buscarautocompletes,
                dataType: "json",
                data: {
                    term : request.term,
                    opt : 'protagonista'
                },
                success: function(data) {
                    response(data);
                }
            });
        },
        minLength: 1,
        select: itemSeleccionado,
        focus: itemMarcado
    });
    cargarCombos('tmedio');
    $("#medio").prop('disabled', true);
    $("#tmedio").change(function(){
        if ($('#tmedio').val().length > 0) {
            $("#medio").prop('disabled', false);
        } else {
            $("#medio").prop('disabled', true);
        }
        $('#medio').val('');
    });
    $("#medio").autocomplete({
        source: function(request, response) {
            $.ajax({
                url: buscarautocompletes,
                dataType: "json",
                data: {
                    term : request.term,
                    tmedio : $('#tmedio').val(),
                    opt : 'medio'
                },
                success: function(data) {
                    response(data);
                }
            });
        },
        minLength: 1,
        select: itemSeleccionado,
        focus: itemMarcado
    });
    $("#programa").prop('disabled', true);
    $("#medio").on("autocompleteselect", function(event, ui) {
        $("#programa").prop('disabled', false);
    });
    $("#medio").on("autocompleteresponse", function(event, ui) {
        if ($('#programa').val().length != 0) {
            $('#programa').val('');
        }
        $("#programa").prop('disabled', true);
    });
    $("#programa").autocomplete({
        source: function(request, response) {
            $.ajax({
                url: buscarautocompletes,
                dataType: "json",
                data: {
                    term : request.term,
                    medio : $('#medio').val(),
                    opt : 'programa'
                },
                success: function(data) {
                    response(data);
                }
            });
        },
        minLength: 1,
        select: itemSeleccionado,
        focus: itemMarcado
    });
    $("#horario").prop('disabled', true);
    $("#programa").on("autocompleteselect", function(event, ui) {
        $("#horario").prop('disabled', false);
        cargarCombos('horario');
    });
    $("#programa").on("autocompleteresponse", function(event, ui) {
        $("#horario").empty();
        $("#horario").prop('disabled', true);
    });
    cargarCombos('espacio');
    cargarCombos('departamento');
    $("#ciudad").prop('disabled', true);
    $("#departamento").change(function(){
        if ($('#departamento').val().length > 0) {
            $("#ciudad").prop('disabled', false);
        } else {
            $("#ciudad").prop('disabled', true);
        }
        $('#ciudad').val('');
    });
    $("#ciudad").autocomplete({
        source: function(request, response) {
            $.ajax({
                url: buscarautocompletes,
                dataType: "json",
                data: {
                    term : request.term,
                    departamento : $('#departamento').val(),
                    opt : 'ciudad'
                },
                success: function(data) {
                    response(data);
                }
            });
        },
        minLength: 1,
        select: itemSeleccionado,
        focus: itemMarcado
    });
    cargarCombos('clasificacion');
    $('#enviar').click(function(){
        var archivos = $('#archivo');
        var archivo = archivos[0].files[0];
        var datos = new FormData();
        datos.append('archivo',archivo);
        var url = clientesubir;
        $.ajax({
            url:url,
            type:'POST',
            contentType:false,
            data:datos,
            processData:false,
            cache:false,
            beforeSend: function(){
                $("#archivo").prop('disabled', true);
                $("#enviar").prop('disabled', true);
                $("#respuesta").html($('<br><span class="mensaje">Subiendo archivo...</span><br>'));
            },
            success: function(data){
                $("#respuesta").html($('<br><span class="mensaje">'+data+'</span><br>'));
            }
        });
    });
    /*var $_GET = obtenerVariablesGet(document.location.search);
    if (typeof($_GET['revista']) != "undefined" && $_GET['revista'] !== null) {
        $("#revista").val($_GET['revista']);
        $("#revista").prop('disabled', true);
    }
    $("#regpros").change(function(){
        if($("#pais").val().length == 0) {
            $("#ciudad").prop('disabled', true);
        }
    });
    $("#regpros").submit(function () {
        var error = '';
        if($("#nombre").val().length < 1) {  
            error +="El nombre es obligatorio.\n";
        }
        if($("#apellido").val().length < 1) {  
            error +="El apellido es obligatorio.\n";
        }
        if($("#email").val().length < 1) {  
            error +="El email es obligatorio.\n";
        }
        if(esEmail($("#email").val()) == false) {  
            error +="El email no es valido.\n";
        }
        if($("#pais").val().length < 1) {  
            error +="El pais es obligatorio.\n";
        }
        if($("#ciudad").val().length < 1) {  
            error +="El ciudad es obligatorio.\n";
        }
        if($("#revista").val().length < 1) {  
            error +="El revista es obligatorio.\n";
        }
        if (error != '') {
            $("#respuesta").html(error);
        } else {
            $.ajax({
               type: "POST",
               url: clienteprospecto,
               data: $("#regpros").serialize(),
               success: function(data)
               {
                   $("#respuesta").html(data);
               }
            });
        }
        return false;  
    }); 
    $("#pais").autocomplete({
        source: function(request, response) {
            $.ajax({
                url: buscarautocompletes,
                dataType: "json",
                data: {
                    term : request.term,
                    opt : 'pais'
                },
                success: function(data) {
                    response(data);
                }
            });
        },
        minLength: 1,
        select: itemSeleccionado,
        focus: itemMarcado
    });
    $("#ciudad").autocomplete({
        source: function(request, response) {
            $.ajax({
                url: buscarautocompletes,
                dataType: "json",
                data: {
                    term : request.term,
                    pais : $("#pais").val(),
                    opt : 'ciudad'
                },
                success: function(data) {
                    response(data);
                }
            });
        },
        minLength: 1,
        select: itemSeleccionado,
        focus: itemMarcado
    });
    $("#revista").autocomplete({
        source: function(request, response) {
            $.ajax({
                url: buscarautocompletes,
                dataType: "json",
                data: {
                    term : request.term,
                    opt : 'revista'
                },
                success: function(data) {
                    response(data);
                }
            });
        },
        minLength: 1,
        select: itemSeleccionado,
        focus: itemMarcado
    });*/
});

