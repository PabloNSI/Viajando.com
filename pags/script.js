// PARA METER LOS ENLACES DEL HEADER CUANDO LA PANTALLA ES PEQUEÑA HORIZONTALMENTE, ACTIVA UN BOTÓN

var navToggle = document.querySelector(".nav-toggle")
var navMenu = document.querySelector(".nav-menu")

navToggle.addEventListener("click",() => {
navMenu.classList.toggle("nav-menu_visible");
});

// FUNCIÓN DEL CARRITO DE LA COMPRA (MODIFICADO AGREGANDO FUNCIONES Y USOS)

let carrito = JSON.parse(localStorage.getItem("carrito")) || {};
let nuevoDivContenido = {};

function agregarAlCarrito(producto, precio) {
    if (carrito[producto]) {
        carrito[producto].cantidad++;
    } else {
        carrito[producto] = { precio, cantidad: 1 };
    }
    actualizarCarrito();
    savelocal();
}

function vaciarCarrito() {
    carrito = {};
    actualizarCarrito();
}

function quitarDelCarrito(producto) {
    if (carrito[producto] && carrito[producto].cantidad > 0) {
        carrito[producto].cantidad--;
        if (carrito[producto].cantidad === 0) {
            delete carrito[producto];  
        }
    }    
        actualizarCarrito();
}

function actualizarCarrito() {
    const itemsCarrito = document.getElementById('itemsCarrito');
    itemsCarrito.innerHTML ='';
    Object.keys(carrito).forEach(producto => {
        const div = document.createElement('div');
        div.innerHTML = `${producto} - CANTIDAD: ${carrito[producto].cantidad} <br> <button onclick="quitarDelCarrito('${producto}')">QUITAR 1</button>`;
        itemsCarrito.appendChild(div);
        savelocal();
    });
    
}



function moverAlCarrito(producto, precio) {
    let nuevoDivContenido = 
    `<div id="productos" class="producto_styles"><h3>${producto}</h3> <p>Precio: ${precio}€</p>
    <button onclick="agregarAlCarrito('${producto}','${precio}')">AGREGAR AL CARRITO</button></div>`;
    localStorage.setItem('nuevoDivContenido', nuevoDivContenido);
}
function cargarContenido() {

    let contenido = localStorage.getItem('nuevoDivContenido');
    if (contenido) {
        let nuevoDiv = document.createElement("div");
        nuevoDiv.innerHTML = contenido;
        document.getElementById("carrito-contenidoitems").appendChild(nuevoDiv);
    }
}
window.onload = cargarContenido;

const savelocal = ()=> {
    localStorage.setItem("carrito", JSON.stringify(carrito));
}
