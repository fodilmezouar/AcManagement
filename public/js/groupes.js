/* comme une solution a l'ajout d'un block on utilise une fonction à 3 parametre 
comme dans le cas de suppression */
$("#formGroupes").unbind('submit').bind('submit', function (e) {
    e.preventDefault();
    $.ajaxSetup({
  headers: {
    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
  } 
});
  $('.form-group').removeClass('has-error');
  $('.form-group').removeClass('has-danger');
  $(".help-block").remove();
    var libelle = $("#libelleModal").val();
    var fichier = $("#fichier").val();
    if(!libelle)
    {
      var aAjoute = '<div class="help-block form-text text-muted form-control-feedback"> Enter Libelle</div>';
        $('#libelleModal').closest('.form-group').addClass('has-error');
        $('#libelleModal').closest('.form-group').addClass('has-danger');
        $("#libelleModal").after(aAjoute);
    }
    else if(!fichier){
        var aAjoute = '<div class="help-block form-text text-muted form-control-feedback"> Enter Libelle</div>';
        $('#fichier').closest('.form-group').addClass('has-error');
        $('#fichier').closest('.form-group').addClass('has-danger');
        $("#fichier").after(aAjoute);
    }
    else{
    var promoId = $("#promoId").val();
    var formData = new FormData(this);
    formData.append('promoId',promoId);
    var form = $(this);
                $.ajax({
                  url : "groupes/ajoutGroupe",
                  processData: false,
                  contentType: false ,
                  type: "POST",
                  data:formData,
                  dataType: 'json',
                  success:function(response) {
                     if(response.success == true) {
                          $('#contentGroupes').append(response.messages);
                          $("#formGroupes")[0].reset();
                          $('#add-grp').html('<div class="alert alert-success">' +
                            '<button type="button" class="close" data-dismiss="alert">&times;</button>' +
                            '<strong><i class="fa fa-check"></i></strong> Groupe Ajoutée</div>');
                        $(".alert-success").delay(500).show(10, function () {
                            $(this).delay(3000).hide(10, function () {
                                $(this).remove();
                            });
                        }); // /.alert
                           //alert(response.messages);
                    }  // if
                    else {
                      alert('error');
                    }
                  }
              });
          }
  });
