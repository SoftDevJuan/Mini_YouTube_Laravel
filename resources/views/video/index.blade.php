@extends('layouts.app') 

@section('content') 

    <div class="container"> 
        <div class="row"> 
            @if (session('message')) 
                <div class="alert alert-success"> 
                    {{ session('message') }} 
                </div> 
            @endif 
        </div> 

    

        <div class="row"> 
            <h2>Lista de videos </h2> 
            <hr> 
            <br> 
            <p align="right"> 
                <a href="{{ route('videos.create') }}" class="btn btn-success">Crear video</a> 
                <a href="{{ route('home') }}" class="btn btn-primary"> Regresar </a> 
            </p> 
            <table id="example" class="table table-striped table-bordered" style="width:100%"> 
                <thead> 
                    <tr> 
                        <th>Acciones</th> 
                        <th>Id Video</th> 
                        <th>Título</th> 
                        <th>Descripción</th> 
                        <th>Miniatura</th> 
                        <th>Enlace Video</th> 
                        <th>Nombre</th> 
                        <th>Correo</th> 
                    </tr> 
                </thead> 
                <tbody> 

                </tbody> 
            </table> 
        </div> 
    </div> 

@endsection 


<script src="https://code.jquery.com/jquery-3.5.1.js"></script> 
<script src="https://cdn.datatables.net/1.10.22/js/jquery.dataTables.min.js"></script> 
<script src="https://cdn.datatables.net/1.10.22/js/dataTables.bootstrap4.min.js"></script> 
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" 
integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"> 
</script> 
<script src="https://cdn.datatables.net/buttons/1.6.4/js/dataTables.buttons.min.js"></script> 
<script src="https://cdn.datatables.net/buttons/1.6.4/js/buttons.flash.min.js"></script> 
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script> 
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script> 
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script> 
<script src="https://cdn.datatables.net/buttons/1.6.4/js/buttons.html5.min.js"></script> 
<script src="https://cdn.datatables.net/buttons/1.6.4/js/buttons.print.min.js"></script> 
<script type="text/javascript"> 

var data = @json($videos); 

 

$(document).ready(function() { 

    $('#example').DataTable({ 
        "data": data, 
        "pageLength": 100, 
        "order": [ 
            [0, "desc"] 

        ], 

        "language": { 
            "sProcessing": "Procesando...", 
            "sLengthMenu": "Mostrar _MENU_ registros", 
            "sZeroRecords": "No se encontraron resultados", 
            "sEmptyTable": "Ningún dato disponible en esta tabla", 
            "sInfo": "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros", 
            "sInfoEmpty": "Mostrando registros del 0 al 0 de un total de 0 registros", 
            "sInfoFiltered": "(filtrado de un total de _MAX_ registros)", 
            "sInfoPostFix": "", 
            "sSearch": "Buscar:", 
            "sUrl": "", 
            "sInfoThousands": ",", 
            "sLoadingRecords": "Cargando...", 
            "oPaginate": { 
                "sFirst": "Primero", 
                "sLast": "Último", 
                "sNext": "Siguiente", 
                "sPrevious": "Anterior" 
            }, 

            "oAria": { 
                "sSortAscending": ": Activar para ordenar la columna de manera ascendente", 
                "sSortDescending": ": Activar para ordenar la columna de manera descendente" 
            } 
        }, 
        responsive: true, 

        // dom: 'Bfrtip', 

        dom: '<"col-xs-3"l><"col-xs-5"B><"col-xs-4"f>rtip', 
        buttons: [ 
                'copy', 'excel', 
            { 
                extend: 'pdfHtml5', 
                orientation: 'landscape', 
                pageSize: 'LETTER', 
            } 
        ] 
    }) 
}); 

 

jQuery.extend(jQuery.fn.dataTableExt.oSort, { 

    "portugues-pre": function(data) { 

        var a = 'a'; 
        var e = 'e'; 
        var i = 'i'; 
        var o = 'o'; 
        var u = 'u'; 
        var c = 'c'; 

        var special_letters = { 

            "Á": a, 
            "á": a, 
            "Ã": a, 
            "ã": a, 
            "À": a, 
            "à": a, 
            "É": e, 
            "é": e, 
            "Ê": e, 
            "ê": e, 
            "Í": i, 
            "í": i, 
            "Î": i, 
            "î": i, 
            "Ó": o, 
            "ó": o, 
            "Õ": o, 
            "õ": o, 
            "Ô": o, 
            "ô": o, 
            "Ú": u, 
            "ú": u, 
            "Ü": u, 
            "ü": u, 
            "ç": c, 
            "Ç": c 
        }; 
        for (var val in special_letters) 
            data = data.split(val).join(special_letters[val]).toLowerCase(); 
            return data; 
    },
    "portugues-asc": function(a, b) { 
        return ((a < b) ? -1 : ((a > b) ? 1 : 0)); 
    }, 
    "portugues-desc": function(a, b) { 
        return ((a < b) ? 1 : ((a > b) ? -1 : 0)); 
    } 

}); 

//"columnDefs": [{ type: 'portugues', targets: "_all" }], 

</script> 