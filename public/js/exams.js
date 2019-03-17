$("#formPromos").on('submit',function(e) {
    e.preventDefault();
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    var libelle = $("#libelleModal").val();
    if(!libelle)
    {
        $('.form-group').removeClass('has-error');
        $('.form-group').removeClass('has-danger');
        $(".help-block").remove();
        var aAjoute = '<div class="help-block form-text text-muted form-control-feedback"> Enter Libelle</div>';
        $('#libelleModal').closest('.form-group').addClass('has-error');
        $('#libelleModal').closest('.form-group').addClass('has-danger');
        $("#libelleModal").after(aAjoute);
    }
    else
    {
        $('.form-group').removeClass('has-error');
        $('.form-group').removeClass('has-danger');
        $(".help-block").remove();
        var moduleId = parseInt($("#filiereModal").val());
        var dateExam = $("#niveauModal").val();
        var form = $(this);
        $("#ajoutExam").button('loading');
        $.ajax({
            url : "ajoutExam",
            type: "POST",
            data: {
                "libelle":libelle,
                "dateExam":dateExam,
                "moduleId":moduleId
            },
            dataType: 'json',
            success:function(response) {
                $("#ajoutPromo").button('reset');
                if(response.success == true) {
                    $('#contentPromos').append(response.messages);
                    $("#formPromos")[0].reset();
                }  // if
                else {
                    alert('error');
                }
            }
        });
    }
});

/* Suppression d'une promotions */
$("#formPromosSupp").on('submit',function(e) {
    e.preventDefault();
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    var examId = $('#promoIdInput').val();
    $.ajax({
        url : "exams/suppExam",
        type: "POST",
        data: {
            "examId":examId
        },
        dataType: 'json',
        success:function(response) {
            $('.block[role="'+examId+'"]').remove();
            $('#suppModal').modal('hide');
        }
    });
});
$('#contentPromos').on('click','.supp',function(){
    $('#promoIdInput').val($(this).attr('role'));
});
$('#contentPromos').on('click','.edit',function(){
    $('#promoIdInput').val($(this).attr('role'));
    $('#libelleModalEdit').val($('.block[role="'+$('#promoIdInput').val()+'"] #libelle').html().trim());
    $('#filiereModalEdit').val($('input[id="'+$('#promoIdInput').val()+'"').val());
    $('#niveauModalEdit').val($('input[id="'+$('#promoIdInput').val()+'5"').val());
});

/**edit promotion**/
$("#formPromosEdit").on('submit',function(e) {
    e.preventDefault();
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    var libelle = $("#libelleModalEdit").val();
    var moduleId = $("#filiereModalEdit").val();
    var dateExam = $("#niveauModalEdit").val();
    var examId = $('#promoIdInput').val();
    var form = $(this);
    $("#ajoutPromo").button('loading');
    $.ajax({
        url : "editExam",
        type: "POST",
        data: {
            "libelle":libelle,
            "dateExam":dateExam,
            "moduleId":moduleId,
            "examId":examId
        },
        dataType: 'json',
        success:function(response) {
            $("#editPromo").button('reset');
            if(response.success == true) {
                $("#formPromosEdit")[0].reset();
                if(libelle)
                    $('.block[role="'+examId+'"] #libelle').html(libelle);
                $('.block[role="'+examId+'"] #filiere').html(response.messages);
            }  // if
            else {
                alert('error');
            }
        }
    });
});