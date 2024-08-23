document.addEventListener('DOMContentLoaded', () => {
    const form = document.getElementById('proveedorForm');
    const nitInput = document.getElementById('nit');
    const nombreInput = document.getElementById('nombre');
    const telefonoInput = document.getElementById('telefono');
    const direccionInput = document.getElementById('direccion');

    const nitError = document.getElementById('nitError');
    const nombreError = document.getElementById('nombreError');
    const telefonoError = document.getElementById('telefonoError');
    const direccionError = document.getElementById('direccionError');

    form.addEventListener('submit', (e) => {
        let isValid = true;

        // Validar NIT
        if (!/^\d{8,12}$/.test(nitInput.value)) {
            nitError.textContent = 'Ingrese un NIT válido entre 8 y 12 dígitos.';
            isValid = false;
        } else {
            nitError.textContent = '';
        }

        // Validar Nombre
        if (!/^[A-Za-z\s]{3,100}$/.test(nombreInput.value)) {
            nombreError.textContent = 'El nombre debe tener al menos 3 letras y solo contener caracteres alfabéticos.';
            isValid = false;
        } else {
            nombreError.textContent = '';
        }

        // Validar Teléfono
        if (!/^\d{8}$/.test(telefonoInput.value)) {
            telefonoError.textContent = 'Ingrese un teléfono válido de 8 dígitos.';
            isValid = false;
        } else {
            telefonoError.textContent = '';
        }

        // Validar Dirección
        if (direccionInput.value.length < 10) {
            direccionError.textContent = 'La dirección debe tener al menos 10 caracteres.';
            isValid = false;
        } else {
            direccionError.textContent = '';
        }

        if (!isValid) {
            e.preventDefault(); // Evita el envío del formulario si hay errores
        }
    });

    // Validaciones en tiempo real 
    nitInput.addEventListener('input', () => {
        if (!/^\d{8,12}$/.test(nitInput.value)) {
            nitError.textContent = 'Ingrese un NIT válido entre 8 y 12 dígitos.';
        } else {
            nitError.textContent = '';
        }
    });

    nombreInput.addEventListener('input', () => {
        if (!/^[A-Za-z\s]{3,100}$/.test(nombreInput.value)) {
            nombreError.textContent = 'El nombre debe tener al menos 3 letras y solo contener caracteres alfabéticos.';
        } else {
            nombreError.textContent = '';
        }
    });

    telefonoInput.addEventListener('input', () => {
        if (!/^\d{8}$/.test(telefonoInput.value)) {
            telefonoError.textContent = 'Ingrese un teléfono válido de 8 dígitos.';
        } else {
            telefonoError.textContent = '';
        }
    });

    direccionInput.addEventListener('input', () => {
        if (direccionInput.value.length < 10) {
            direccionError.textContent = 'La dirección debe tener al menos 10 caracteres.';
        } else {
            direccionError.textContent = '';
        }
    });
});
