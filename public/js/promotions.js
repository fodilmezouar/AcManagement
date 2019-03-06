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
    var filiereId = $("#filiereModal").val();
    var niveau = $("#niveauModal").val();
    var form = $(this);
                $("#ajoutPromo").button('loading');
                $.ajax({
                  url : "promotions/ajoutPromo",
                  type: "POST",
                  data: {
                    "libelle":libelle,
                    "niveau":niveau,
                    "filiereId":filiereId
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
    var promoId = $('#promoIdInput').val();
    $.ajax({
                  url : "promotions/suppPromo",
                  type: "POST",
                  data: {
                    "promoId":promoId
                  },
                  dataType: 'json',
                  success:function(response) {
                    $('.block[role="'+promoId+'"]').remove();
                    $('#suppModal').modal('hide');
                  }
              });
});
$('.supp').on('click',function(){
  $('#promoIdInput').val($(this).attr('role'));
});
$('.edit').on('click',function(){
  $('#promoIdInput').val($(this).attr('role'));
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
    var filiereId = $("#filiereModalEdit").val();
    var niveau = $("#niveauModalEdit").val();
    var promoId = $('#promoIdInput').val();
    var form = $(this);
                $("#ajoutPromo").button('loading');
                $.ajax({
                  url : "promotions/editPromo",
                  type: "POST",
                  data: {
                    "libelle":libelle,
                    "niveau":niveau,
                    "filiereId":filiereId,
                    "promoId":promoId
                  },
                  dataType: 'json',
                  success:function(response) {
                   $("#editPromo").button('reset');
                     if(response.success == true) {
                           $("#formPromosEdit")[0].reset();
                           if(libelle)
                              $('.block[role="'+promoId+'"] #libelle').html(libelle);
                           $('.block[role="'+promoId+'"] #filiere').html(response.messages);
                    }  // if
                    else {
                      alert('error');
                    }
                  }
              });
  });