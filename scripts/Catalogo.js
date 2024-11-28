// Selección de elementos del DOM
const btnCart = document.querySelector('.carrito');
const ContainerCartProducts = document.querySelector('.container-cart-products');
const rowProduct = document.querySelector('.row-product');
let allProducts = [];
const valorTotal = document.querySelector('.total-pagar');
const countProducts = document.querySelector('#contador-productos');

// Evento para mostrar/ocultar el carrito
btnCart.addEventListener('click', () => {
    ContainerCartProducts.classList.toggle('hidden-cart');
});

// Función para mostrar los productos en el carrito
const showHTML = () => {
    rowProduct.innerHTML = ''; // Limpiar el contenedor antes de agregar nuevos elementos

    let total = 0;
    let totalOfProduct = 0;

    allProducts.forEach(product => {
        const containerProduct = document.createElement('div');
        containerProduct.classList.add('cart-product');

        containerProduct.innerHTML = `
            <div class="info-cart-product">
                <span class="cantidad-producto-carrito">${product.quantity}</span>
                <p class="titulo-producto-carrito">${product.titulo} (Talla: ${product.talla})</p>
                <span class="precio-producto-carrito">$${(product.price * product.quantity).toFixed(2)}</span>
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="icon-close" data-title="${product.titulo}" data-talla="${product.talla}">
                    <path fill-rule="evenodd" d="M5.47 5.47a.75.75 0 0 1 1.06 0L12 10.94l5.47-5.47a.75.75 0 1 1 1.06 1.06L13.06 12l5.47 5.47a.75.75 0 1 1-1.06 1.06L12 13.06l-5.47 5.47a.75.75 0 0 1-1.06-1.06L10.94 12 5.47 6.53a.75.75 0 0 1 0-1.06Z" clip-rule="evenodd" />
                </svg>
            </div>`;

        rowProduct.append(containerProduct);
        total += product.quantity * product.price;
        totalOfProduct += product.quantity;
    });

    valorTotal.innerText = `$${total.toFixed(2)}`;
    countProducts.innerText = totalOfProduct;
};

// Evento para eliminar productos del carrito
rowProduct.addEventListener('click', e => {
    if (e.target.classList.contains('icon-close')) {
        const titleToRemove = e.target.getAttribute('data-title');
        const tallaToRemove = e.target.getAttribute('data-talla');

        // Filtrar los productos para eliminar el seleccionado
        allProducts = allProducts.filter(
            product => !(product.titulo === titleToRemove && product.talla === tallaToRemove)
        );
        showHTML();
    }
});

// Función para agregar el producto al carrito con talla incluida
const agregarProductoAlCarrito = (talla) => {
    const titulo = document.querySelector('.descripcionCombo h1').textContent;
    const price = parseFloat(
        document.querySelector('.precio').textContent.replace('$', '').replace('.', '').replace(',', '')
    );

    const infoProduct = {
        quantity: 1,
        titulo: titulo,
        talla: talla, // Se agrega la talla al producto
        price: price,
    };

    const existingProduct = allProducts.find(
        item => item.titulo === infoProduct.titulo && item.talla === infoProduct.talla
    );

    if (existingProduct) {
        existingProduct.quantity++;
    } else {
        allProducts.push(infoProduct);
    }

    showHTML(); // Actualizar el carrito
};

// Función para manejar los eventos de los modales
const handleModal = (btnAgregar, modal, closeBtn, addToCartBtn, talla) => {
    if (btnAgregar) {
        btnAgregar.addEventListener('click', () => {
            modal.classList.remove('hidden'); // Muestra el modal
        });
    }

    if (closeBtn) {
        closeBtn.addEventListener('click', () => {
            modal.classList.add('hidden'); // Oculta el modal
        });
    }

    if (addToCartBtn) {
        addToCartBtn.addEventListener('click', () => {
            agregarProductoAlCarrito(talla); // Agrega el producto con la talla seleccionada
            modal.classList.add('hidden'); // Oculta el modal
        });
    }
};

// Configuración del modal para Talla S
const btnInfoS = document.getElementById('btnAgregar');
const modalS = document.getElementById('modalS');
const closeS = document.querySelector('.closeS');
const btnCerrarModalS = document.getElementById('btnCerrarModalS');
handleModal(btnInfoS, modalS, closeS, btnCerrarModalS, 'S');

// Configuración del modal para Talla M
const btnInfoM = document.getElementById('btnAgregarM');
const modalM = document.getElementById('modalM');
const closeM = document.querySelector('.closeM');
const btnCerrarModalM = document.getElementById('btnCerrarModalM');
handleModal(btnInfoM, modalM, closeM, btnCerrarModalM, 'M');

// Configuración del modal para Talla L (opcional)
const btnInfoL = document.getElementById('btnAgregarL');
const modalL = document.getElementById('modalL');
const closeL = document.querySelector('.closeL');
const btnCerrarModalL = document.getElementById('btnCerrarModalL');
handleModal(btnInfoL, modalL, closeL, btnCerrarModalL, 'L');
