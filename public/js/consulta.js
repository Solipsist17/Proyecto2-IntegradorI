const botones = document.querySelectorAll(".btnEliminar");

botones.forEach(boton => {

    boton.addEventListener("click", function() {
        const matricula = this.dataset.matricula;
        
        const confirm = window.confirm("¿Deseas eliminar al alumno " + matricula + "?");
        
        if (confirm) {
            // Solicitud ajax
            httpRequest('http://localhost:8080/Proyecto2-integradorI/consulta/eliminarAlumno/' + matricula, matricula); 
            
        } 
    });
});

function httpRequest(url, matricula) {

    fetch(url, {
        method: 'GET'
        /* ,
        body: new FormData() */
    })
    .then(function(response) {
        if (response.ok) {
            return response.text();
        } else {
            throw "Error en la llamada";
        }
    })
    .then(function(data) {
        //console.log(data);
        // Mostramos el mensaje;
        document.querySelector("#respuesta").innerHTML = data;

        // Si la solicitud se realizó exitosamente
        const tbody = document.getElementById("tbody-alumnos");
        const fila = document.getElementById("fila-" + matricula);

        tbody.removeChild(fila); // Eliminamos esa fila en la tabla
    })
    .catch(function(error) {
        console.log(error);
    });

    
}