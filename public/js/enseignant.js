var refTmp;


function removeEns($idEns){
    $('#body-removeEns').attr('role',$idEns);
    return true;
}
function editEns($idEns){


    $('#body-editEnse').attr('role',$idEns);
    $.getJSON('getInformationEnseignant/'+$idEns, function (data) {
        // Iterate the groups first.
        var nom= data.data[0][0];
       // refTmp=ref;
        var prenom= data.data[0][1];
        var email= data.data[0][2];
        var image= data.data[0][3];
        var grade= data.data[0][4];
        var dateNaissance= data.data[0][5];
        $("#nameEdit").val(nom);
        $("#prenomEdit").val(prenom);
        $("#emailEdit").val(email);

        $("#gradeEdit").val(grade);
        $("#dateNaisEdit").val(dateNaissance);
    });

}







$(function () {

    var manageEns = $("#tableEnseignant").DataTable({
        dom: 'Bfrtip',
        buttons: [
            {
                extend: 'excel',
                text: 'Export excel',
                className: 'exportExcel',
                filename: 'listeExcel',
                exportOptions: {
                    modifier: {
                        page: 'all',

                    },
                    columns: [ 0, 1, 2, 3, 4 ]
                }
            }],
        destroy: true,
        'ajax': 'getEnseignant',
        'order': []
    });

    $("#formValidate").on('submit',function(e) {


        e.preventDefault();


            $("#createEnseigantbtn").button('loading');

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }

        });
        var nom = $('#name').val(),prenom=$('#prenom').val();
        if(nom != "" || prenom !=  ""  || $('#email').val() ) {

            var formData = new FormData(this);
            $.ajax({
                url: "enseignant/createEnseignant",
                type: 'POST',
                processData: false,
                contentType: false,
                data: formData,
                dataType: 'json',
                success: function (response) {
                    $("#createEnseigantbtn").button('reset');
                    if (response.success == true) {
                        manageEns.ajax.reload(null, false);
                        $("#formValidate")[0].reset();
                        $(".text-danger").remove();
                        $('.form-group').removeClass('has-error').removeClass('has-success');
                        $('#add-ens-messages').html('<div class="alert alert-success">' +
                            '<button type="button" class="close" data-dismiss="alert">&times;</button>' +
                            '<strong><i class="fa fa-check"></i></strong> ' + response.messages +
                            '</div>');
                        $(".alert-success").delay(500).show(10, function () {
                            $(this).delay(3000).hide(10, function () {
                                $(this).remove();
                            });
                        }); // /.alert
                    }  // if*/
                } // /success
            });
        }// /ajax

        return false;
    });

  $('#removeEns').on('click',function(e){
        var idEns = $("#body-removeEns").attr('role');

        $.ajax({
            url: 'deleteEnseignant',
            type: 'post',
            dataType: 'json',
            data: {"_token": $('meta[name="csrf-token"]').attr('content'),"idEnseignant":idEns},
            success:function(response) {

                $('#removeEnsModal').modal('hide');
                console.log(response);
                manageEns.ajax.reload(null, false);
                $('.remove-messagesEns').html('<div class="alert alert-success">'+
                    '<button type="button" class="close" data-dismiss="alert">&times;</button>'+
                    '<strong><i class="fa fa-check"></i></strong> Suppression Effectuée</div>');

                $(".alert-success").delay(500).show(10, function() {
                    $(this).delay(3000).hide(10, function() {
                        $(this).remove();
                    });
                }); // /.alert
            }
        });
    });



    $('#formEdit').on('submit',function(e){
        e.preventDefault();
        console.log("hey");
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }

        });
        var idEns = $('#body-editEnse').attr('role');



            var formData = new FormData(this);

            $.ajax({
                url: 'enseignant/editEnseignant/'+idEns,
                type: 'POST',
                processData: false,
                contentType: false,
                data: formData,
                dataType: 'json',
                success:function(response) {
                console.log(response);
                    manageEns.ajax.reload(null, false);
                    $(".text-danger").remove();
                    $('.form-group').removeClass('has-error').removeClass('has-success');
                    $('#edit-ens-messages').html('<div class="alert alert-success">'+
                        '<button type="button" class="close" data-dismiss="alert">&times;</button>'+
                        '<strong><i class="fa fa-check"></i></strong> '+ response.message +
                        '</div>');
                    $(".alert-success").delay(500).show(10, function() {
                        $(this).delay(3000).hide(10, function() {
                            $(this).remove();
                        });
                    }); // /.alert
                }
            });

        return false;
    });




});

