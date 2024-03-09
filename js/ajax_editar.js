$(document).ready(function() {
    $('#form_editar').submit(function(e) {
        e.preventDefault(); // Evita que el formulario se envíe de forma tradicional
        
        var formData = $(this).serialize();
        
        // Realiza la solicitud AJAX
        $.ajax({
            type: 'POST',
            url: 'editar_ajax.php', // Cambia la URL al archivo PHP que manejará la solicitud AJAX
            data: formData,
            dataType: 'json',
            success: function(response) {
                if (response.success) {
                    // Si la actualización fue exitosa, muestra un mensaje y redirige
                    alert("Datos actualizados correctamente");
                    window.location.href = "listar.php";
                } else {
                    // Si hay un error en la actualización, muestra un mensaje de error
                    alert("Error: " + response.message);
                }
            },
            error: function(xhr, status, error) {
                // Maneja los errores de la solicitud AJAX
                console.error(xhr.responseText);
            }
        });
    });
});
