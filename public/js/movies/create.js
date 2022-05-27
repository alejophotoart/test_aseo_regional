function create() {
    let name = document.getElementById('name').value;
    let author_id = $("#author_id").val();
    let categorie_id = $("#categorie_id").val();
    let launching_date = document.getElementById('launching_date').value;
    let producer = document.getElementById('producer').value;

    if( name == '' || author_id == '' || categorie_id == '' || launching_date == '' || producer == '' ){
        Swal.fire({
            icon: 'error',
            title: 'Oops...',
            text: 'No pueden haber campos vacios',
        });
    } else {
        let data = {
            name,
            author_id,
            categorie_id,
            launching_date,
            producer,
        }
    
        console.log(data);
    
        Swal.fire({
            title: "Estas seguro?",
            text: "Deseas crear la pelicula " + name,
            icon: "question",
            showCancelButton: true,
            confirmButtonColor: "#343a40",
            cancelButtonColor: "#d33",
            confirmButtonText: "Si, Crearla!",
            cancelButtonText: "Cancelar"
        }).then(result => {
            if (result.isConfirmed) {
    
                $.ajax({
                    url: "/create",
                    type: "POST",
                    data: JSON.stringify(data),
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

    
}