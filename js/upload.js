// Se agrega jQuery de este modo para wordpress
jQuery(document).ready(function($){

    // Cambiar input de orden al recibir un query
    var urlParams = new URLSearchParams(window.location.search);
    var query = urlParams.getAll('order');
    try{
        if(query) {
            document.getElementById(query[0]).selected = 'selected';
        }
    } catch (e) {
        console.log(e.message);
    }
    try {
        document.getElementById("formulario-order").addEventListener("change", function(){
            this.submit();
        });
    } catch(e) {
        console.log(e.message);
    }
    
    // Si se hace submit con el boton "submit_form" cambiar el action y hacer submit
    // Si son otros botones hacer submit en la misma pagina
    $("#submit_form").click(function() {
        document.getElementById("upload-form").action = "/SV/upload-handler";
        $('#upload-form').submit();
    });

    let campos1 = ['operacion','tipo','extra','provincia'];
    let campos2 = ['titulo','barrio','direccion','dormitorios','banos','area','precio'];
    campos1.forEach(element => {
        checkRadio(element);
    });
    campos2.forEach(element => {
        setValue(element);
    });

    function checkRadio(elemento) {
        try {
            var seleccion = seleccionados[elemento];
        } catch(e) {
            var seleccion = "";
            console.log(e.message);
        }
        
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

    function setValue(elemento) {
        try {
            var seleccion = seleccionados[elemento];
        } catch(e) {
            var seleccion = "";
            console.log(e.message);
        }
        
        if(seleccion && document.getElementById(elemento)) {
            document.getElementById(elemento).value = seleccion;
        }  
    }
    
});