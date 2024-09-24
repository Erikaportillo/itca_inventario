const destroy = function(e) { 
    // Obtener los atributos de URL y token
    let url = e.getAttribute('url');
    let token = e.getAttribute('token');

    // Mostrar mensaje de confirmación con SweetAlert
    Swal.fire({ 
        icon: 'question', 
        title: '¿Desea continuar?', 
        text: 'Categoria será eliminado', 
        showCancelButton: true, 
        cancelButtonText: 'Cancelar', 
        confirmButtonText: 'Sí'
    }).then((res) => {
        // Si el usuario confirma, procede con la eliminación
        if (res.isConfirmed) { 
            // Crear la solicitud XMLHttpRequest
            const request = new XMLHttpRequest();
            request.open('DELETE', url);
            request.setRequestHeader('X-CSRF-TOKEN', token);

            // Manejo de la respuesta de la solicitud
            request.onload = () => {
                if (request.status == 200) { 
                    // Eliminar la fila del producto
                    e.closest('tr').remove();
                    // Mostrar mensaje de éxito
                    Swal.fire({ 
                        icon: 'success', 
                        text: 'Categoria eliminado'
                    }); 
                }
            };

            // Manejo de errores de la solicitud
            request.onerror = (err) => {
                console.error('Error:', err);
            };

            // Enviar la solicitud
            request.send();
        }
    });
}