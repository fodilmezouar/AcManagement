$(document).ready(function() {
    $('#dataTable1').DataTable( {
        dom: 'Bfrtip',
        buttons: [
            {
                extend: 'excel',
                text: 'Export excel',
                className: 'exportExcel',
                filename: 'liste des notes',
                exportOptions: {
                    modifier: {
                        page: 'all',

                    },
                    columns: [ 0, 1, 2, 3 ]
                }
            }],
        destroy: true,
    } );
} );