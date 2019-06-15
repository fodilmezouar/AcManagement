
$('#export').on('click',function(){
  location.href="/export/"+$('#grpId').val();
});
//initialiser l'envoi du requete ajax
function initialiseHeader(){
         $.ajaxSetup({
            headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
           } 
          });
}
function removeError(){
    $('.form-group').removeClass('has-error');
    $('.form-group').removeClass('has-danger');
    $(".help-block").remove();
}
function handleError(idChamp){
    var aAjoute = '<div class="help-block form-text text-muted form-control-feedback"> Enter Libelle</div>';
    $(idChamp).closest('.form-group').addClass('has-error');
    $(idChamp).closest('.form-group').addClass('has-danger');
    $(idChamp).after(aAjoute);
}
function alertM(idChamp,message){
    $(idChamp).html('<div class="alert alert-success">' +
    '<button type="button" class="close" data-dismiss="alert">&times;</button>' +
     '<strong><i class="fa fa-check"></i></strong> '+message+'</div>');
                        $(".alert-success").delay(500).show(10, function () {
                            $(this).delay(3000).hide(10, function () {
                                $(this).remove();
                            });
                        }); // /.alert
}
//pour eviter le probleme de fermer ouvrir un model
$('#floated-add').on('click',function(){
  $("#formPromos")[0].reset();
  removeError();
});
//la création d'une promos
$("#formPromos").on('submit',function(e) {
    e.preventDefault();
    initialiseHeader();
    var libelle = $("#libelleModal").val();
    removeError();
    if(!libelle)
        handleError("#libelleModal");
    else
    {
    var filiereId = $("#filiereModal").val();
    var niveau = $("#niveauModal").val();
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
                         $('#contentPromos').append(response.messages);
                         $("#formPromos")[0].reset();
                         alertM('#add-prom-messages',' Promo ajoutée avec success');
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
                    alertM('#remove-messages-promo',' Suppression Effectuée');
                    $('.block[role="'+promoId+'"]').remove();
                    $('#suppModal').modal('hide');
                  }
              });
});

$('#contentPromos').on('click','.supp',function(){
  $('#promoIdInput').val($(this).attr('role'));
});
$('#contentPromos').on('click','.edit',function(){
  removeError();
  $('#promoIdInput').val($(this).attr('role'));
  $('#libelleModalEdit').val($('.block[role="'+$('#promoIdInput').val()+'"] #libelle').html().trim());
  $('#filiereModalEdit').val($('input[id="'+$('#promoIdInput').val()+'"').val());
  $('#niveauModalEdit').val($('input[id="'+$('#promoIdInput').val()+'5"').val());
});

/**edit promotion**/
$("#formPromosEdit").on('submit',function(e) {
    e.preventDefault();
    initialiseHeader();
    removeError();
    var libelle = $("#libelleModalEdit").val();
    if(!libelle)
        handleError('#libelleModalEdit');
    else
     {
      var filiereId = $("#filiereModalEdit").val();
      var niveau = $("#niveauModalEdit").val();
      var promoId = $('#promoIdInput').val();
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
                           $("#formPromosEdit")[0].reset();
                           if(libelle)
                              $('.block[role="'+promoId+'"] #libelle').html(libelle);
                           $('.block[role="'+promoId+'"] #filiere').html(response.messages);
                           alertM('#edit-prom-messages',' MAJ Effectuée');
                  }
              });
      }
  });