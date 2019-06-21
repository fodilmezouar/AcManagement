
$("#formAffecter1").on('submit',function(e) {
    e.preventDefault();
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    var paquetId = $('#paquetId').val();
    $.ajax({
        url : "valide",
        type: "POST",
        data: {
            "paquetId":paquetId,
            "enseignantId":$('#selectEns1').val(),
            'correcteur':1
        },
        dataType: 'json',
        success:function(response) {
            $('#AffecterModal1').modal('hide');
        }
    });
});


$("#formAffecter2").on('submit',function(e) {

    e.preventDefault();
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    var paquetId = $('#paquetId').val();
    $.ajax({
        url : "valide",
        type: "POST",
        data: {
            "paquetId":paquetId,
            "enseignantId":$('#selectEns2').val(),
            'correcteur':2
        },
        dataType: 'json',
        success:function(response) {
            $('#AffecterModal2').modal('hide');
        }
    });
});


$("#formAffecter3").on('submit',function(e) {
    e.preventDefault();
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    var paquetId = $('#paquetId').val();
    $.ajax({
        url : "valide",
        type: "POST",
        data: {
            "paquetId":paquetId,
            "enseignantId":$('#selectEns3').val(),
            'correcteur':3
        },
        dataType: 'json',
        success:function(response) {
            $('#AffecterModal3').modal('hide');
        }
    });
});