$('#contentGroupes').on('click','.supp',function(){
  $('#groupIdInput').val($(this).attr('role'));
});
$('#contentModules').on('click','.suppModule',function(){
  $('#moduleIdInput').val($(this).attr('role'));
});
$('#contentModules').on('click','.attModule',function(){
  $('#attModuleIdInput').val($(this).attr('role'));

     //$('#ensLib').val($(this).attr('id'));
});
/**attachement**/
$("#formModulesAtt").on('submit',function(e) {
    e.preventDefault();
    $.ajaxSetup({
      headers: {
       'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      } 
    });
    var ensId = $('#ensLib').val();
    if(ensId == "-1")
    {
       $('#attError').html('<div class="alert alert-danger">' +
                            '<button type="button" class="close" data-dismiss="alert">&times;</button>' +
                            '<strong><i class="fa fa-times"></i></strong> Veuillez choisir un enseignant</div>');
                        $(".alert-danger").delay(500).show(10, function () {
                            $(this).delay(3000).hide(10, function () {
                                $(this).remove();
                            });
                        }); // /.alert
    }
    else{
    var moduleId = $('#attModuleIdInput').val();
    $.ajax({
                  url : "/valide/attachement",
                  type: "POST",
                  data: {
                    "moduleId":moduleId,
                    "enseignantId":ensId
                  },
                  dataType: 'json',
                  success:function(response) {
                    //$('#attModal').modal('hide');
                    $('.blockModule[role="'+moduleId+'"] #affOption').html('<span style="color:green;">affecté</span>');
                    $('#attModuleModal').modal('hide');
                    
                     $('#messSuccessBody').html('<div class="alert alert-success">' +
                            '<button type="button" class="close" data-dismiss="alert">&times;</button>' +
                            '<strong><i class="fa fa-check"></i></strong> Module Affecté</div>');
                        $(".alert-success").delay(500).show(10, function () {
                            $(this).delay(3000).hide(10, function () {
                                $(this).remove();
                            });
                        }); // /.alert
                  }
              });
   }
});
//fin attachement
$('#contentGroupes').on('click','.edit',function(){
  $('#groupIdInput').val($(this).attr('role'));
  $('#libelleModalEdit').val($('.block[role="'+$('#groupIdInput').val()+'"] #libelle').html().trim());
  $('.form-group').removeClass('has-error');
  $('.form-group').removeClass('has-danger');
  $(".help-block").remove();
});
$('#contentModules').on('click','.editModule',function(){
  $('#moduleIdInput').val($(this).attr('role'));
  $('#libelleModalEditModule').val($('.blockModule[role="'+$('#moduleIdInput').val()+'"] #libelleModule').html().trim());
  $('.form-group').removeClass('has-error');
  $('.form-group').removeClass('has-danger');
  $(".help-block").remove();
});
/* Suppression d'un groupe */
$("#formGroupSupp").on('submit',function(e) {
    e.preventDefault();
    $.ajaxSetup({
      headers: {
       'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      } 
    });
    var groupeId = $('#groupIdInput').val();
    $.ajax({
                  url : "groupes/suppGroupe",
                  type: "POST",
                  data: {
                    "groupeId":groupeId
                  },
                  dataType: 'json',
                  success:function(response) {
                    $('.block[role="'+groupeId+'"]').remove();
                    $('#suppGroupModal').modal('hide');
                    $('#messSuccessBody').html('<div class="alert alert-success">' +
                            '<button type="button" class="close" data-dismiss="alert">&times;</button>' +
                            '<strong><i class="fa fa-check"></i></strong> Suppression Effectuée</div>');
                        $(".alert-success").delay(500).show(10, function () {
                            $(this).delay(3000).hide(10, function () {
                                $(this).remove();
                            });
                        }); // /.alert
                  }
              });
});
/* Suppression d'un module */
$("#formModuleSupp").on('submit',function(e) {
    e.preventDefault();
    $.ajaxSetup({
      headers: {
       'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      } 
    });
    var moduleId = $('#moduleIdInput').val();
    $.ajax({
                  url : "modules/suppModule",
                  type: "POST",
                  data: {
                    "moduleId":moduleId
                  },
                  dataType: 'json',
                  success:function(response) {
                    $('.blockModule[role="'+moduleId+'"]').remove();
                    $('#suppModuleModal').modal('hide');
                    $('#messSuccessBody').html('<div class="alert alert-success">' +
                            '<button type="button" class="close" data-dismiss="alert">&times;</button>' +
                            '<strong><i class="fa fa-check"></i></strong> Suppression Effectuée</div>');
                        $(".alert-success").delay(500).show(10, function () {
                            $(this).delay(3000).hide(10, function () {
                                $(this).remove();
                            });
                        }); // /.alert
                  }
              });
});
/**edit groupe**/
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
    var groupeId = $('#groupIdInput').val();
    var form = $(this);
                $.ajax({
                  url : "groupes/editGroupe",
                  type: "POST",
                  data: {
                    "libelle":libelle,
                    "groupeId":groupeId
                  },
                  dataType: 'json',
                  success:function(response) {
                     if(response.success == true) {
                           $('.form-group').removeClass('has-error');
                           $('.form-group').removeClass('has-danger');
                           $(".help-block").remove();
                           $("#formGroupesEdit")[0].reset();
                           $('.block[role="'+groupeId+'"] #libelle').html(libelle);
                           $('#edit-grp').html('<div class="alert alert-success">' +
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
$('#zombro').on('click',function(){
   $('.form-group').removeClass('has-error');
    $('.form-group').removeClass('has-danger');
    $(".help-block").remove();
});
/** choose modal when clickin floatede button **/
$('.floatChoose').on('click',function(){
   var choix = $(this).html().trim();
   if(choix == "Modules"){
     $('#zombro').attr('data-target','#modalModule');
   }
   else
   {
     $('#zombro').attr('data-target','#exampleModal1');
   }
});

$("#formModules").unbind('submit').bind('submit', function (e) {
    e.preventDefault();
    $.ajaxSetup({
  headers: {
    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
  } 
});
    var libelle = $("#libelleModalModule").val();
    var promoId = $("#promoId").val();
    var form = $(this);
                $.ajax({
                  url : "modules/ajoutModule",
                  type: "POST",
                  data:{
                    "libelle":libelle,
                    "promoId":promoId
                  },
                  dataType: 'json',
                  success:function(response) {
                     if(response.success == true) {
                          $('#contentModules').append(response.messages);
                          $("#formModules")[0].reset();
                          $('#add-mod').html('<div class="alert alert-success">' +
                            '<button type="button" class="close" data-dismiss="alert">&times;</button>' +
                            '<strong><i class="fa fa-check"></i></strong> Module Ajoutée</div>');
                        $(".alert-success").delay(500).show(10, function () {
                            $(this).delay(3000).hide(10, function () {
                                $(this).remove();
                            });
                        }); // /.alert
                           //alert(response.messages);
                    }  // if
                    else {
                      alert('error');
                    }
                  }
              });
          
  });

/**edit groupe**/
$("#formModulesEdit").on('submit',function(e) {
    e.preventDefault();
    $.ajaxSetup({
  headers: {
    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
  } 
});
    var libelle = $("#libelleModalEditModule").val();
    if(!libelle)
       {
        $('.form-group').removeClass('has-error');
        $('.form-group').removeClass('has-danger');
        $(".help-block").remove();
       var aAjoute = '<div class="help-block form-text text-muted form-control-feedback"> Enter Libelle</div>';
        $('#libelleModalEditModule').closest('.form-group').addClass('has-error');
        $('#libelleModalEditModule').closest('.form-group').addClass('has-danger');
        $("#libelleModalEditModule").after(aAjoute);
       }
    else{
    var moduleId = $('#moduleIdInput').val();
    var form = $(this);
                $.ajax({
                  url : "modules/editModule",
                  type: "POST",
                  data: {
                    "libelle":libelle,
                    "moduleId":moduleId
                  },
                  dataType: 'json',
                  success:function(response) {
                     if(response.success == true) {
                           $('.form-group').removeClass('has-error');
                           $('.form-group').removeClass('has-danger');
                           $(".help-block").remove();
                           $("#formModulesEdit")[0].reset();
                           $('.blockModule[role="'+moduleId+'"] #libelleModule').html(libelle);
                           $('#edit-mod').html('<div class="alert alert-success">' +
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