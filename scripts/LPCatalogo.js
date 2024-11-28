// Funciones para manejar el modal de Talla S
const btnInfoS = document.getElementById('btnInfoS');
const modalS = document.getElementById('modalS');
const closeS = document.querySelector('.closeS');
const btnCerrarModalS = document.getElementById('btnCerrarModalS');

// Función para abrir el modal de Talla S
if (btnInfoS) {
    btnInfoS.addEventListener('click', () => {
        modalS.classList.remove('hidden'); // Muestra el modal
    });
}

// Función para cerrar el modal de Talla S
const cerrarModalS = () => {
    modalS.classList.add('hidden'); // Oculta el modal
};

// Añadir eventos para cerrar el modal de Talla S
if (closeS) {
    closeS.addEventListener('click', cerrarModalS);
}
if (btnCerrarModalS) {
    btnCerrarModalS.addEventListener('click', cerrarModalS);
}

// Funciones para manejar el modal de Talla M
const btnInfoM = document.getElementById('btnInfoM');
const modalM = document.getElementById('modalM');
const closeM = document.querySelector('.closeM');
const btnCerrarModalM = document.getElementById('btnCerrarModalM');

// Función para abrir el modal de Talla M
if (btnInfoM) {
    btnInfoM.addEventListener('click', () => {
        modalM.classList.remove('hidden'); // Muestra el modal
    });
}

// Función para cerrar el modal de Talla M
const cerrarModalM = () => {
    modalM.classList.add('hidden'); // Oculta el modal
};

// Añadir eventos para cerrar el modal de Talla M
if (closeM) {
    closeM.addEventListener('click', cerrarModalM);
}
if (btnCerrarModalM) {
    btnCerrarModalM.addEventListener('click', cerrarModalM);
}

// Funciones para manejar el modal de Talla L
const btnInfoL = document.getElementById('btnInfoL');
const modalL = document.getElementById('modalL');
const closeL = document.querySelector('.closeL');
const btnCerrarModalL = document.getElementById('btnCerrarModalL');

// Función para abrir el modal de Talla L
if (btnInfoL) {
    btnInfoL.addEventListener('click', () => {
        modalL.classList.remove('hidden'); // Muestra el modal
    });
}

// Función para cerrar el modal de Talla L
const cerrarModalL = () => {
    modalL.classList.add('hidden'); // Oculta el modal
};

// Añadir eventos para cerrar el modal de Talla L
if (closeL) {
    closeL.addEventListener('click', cerrarModalL);
}
if (btnCerrarModalL) {
    btnCerrarModalL.addEventListener('click', cerrarModalL);
}

// Cerrar el modal al hacer clic fuera de él (para todos los modales)
window.addEventListener('click', (event) => {
    if (event.target === modalS) {
        cerrarModalS();
    }
    if (event.target === modalM) {
        cerrarModalM();
    }
    if (event.target === modalL) {
        cerrarModalL();
    }
});

