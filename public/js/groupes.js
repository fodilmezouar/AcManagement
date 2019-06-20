/* comme une solution a l'ajout d'un block on utilise une fonction à 3 parametre 
comme dans le cas de suppression */
/** initialisation */
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
function handleError(idChamp,message){
    var aAjoute = '<div class="help-block form-text text-muted form-control-feedback"> '+message+'</div>';
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
/* fin initialisation */
$("#formGroupes").unbind('submit').bind('submit', function (e) {
    e.preventDefault();
    initialiseHeader();
    removeError();
    var libelle = $("#libelleModal").val();
    var fichier = $("#fichier").val();
    if(!libelle)
      handleError('#libelleModal',' Enter Libelle');
    else if(!fichier)
      handleError('#libelleModal','Enter Fichier');
    else
      {
    var promoId = $("#promoId").val();
    var formData = new FormData(this);
    formData.append('promoId',promoId);
                $.ajax({
                  url : "groupes/ajoutGroupe",
                  processData: false,
                  contentType: false ,
                  type: "POST",
                  data:formData,
                  dataType: 'json',
                  success:function(response) {
                          $('#contentGroupes').append(response.messages);
                          $("#formGroupes")[0].reset();
                          alertM('#add-grp','  Groupe Ajoutée');
                  }
              });
          }
  });
/* fin creation */
/**edit groupe**/
$("#formGroupesEdit").on('submit',function(e) {
    e.preventDefault();
    initialiseHeader();
    var libelle = $("#libelleModalEdit").val();
    removeError();
    if(!libelle)
      handleError('#libelleModalEdit',' Enter Libelle');
    else
    {
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
                           $("#formGroupesEdit")[0].reset();
                           $('.block[role="'+groupeId+'"] #libelle').html(libelle);
                           alertM('#edit-grp',' MAJ Effectuée');
                  }
              });
      }
  });
  /* fin edit groupes */
  /* Suppression d'un groupe */
$("#formGroupSupp").on('submit',function(e) {
    e.preventDefault();
    initialiseHeader();
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
                    alertM('#messSuccessBody',' Suppression Effectuée');
                  }
              });
});
/*fin suppression groupe */
/*handle modal edit */
  $('#contentGroupes').on('click','.edit',function(){
    removeError();
    $('#groupIdInput').val($(this).attr('role'));
    $('#libelleModalEdit').val($('.block[role="'+$('#groupIdInput').val()+'"] #libelle').html().trim());
  });
/*handle modal supp */
$('#contentGroupes').on('click','.supp',function(){
  $('#groupIdInput').val($(this).attr('role'));
});

/************************** Fin partie groupes ****************************/

/**************** debut partie module ******************/
   /* creer un module */
$("#formModules").unbind('submit').bind('submit', function (e) {
    e.preventDefault();
    initialiseHeader();
    removeError();
    var libelle = $("#libelleModalModule").val();
    if(!libelle)
      handleError('#libelleModalModule',' Enter Libelle');
    else
    {
    var promoId = $("#promoId").val();
           $.ajax({
                  url : "modules/ajoutModule",
                  type: "POST",
                  data:{
                    "libelle":libelle,
                    "promoId":promoId
                  },
                  dataType: 'json',
                  success:function(response) {
                          $('#contentModules').append(response.messages);
                          $("#formModules")[0].reset();
                          alertM('#add-mod',' Module Ajoutée');
                           //alert(response.messages);
                  }
              });
      }    
  });
  /* fin creation */
  /**edit module**/
$("#formModulesEdit").on('submit',function(e) {
    e.preventDefault();
    initialiseHeader();
    removeError();
    var libelle = $("#libelleModalEditModule").val();
    if(!libelle)
        handleError('#libelleModalEditModule',' Enter Libelle');
    else
    {
    var moduleId = $('#moduleIdInput').val();
                $.ajax({
                  url : "modules/editModule",
                  type: "POST",
                  data: {
                    "libelle":libelle,
                    "moduleId":moduleId
                  },
                  dataType: 'json',
                  success:function(response) {
                           $("#formModulesEdit")[0].reset();
                           $('.blockModule[role="'+moduleId+'"] #libelleModule').html(libelle);
                           alertM('#edit-mod',' MAJ Effectuée');
                  }
              });
      }
  });
/* fin edit module*/
/* Suppression d'un module */
$("#formModuleSupp").on('submit',function(e) {
    e.preventDefault();
    initialiseHeader();
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
                    alertM('#messSuccessBody',' Suppression Effectuée');
                  }
              });
});
/* fin suppression module */
/* handle modal supp */
$('#contentModules').on('click','.suppModule',function(){
  $('#moduleIdInput').val($(this).attr('role'));
});
/** handle edit modal */
$('#contentModules').on('click','.editModule',function(){
  removeError();
  $('#moduleIdInput').val($(this).attr('role'));
  $('#libelleModalEditModule').val($('.blockModule[role="'+$('#moduleIdInput').val()+'"] #libelleModule').html().trim());
});
/* handle ajout choix entre modal */
/** choose modal when clickin floatede button **/
$('.floatChoose').on('click',function(){
   var choix = $(this).html().trim();
   if(choix == "Modules")
     $('#zombro').attr('data-target','#modalModule');
   else
     $('#zombro').attr('data-target','#exampleModal1');
});
/* fin handle */
$('#zombro').on('click',function(){
   removeError();
   $("#formGroupes")[0].reset();
   $("#formModules")[0].reset();
});


/********************* fin partie module ***********************/

/************* handle attachement module **********************/
$('#contentModules').on('click','.attModule',function(){
  $('#attModuleIdInput').val($(this).attr('role'));
});
/**attachement**/
$("#formModulesAtt").on('submit',function(e) {
    e.preventDefault();
    initialiseHeader();
    var ensId = $('#ensLib').val();
    if(ensId == "-1")
      handleError('#attError',' Veuillez choisir un enseignant');
    else {
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
                    alertM('#messSuccessBody',' Module Affecté');
                  }
              });
   }
});
//fin attachement









