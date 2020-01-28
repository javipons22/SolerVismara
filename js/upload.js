// Se agrega jQuery de este modo para wordpress
jQuery(document).ready(function($){

    // La funcion crea inputs para que al cambiar la opcion "Mas reciente.. etc.." en la pagina inmuebles , se haga un GET del query que existia previamente en la pagina
    function crearInputs(urlParams) {

        for (const [key, value] of urlParams.entries()) {
            if (key !== 'order') {
                var input = document.createElement("input");
                input.setAttribute("type", "hidden");
                input.setAttribute("name", key);
                input.setAttribute("value", value);

                document.getElementById("formulario-order").appendChild(input);
            }        
        }
    }

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
            crearInputs(urlParams);
            this.submit();
        });
    } catch(e) {
        console.log(e.message);
    }
    
    // Si se hace submit con el boton "submit_form" cambiar el action y hacer submit
    // Si son otros botones hacer submit en la misma pagina
    // Uno para upload form y otro para edit form
    $("#submit_form").click(function() {
        if (document.getElementById("upload-form")) {
            document.getElementById("upload-form").action = "/upload-handler";
            $('#upload-form').submit();
        } else if (document.getElementById("edit-form")) {
            document.getElementById("edit-form").action = "/edit-handler";
            $('#edit-form').submit();
        }
    });

    let campos1 = ['operacion','tipo','extra','provincia'];
    let campos2 = ['titulo','barrio','direccion','dormitorios','banos','area','precio','descripcion'];
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
                try {
                        seleccion.forEach(e => {
                        document.getElementById(e).checked = true;
                    });
                } catch (e) {
                    console.log(e.message);
                }
                
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

    function seleccionarCamposBuscador(urlParams) {

        for (const [key, value] of urlParams.entries()) {
            if (key !== 'order') {
                try {
                    let element = document.getElementById(key);
                    element.value = value;
                } catch (e) {
                    console.log(e.message);
                }
                
            }        
        }
    }
    
    seleccionarCamposBuscador(urlParams);
});