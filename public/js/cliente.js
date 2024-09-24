const destroy = function(e) {
    let url = e.getAttribute('url');
    let token = e.getAttribute('token');

    // Mostrar confirmación con SweetAlert
    Swal.fire({
        icon: 'question',
        title: '¿Desea continuar?',
        text: 'El cliente será eliminado',
        showCancelButton: true,
        cancelButtonText: 'Cancelar',
        confirmButtonText: 'Sí'
    }).then((res) => {
        if (res.isConfirmed) {
            // Crear una nueva solicitud XMLHttpRequest para eliminar
            const request = new XMLHttpRequest();
            request.open('DELETE', url);
            request.setRequestHeader('X-CSRF-TOKEN', token);

            // Cuando la solicitud esté completa
            request.onload = () => {
                if (request.status === 200) {
                    // Eliminar la fila correspondiente del cliente
                    e.closest('tr').remove();

                    // Mostrar alerta de éxito
                    Swal.fire({
                        icon: 'success',
                        text: 'Cliente eliminado'
                    });
                }
            };

            // Manejar errores en la solicitud
            request.onerror = (err) => {
                console.error('Error:', err);
            };

            // Enviar la solicitud
            request.send();
        }
    });
};
