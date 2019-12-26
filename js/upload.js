// Se agrega jQuery de este modo para wordpress
jQuery(document).ready(function($){

    // Si se hace submit con el boton "submit_form" cambiar el action y hacer submit
    // Si son otros botones hacer submit en la misma pagina
    $("#submit_form").click(function() {
        document.getElementById("upload-form").action = "/SV/upload-handler";
        $('#upload-form').submit();
    });

    let campos = ['operacion','tipo','extra','provincias'];

    campos.forEach(element => {
        checkRadio(element);
    });

    function checkRadio(elemento) {
        let seleccion = seleccionados[elemento];
            if (Array.isArray(seleccion)) {
                seleccion.forEach(e => {
                    document.getElementById(e).checked = true;
            });
        } else {
            if(seleccion && document.getElementById(seleccion)) {
                document.getElementById(seleccion).checked = true;
            }
        }
        
    }
    
});