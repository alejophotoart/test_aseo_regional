function deleteMovie(id) {

    Swal.fire({
        title: "Estas seguro?",
        text: "Deseas eliminar esta pelicula ",
        icon: "question",
        showCancelButton: true,
        confirmButtonColor: "#343a40",
        cancelButtonColor: "#d33",
        confirmButtonText: "Si, Eliminarla!",
        cancelButtonText: "Cancelar"
    }).then(result => {
        if (result.isConfirmed) {

            $.ajax({
                url: "/delete/"+id,
                type: "DELETE",
                contentType: "application/json",
                dataType: "json",
                headers: {
                    "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr(
                        "content"
                    )
                },
                //data: obj.json.strin,
                success: function(r) {

                    $(location).attr("href","/");

                }
            });
        }
    });
    
}