$("#formValider").on('submit',function(e) {
    e.preventDefault();
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    var promoId = $('#promoId').val();
    var delais =$('#delais').val();
    var ecart =$('#ecart').val();
    $.ajax({
        url : "/validerr",
        type: "post",
        data: {
            "examId":promoId,
            "ecart":ecart,
            "delais":delais
        },
        dataType: 'json',
        success:function(response) {
            $('#AffecterModal').modal('hide');
        }
    });
});

function editEcart(exam_id){


    $('#body-editEcart').attr('role',exam_id);
    $.getJSON('/getInformationEcart/'+exam_id, function (data) {
        // Iterate the groups first.
        var delai= data.data[0][0];
        // refTmp=ref;
        var ecart= data.data[0][1];

        $("#Editdelais").val(delai);
        $("#Editecart").val(ecart);

    });

}
$("#EditformValider").on('submit',function(e) {
    e.preventDefault();
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    var exam_id = $('#body-editEcart').attr('role');
    var delais =$('#Editdelais').val();
    var ecart =$('#Editecart').val();
    $.ajax({
        url : "/updaterr",
        type: "POST",
        data: {
            "examId":exam_id,
            "ecart":ecart,
            "delais":delais
        },
        dataType: 'json',
        success:function(response) {
            $('#AffecterModalEdit').modal('hide');
        }
    });
});