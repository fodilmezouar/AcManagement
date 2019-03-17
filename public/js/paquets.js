/* comme une solution a l'ajout d'un block on utilise une fonction à 3 parametre
comme dans le cas de suppression */
$("#formGroupes").unbind('submit').bind('submit', function (e) {
    e.preventDefault();
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    var libelle = $("#libelleModal").val();
    var promoId = $("#promoId").val();
    var formData = new FormData(this);
    formData.append('examId',promoId);
    var form = $(this);
    $("#ajoutGroupe").button('loading');
    $.ajax({
        url : "import/add",
        processData: false,
        contentType: false ,
        type: "POST",
        data:formData,
        dataType: 'json',
        success:function(response) {
            $("#ajoutGroupe").button('reset');
            if(response.success == true) {
                $('#contentGroupes').append(response.messages);
                $("#formGroupes")[0].reset();
            }  // if
            else {
                alert('error');
            }
        }
    });

});
$('#contentGroupes').on('click','.supp',function(){
    $('#paquetIdInput').val($(this).attr('role'));
});
$('#contentModules').on('click','.suppModule',function(){
    $('#moduleIdInput').val($(this).attr('role'));
});
$('#contentModules').on('click','.attModule',function(){
    $('#attModuleIdInput').val($(this).attr('role'));
    location.href="modules/attModule/"+$('#attModuleIdInput').val();
});
$('#contentGroupes').on('click','.edit',function(){
    $('#paquetIdInput').val($(this).attr('role'));
    $('#libelleModalEdit').val($('.block[role="'+$('#paquetIdInput').val()+'"] #libelle').html().trim());
    $('.form-group').removeClass('has-error');
    $('.form-group').removeClass('has-danger');
    $(".help-block").remove();
});

/** Suppression d'un paquet */
$("#formGroupSupp").on('submit',function(e) {
    e.preventDefault();
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    var paquetId = $('#paquetIdInput').val();
    $.ajax({
        url : "paquets/suppPaquet",
        type: "POST",
        data: {
            "paquetId":paquetId
        },
        dataType: 'json',
        success:function(response) {
            $('.block[role="'+paquetId+'"]').remove();
            $('#suppGroupModal').modal('hide');
        }
    });
});
/**edit paquets**/
$("#formGroupesEdit").on('submit',function(e) {
    e.preventDefault();
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    var libelle = $("#libelleModalEdit").val();
    if(!libelle)
    {
        $('.form-group').removeClass('has-error');
        $('.form-group').removeClass('has-danger');
        $(".help-block").remove();
        var aAjoute = '<div class="help-block form-text text-muted form-control-feedback"> Enter Libelle</div>';
        $('#libelleModalEdit').closest('.form-group').addClass('has-error');
        $('#libelleModalEdit').closest('.form-group').addClass('has-danger');
        $("#libelleModalEdit").after(aAjoute);
    }
    else{
        var paquetId = $('#paquetIdInput').val();
        var form = $(this);
        $("#editGroupe").button('loading');
        $.ajax({
            url : "paquets/editPaquet",
            type: "POST",
            data: {
                "libelle":libelle,
                "paquetId":paquetId
            },
            dataType: 'json',
            success:function(response) {
                $("#editGroupe").button('reset');
                if(response.success == true) {
                    $('.form-group').removeClass('has-error');
                    $('.form-group').removeClass('has-danger');
                    $(".help-block").remove();
                    $("#formGroupesEdit")[0].reset();
                    $('.block[role="'+paquetId+'"] #libelle').html(libelle);
                }  // if
                else {
                    alert('error');
                }
            }
        });
    }
});

/* affecter les paquets*/
$("#formAffecter").on('submit',function(e) {
    e.preventDefault();
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    var paquetId = $('#paquetIdInput').val();
    $.ajax({
        url : "paquets/affecter",
        type: "POST",
        data: {
            "paquetId":paquetId
        },
        dataType: 'json',
        success:function(response) {
            $('.block[role="'+paquetId+'"]').remove();
            $('#formAffecter').modal('hide');
        }
    });
});




