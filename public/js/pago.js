let datos = {
    id: 0,
    accion: "cargar"
};

// Solicitud http
fetch('../producto/gestionarCarrito', {
    method: 'POST',
    body: JSON.stringify(datos)
})
.then(response => {
    if (!response.ok){
        throw new Error('Error en la solicitud: ' + response.status);
    }
    return response.json();
})
.then(data => {
    //cargarDataForm(data);

    //let subtotal = data.subTotal;
    console.log(data);
    productosCarrito = data.productosCarrito; // Agregamos al array para construirlo con esos datos
    cargarArrayCarrito(data.productosCarrito, data.subtotal); /* Cargamos los datos del producto en el carrito */
    //cargar(item); // Cargamos el carrito después de agregar el producto
})
.catch(error => {
    console.error(error);
});

function cargarArrayCarrito (productosCarrito, subtotal) { // Creamos los elementos del array carrito 
    let seleccionContainer = document.getElementById("seleccionContainer"); 
    seleccionContainer.innerHTML = ""; // Limpiamos el contenedor 
    for (let i=0; i < productosCarrito.length; i++) {
        console.log("iteracion: "+i);

        let productoSeleccion = document.createElement("div");
        productoSeleccion.className = "producto-seleccion";

        let nombreProducto = document.createElement("p"); 
        nombreProducto.id = "nombreProducto";
        nombreProducto.textContent = productosCarrito[i].nombre;
        let imagenSeleccion = document.createElement("div");
        imagenSeleccion.className = "imagen-seleccion";
        let img = document.createElement("img");
        img.id = "imgSeleccionada";
        img.className = "producto-miniatura";
        img.src =  "../" + productosCarrito[i].imagen;
        imagenSeleccion.appendChild(img);
        let productoOpciones = document.createElement("div");
        productoOpciones.className = "producto-opciones";
        let selectUnidades = document.createElement("select");
        selectUnidades.className = "select-unidades";
        for (let j=0; j < 5; j++) {
            let option = document.createElement("option");
            option.textContent = j+1;
            selectUnidades.appendChild(option);
        }
        productoOpciones.appendChild(selectUnidades);
        let selectTallas = document.createElement("select");
        selectTallas.className = "select-tallas";
        for (let j=0; j < 3; j++) {
            let option = document.createElement("option");
            switch (j) {
                case 0: option.textContent = "S";
                break;
                case 1: option.textContent = "M";
                break;
                case 2: option.textContent = "L";
                break;
            }
            selectTallas.appendChild(option);
        }
        productoOpciones.appendChild(selectTallas);
        let productoEliminar = document.createElement("div");
        productoEliminar.className = "producto-eliminar";
        let imgEliminar = document.createElement("img");
        imgEliminar.src = "../public/img/eliminar.png";
        imgEliminar.dataset.id = productosCarrito[i].idProducto;
        imgEliminar.addEventListener("click", () => { // Al clickear se quita del carrito 
            quitarCarrito(imgEliminar); // le pasamos el producto
        });
        productoEliminar.appendChild(imgEliminar);
        let precioUnitario = document.createElement("p");
        precioUnitario.className = "precio-unitario";
        precioUnitario.textContent = "S/" + productosCarrito[i].precio;

        productoSeleccion.appendChild(nombreProducto);
        productoSeleccion.appendChild(imagenSeleccion);
        //productoSeleccion.appendChild(productoOpciones);
        //productoSeleccion.appendChild(productoEliminar);
        productoSeleccion.appendChild(precioUnitario);

        seleccionContainer.appendChild(productoSeleccion);
    }

    // AQUI ACTUALIZAR SUBTOTAL Y PRECIO DE ENVIO 

    //let subTotal = 0;
    console.log(subtotal);
    let spanSubTotal = document.querySelector(".subtotal");
    spanSubTotal.textContent = "";
    spanSubTotal.textContent += "SubTotal: " + "S/" + subtotal.toFixed(2);
}