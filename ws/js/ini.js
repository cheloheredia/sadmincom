/*
 * @author Marcelo Heredia
 * Jan, 2014
*/

/*
 * @var string
 */
var buscarautocompletes = 'client/buscarautocompletes.php';

/*
 * @var string
 */
var cargarcombos = 'client/combos.php';

/*
 * @var string
 */
var clienteprospecto = 'client/clienteprospecto.php';

function esEmail(email) {
    var regex = /^([a-zA-Z0-9_\.\-\+])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
    if(!regex.test(email)) {
       return false;
    }else{
       return true;
    }
}

function obtenerVariablesGet(qs) {
    qs = qs.split("+").join(" ");
    var params = {},
        tokens,
        re = /[?&]?([^=]+)=([^&]*)/g;
    while (tokens = re.exec(qs)) {
        params[decodeURIComponent(tokens[1])] = decodeURIComponent(tokens[2]);
    }
    return params;
}

/**
* Esta funcion realiza el autocomplete cuando se marca una opcion de las sugerencias.
*
* @param object event evento del metodo autocomplete que se esta realizando
* @param objct ui objeto que contiene los resultados del autocomplete
* 
*/
function itemMarcado(event, ui)
{
    var item = ui.item.label;
    switch(ui.item.value.opt){
        case 'protagonista':
            $("#protagonista").val(item);
            break;
        case 'medio':
            $("#medio").val(item);
            break;
        case 'programa':
            $("#programa").val(item);
            break;
        case 'ciudad':
            $("#ciudad").val(item);
            break;
    }
    event.preventDefault();
}

/**
* Esta funcion realiza el autocomplete cuando se selecciona una opcion de las sugerencias.
*
* @param object event evento del metodo autocomplete que se esta realizando
* @param objct ui objeto que contiene los resultados del autocomplete
* 
*/
function itemSeleccionado(event, ui)
{
    var item = ui.item.label;
    switch(ui.item.value.opt){
        case 'protagonista':
            $("#protagonista").val(item);
            break;
        case 'medio':
            $("#medio").val(item);
            break;
        case 'programa':
            $("#programa").val(item);
            break;
        case 'ciudad':
            $("#ciudad").val(item);
            break;
    }
    event.preventDefault();
}

/**
* Esta funcion realiza el cargado de combos respectivo.
*
* @param string combo el combo que se desea cargar
* 
*/
function cargarCombos(combo){
    switch(combo){
        case 'tmedio':
            $("#tmedio").append("<option></option>");
            $.getJSON(cargarcombos+'?combo='+combo,function(data){
                $.each(data, function(k,v){
                    $("#tmedio").append("<option>"+v+"</option>");
                });
            });
            break;
        case 'horario':
            $("#horario").append("<option></option>");
            $.getJSON(cargarcombos+'?combo='+combo+'&programa='+$('#programa').val(),function(data){
                $.each(data, function(k,v){
                    $("#horario").append("<option>"+v+"</option>");
                });
            });
            break;
        case 'espacio':
            $("#espacio").append("<option></option>");
            $.getJSON(cargarcombos+'?combo='+combo,function(data){
                $.each(data, function(k,v){
                    $("#espacio").append("<option>"+v+"</option>");
                });
            });
            break;
        case 'departamento':
            $("#departamento").append("<option></option>");
            $.getJSON(cargarcombos+'?combo='+combo,function(data){
                $.each(data, function(k,v){
                    $("#departamento").append("<option>"+v+"</option>");
                });
            });
            break;
        case 'clasificacion':
            $("#clasificacion").append("<option></option>");
            $.getJSON(cargarcombos+'?combo='+combo,function(data){
                $.each(data, function(k,v){
                    $("#clasificacion").append("<option>"+v+"</option>");
                });
            });
            break;
    }
}
