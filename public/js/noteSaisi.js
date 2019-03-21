$(document).ready(function(){
    $.ajaxSetup({
        headers: {
            'X-CSRF-Token': $('meta[name="csrf-token"]').attr('content')
        }
    });
    var idpaquet = $('#PaquetId').val();
    $('#dataTable_Edit').Tabledit({
        url:'valider/'+idpaquet,
        columns:{
            identifier:[0, "id"],
            editable:[[1, 'note']],
            'test':2
        },
        autoFocus: true,
        saveButton: true,
        deleteButton:false,
        buttons: {
            edit: {
                class: 'btn btn-sm btn-primary',
                html: '<span class="fa fa-pencil"></span>',
                action: 'edit'
            }

            },

    });

});