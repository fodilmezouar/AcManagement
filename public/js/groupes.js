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
    formData.append('promoId',promoId);
    var form = $(this);
                $("#ajoutGroupe").button('loading');
                $.ajax({
                  url : "groupes/ajoutGroupe",
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
                           //alert(response.messages);
                    }  // if
                    else {
                      alert('error');
                    }
                  }
              });
          
  });
$('#contentGroupes').on('click','.supp',function(){
  $('#groupIdInput').val($(this).attr('role'));
});
$('#contentModules').on('click','.suppModule',function(){
  $('#moduleIdInput').val($(this).attr('role'));
});
$('#contentModules').on('click','.attModule',function(){
  $('#attModuleIdInput').val($(this).attr('role'));
  location.href="modules/attModule/"+$('#attModuleIdInput').val();
});
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
                $("#editGroupe").button('loading');
                $.ajax({
                  url : "groupes/editGroupe",
                  type: "POST",
                  data: {
                    "libelle":libelle,
                    "groupeId":groupeId
                  },
                  dataType: 'json',
                  success:function(response) {
                   $("#editGroupe").button('reset');
                     if(response.success == true) {
                           $('.form-group').removeClass('has-error');
                           $('.form-group').removeClass('has-danger');
                           $(".help-block").remove();
                           $("#formGroupesEdit")[0].reset();
                           $('.block[role="'+groupeId+'"] #libelle').html(libelle);
                    }  // if
                    else {
                      alert('error');
                    }
                  }
              });
      }
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
                $("#ajoutModule").button('loading');
                $.ajax({
                  url : "modules/ajoutModule",
                  type: "POST",
                  data:{
                    "libelle":libelle,
                    "promoId":promoId
                  },
                  dataType: 'json',
                  success:function(response) {
                   $("#ajoutModule").button('reset');
                     if(response.success == true) {
                          $('#contentModules').append(response.messages);
                          $("#formModules")[0].reset();
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
                $("#editGroupe").button('loading');
                $.ajax({
                  url : "modules/editModule",
                  type: "POST",
                  data: {
                    "libelle":libelle,
                    "moduleId":moduleId
                  },
                  dataType: 'json',
                  success:function(response) {
                   $("#editModule").button('reset');
                     if(response.success == true) {
                           $('.form-group').removeClass('has-error');
                           $('.form-group').removeClass('has-danger');
                           $(".help-block").remove();
                           $("#formModulesEdit")[0].reset();
                           $('.blockModule[role="'+moduleId+'"] #libelleModule').html(libelle);
                    }  // if
                    else {
                      alert('error');
                    }
                  }
              });
      }
  });