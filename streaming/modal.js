document.addEventListener('DOMContentLoaded', function() {
    var modal = document.getElementById('id01');
    var peliculasLink = document.getElementById('pelis');
    var indiceLink = document.getElementById('indice'); // Agrega un nuevo enlace para el índice

    // Agregar evento de clic al enlace de Peliculas
    peliculasLink.addEventListener('click', function(event) {
        event.preventDefault(); // Evitar la acción predeterminada del enlace
        mostrarFormulario('pelis'); // Llamar a la función mostrarFormulario con el parámetro 'pelis'
    });


    // Agregar evento de clic al enlace de Índice
    indiceLink.addEventListener('click', function(event) {
        // Evitar que el modal se abra cuando se hace clic en el enlace de Índice
        event.preventDefault();
    });

    // Definir la función mostrarFormulario
    function mostrarFormulario(formulario) {
        // Aquí puedes agregar lógica adicional si es necesario para mostrar diferentes formularios según el parámetro recibido
        modal.style.display = "block"; // Mostrar el modal
    }

    // Cuando el usuario haga clic en cualquier lugar fuera del modal, ciérralo
    window.onclick = function(event) {
        if (event.target == modal) {
            modal.style.display = "none";
        }
    }
});

