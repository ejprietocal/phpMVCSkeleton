const  table = new DataTable('#myTable',{
    responsive:true,
    scrollCollapse: true,
    scroller: true,
    scrollY: '63vh',
    lengthMenu: [ [5, 10, 15,20,50,100,200,500, -1], [5, 10, 15,20,50,100,200,500] ],
    columnDefs: [
        {orderable:false,targets:9},
        { responsivePriority: 1, targets: 0 },
        { responsivePriority: 2, targets: 3 },
        { responsivePriority: 3, targets: 9 },
        { responsivePriority: 4, targets: 8 },
        ],
    layout:{
        topStart:{
            buttons:[
                {
                    extend: 'pageLength', // Botón para controlar la longitud de página
                    text: 'Entradas',
                },
                {
                    extend: 'excel',
                    text: 'Excel'
                    
                },
                {
                    extend: 'print',
                    text: 'imprimir'
                    
                }
            ]
        }
    }

});
