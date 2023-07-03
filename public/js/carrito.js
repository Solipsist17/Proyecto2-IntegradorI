let productosCarrito = []; /* Productos agregados al carrito */
//let subtotal = 0;

function cargar(item) { // Mostramos el carrito de compras cuando se clickea en agregar carrito

    let body = document.body;
    let mostrador = document.getElementById("producto");

    let seleccion = document.getElementById("seleccion");

    seleccion.style.width = "40%";
    seleccion.style.opacity = "1";

    body.style.overflow = "hidden"; // Bloqueamos el scroll
    // Opacamos el fondo
    //mostrador.style.opacity = "0.4";
    //banner.style.opacity = "0.4";

    // Obtenemos las dimensiones y posicionamos
    let posicionVertical = window.pageYOffset || document.documentElement.scrollTop;
    console.log(posicionVertical);
    seleccion.style.top = posicionVertical + "px";

    let datos = {
        id: 0,
        accion: "cargar"
    };

    // Solicitud http
    fetch('producto/gestionarCarrito', {
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
        //let subtotal = data.subTotal;
        productosCarrito = data.productosCarrito; // Agregamos al array para construirlo con esos datos
        cargarArrayCarrito(data.productosCarrito, data.subtotal); /* Cargamos los datos del producto en el carrito */
        //cargar(item); // Cargamos el carrito después de agregar el producto
    })
    .catch(error => {
        console.error(error);
    });

}

function agregarCarrito(item) {
    console.log(item);
    let datos = {
        id: item.dataset.id,
        accion: "agregar"
    };

    fetch('producto/gestionarCarrito', {
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
        //let subtotal = data.subTotal;
        productosCarrito = data.productosCarrito; // Agregamos al array para construirlo con esos datos
       /*  console.log(data.productosCarrito[0].precio);
        console.log(data.subtotal); */
        /* console.log("id: " + data.id);
        console.log("accion: " + data.accion); */

        cargarArrayCarrito(data.productosCarrito, data.subtotal); /* Cargamos los datos del producto en el carrito */
        //cargar(item); // Cargamos el carrito después de agregar el producto
    })
    .catch(error => {
        console.error(error);
    });

}

function quitarCarrito(item) {
    console.log(item);
    let datos = {
        id: item.dataset.id,
        accion: "quitar"
    };

    fetch('producto/gestionarCarrito', {
        method: 'POST',
        body: JSON.stringify(datos)
    })
    .then(response => response.json())
    .then(data => {
        //let subtotal = data.subTotal;
        console.log(data.subtotal);

        productosCarrito = data.productosCarrito; // Agregamos al array para construirlo con esos datos
        console.log("Tamaño del array carrito" + productosCarrito.length);
        console.log(data.productosCarrito);

        cargarArrayCarrito(data.productosCarrito, data.subtotal); /* Cargamos los datos del producto en el carrito */
    });
}

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
        img.src =  productosCarrito[i].imagen;
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
        imgEliminar.src = "public/img/eliminar.png";
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
        productoSeleccion.appendChild(productoOpciones);
        productoSeleccion.appendChild(productoEliminar);
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

function calcularSubTotal(productosCarrito) {
    let subTotal = 0;
    let spanSubTotal = document.querySelector(".subtotal");
    productosCarrito.forEach((item) => {
        txtPrecio = item.querySelector(".precio").textContent.substring(2);
        precio = parseFloat(txtPrecio);
        subTotal += precio;
        // console.log(precio); 
    });
    console.log(subTotal.toFixed(2));
    spanSubTotal.textContent = "";
    spanSubTotal.textContent += "SubTotal: " + "S/" + subTotal.toFixed(2);
}

function cerrar() {
    let body = document.body;
    let mostrador = document.getElementById("container");
    let seleccion = document.getElementById("seleccion");
    //let banner = document.getElementById("producto-banner");
    //mostrador.style.width = "100%";
    seleccion.style.width = "0%";
    /* mostrador.style.opacity = "1";
    banner.style.opacity = "1"; */
    body.style.overflow = "auto";
}