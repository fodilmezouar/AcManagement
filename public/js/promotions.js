
$('#export').on('click',function(){
  location.href="/export/"+$('#grpId').val();
});
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
                     if(response.success == true) {
                      
                          $('#contentPromos').append(response.messages);
                           $("#formPromos")[0].reset();
                           $('#add-prom-messages').html('<div class="alert alert-success">' +
                            '<button type="button" class="close" data-dismiss="alert">&times;</button>' +
                            '<strong><i class="fa fa-check"></i></strong> Promo ajoutée avec success</div>');
                        $(".alert-success").delay(500).show(10, function () {
                            $(this).delay(3000).hide(10, function () {
                                $(this).remove();
                            });
                        }); // /.alert
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
                    $('#remove-messages-promo').html('<div class="alert alert-success">' +
                            '<button type="button" class="close" data-dismiss="alert">&times;</button>' +
                            '<strong><i class="fa fa-check"></i></strong> Suppression Effectuée</div>');
                        $(".alert-success").delay(500).show(10, function () {
                            $(this).delay(3000).hide(10, function () {
                                $(this).remove();
                            });
                        }); // /.alert
                    $('.block[role="'+promoId+'"]').remove();
                    $('#suppModal').modal('hide');
                    
                  }
              });
});
$('#floated-add').on('click',function(){
   $('.form-group').removeClass('has-error');
    $('.form-group').removeClass('has-danger');
    $(".help-block").remove();
});
$('#contentPromos').on('click','.supp',function(){
  $('#promoIdInput').val($(this).attr('role'));
});
$('#contentPromos').on('click','.edit',function(){
  $('.form-group').removeClass('has-error');
    $('.form-group').removeClass('has-danger');
    $(".help-block").remove();
  $('#promoIdInput').val($(this).attr('role'));
  $('#libelleModalEdit').val($('.block[role="'+$('#promoIdInput').val()+'"] #libelle').html().trim());
  $('#filiereModalEdit').val($('input[id="'+$('#promoIdInput').val()+'"').val());
  $('#niveauModalEdit').val($('input[id="'+$('#promoIdInput').val()+'5"').val());
});

/**edit promotion**/
$("#formPromosEdit").on('submit',function(e) {
    e.preventDefault();
    $('.form-group').removeClass('has-error');
    $('.form-group').removeClass('has-danger');
    $(".help-block").remove();
    $.ajaxSetup({
  headers: {
    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
  } 
});
    var libelle = $("#libelleModalEdit").val();
    if(!libelle)
       {
        var aAjoute = '<div class="help-block form-text text-muted form-control-feedback"> Enter Libelle</div>';
        $('#libelleModalEdit').closest('.form-group').addClass('has-error');
        $('#libelleModalEdit').closest('.form-group').addClass('has-danger');
        $("#libelleModalEdit").after(aAjoute);
      }
    else{
    var filiereId = $("#filiereModalEdit").val();
    var niveau = $("#niveauModalEdit").val();
    var promoId = $('#promoIdInput').val();
    var form = $(this);
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
                     if(response.success == true) {
                           $("#formPromosEdit")[0].reset();
                           if(libelle)
                              $('.block[role="'+promoId+'"] #libelle').html(libelle);
                           $('.block[role="'+promoId+'"] #filiere').html(response.messages);
                           $('#edit-prom-messages').html('<div class="alert alert-success">' +
                            '<button type="button" class="close" data-dismiss="alert">&times;</button>' +
                            '<strong><i class="fa fa-check"></i></strong> MAJ Effectuée</div>');
                        $(".alert-success").delay(500).show(10, function () {
                            $(this).delay(3000).hide(10, function () {
                                $(this).remove();
                            });
                        }); // /.alert
                    }  // if
                    else {
                      alert('error');
                    }
                  }
              });
      }
  });