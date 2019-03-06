var refTmp;


/*function removeMat($idMat){
    $('#body-removeRoom').attr('role',$idMat);
    return true;
}
function editMat($idMat){


    $('#body-editRoom').attr('role',$idMat);
    $.getJSON('getInformationRoom/'+$idMat, function (data) {
        // Iterate the groups first.
        var ref= data.data[0][0];
        refTmp=ref;
        var lits= data.data[0][1];
        var etage= data.data[0][2];
        var prix= data.data[0][3];
        $("#RefRoomEdit").val(ref);
        $("#numLiEdit").val(lits);
        $("#etageEdit").val(etage);
        $("#prixEdit").val(prix);
    });

}
*/






$(function () {

    var manageEns = $("#tableEnseignant").DataTable({
        searching: true,
        buttons: ['copy', 'excel', 'pdf'],


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

  $('#removeMat').on('click',function(e){
        var idRoom = $("#body-removeRoom").attr('role');

        $.ajax({
            url: 'deleteRoom',
            type: 'post',
            dataType: 'json',
            data: {"_token": $('meta[name="csrf-token"]').attr('content'),"idRoom":idRoom},
            success:function(response) {

                $('#removeMatModal').modal('hide');
                manageMat.ajax.reload(null, false);
                $('.remove-messagesMat').html('<div class="alert alert-success">'+
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



    $('#editRoomBtn').on('click',function(e){
        var idMatEdit = $("#body-editRoom").attr('role');
        var RefMatEdit = $("#RefRoomEdit").val().toUpperCase();
        var NumLitEdit = $("#numLiEdit").val();
        var etageEdit = $("#etageEdit").val();
        var prixEdit = $("#prixEdit").val();
        var RefUniqueEdit = $('#tableRoom td').filter(function (){
            return $.trim($(this).text()) == RefMatEdit;});

        if(RefMatEdit == ""){
            $("#RefRoomEdit").after('<p class="text-danger">Veuillez saisir la référence</p>');
            $('#RefRoomEdit').closest('.form-group').addClass('has-error');
        }
        else if(RefUniqueEdit.length>0 && refTmp != RefMatEdit){
            $("#RefRoomEdit").after('<p class="text-danger">Référence déja existe</p>');
            $('#RefRoomEdit').closest('.form-group').addClass('has-error');
            return false;
        }
        else{
            $.ajax({
                url: 'editRoom/'+idMatEdit,
                type: 'post',
                dataType: 'json',
                data: {"_token": $('meta[name="csrf-token"]').attr('content'),"refRoomEdit":RefMatEdit,"numEdit":NumLitEdit,"etageEdit":etageEdit,"prixEdit":prixEdit},
                success:function(response) {

                    manageMat.ajax.reload(null, false);
                    $(".text-danger").remove();
                    $('.form-group').removeClass('has-error').removeClass('has-success');
                    $('#edit-room-messages').html('<div class="alert alert-success">'+
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
        }
        return false;
    });




});