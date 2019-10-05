$("#studentsTable").DataTable();
//initialiser l'envoi du requete ajax
function initialiseHeader(){
         $.ajaxSetup({
            headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
           } 
          });
}
function handleError(idChamp,message){
    var aAjoute = '<div class="help-block form-text text-muted form-control-feedback"> '+message+'</div>';
    $(idChamp).closest('.form-group').addClass('has-error');
    $(idChamp).closest('.form-group').addClass('has-danger');
    $(idChamp).after(aAjoute);
}
function removeError(){
    $('.form-group').removeClass('has-error');
    $('.form-group').removeClass('has-danger');
    $(".help-block").remove();
}
/**edit Etudiant**/
$("#formEtudiantEdit").on('submit',function(e) {
    e.preventDefault();
    initialiseHeader();
    removeError();
    var nom = $("#nom").val();
    var prenom = $("#prenom").val();
    var numero = $("#numero").val();
    var naissance = $("#naissance").val();
    var noError = true;
    if(!nom || !prenom || !numero || !naissance)
    	  noError = false;
    if(!nom)
        handleError('#nom',"Enter nom");
    if(!prenom)
        handleError('#prenom',"Enter prenom");
    if(!numero)
        handleError('#numero',"Enter Numéro");
    if(!naissance)
        handleError('#naissance',"Enter D-Naissance");
    if(noError)
     {
      var etudiantId = $("#etudiantId").val();
      $.ajax({
                  url : "/etudiants/edit",
                  type: "POST",
                  data: {
                    "etudiantId":etudiantId,
                    "nom":nom,
                    "prenom":prenom,
                    "numero":numero,
                    "naissance":naissance,
                  },
                  dataType: 'json',
                  success:function(response) {
                           $("#formEtudiantEdit")[0].reset();
                           $('#editEtudiantModal').modal('hide');
                           $('.block[id="'+etudiantId+'"] .numeroTd').html(numero);
                           $('.block[id="'+etudiantId+'"] .nomTd').html(nom);
                           $('.block[id="'+etudiantId+'"] .prenomTd').html(prenom);
                           $('.block[id="'+etudiantId+'"] .naissanceTd').html(naissance);
                           alertM('#edit-etd',' MAJ Effectuée');
                  }
              });
      }
  });
 /**add Etudiant**/
$("#formEtudiantAdd").on('submit',function(e) {
    e.preventDefault();
    initialiseHeader();
    removeError();
    var nom = $("#nomAdd").val();
    var prenom = $("#prenomAdd").val();
    var numero = $("#numeroAdd").val();
    var naissance = $("#naissanceAdd").val();
    var noError = true;
    if(!nom || !prenom || !numero || !naissance)
        noError = false;
    if(!nom)
        handleError('#nomAdd',"Enter nom");
    if(!prenom)
        handleError('#prenomAdd',"Enter prenom");
    if(!numero)
        handleError('#numeroAdd',"Enter Numéro");
    if(!naissance)
        handleError('#naissanceAdd',"Enter D-Naissance");
    if(noError)
     {
      var grpId = $('#grpId').val();
      $.ajax({
                  url : "/etudiants/add",
                  type: "POST",
                  data: {
                    "grpId":grpId,
                    "nom":nom,
                    "prenom":prenom,
                    "numero":numero,
                    "naissance":naissance,
                  },
                  dataType: 'json',
                  success:function(response) {
                           $("#formEtudiantAdd")[0].reset();  
                           var htmlParse =  $.parseHTML(response.messages);
                           $('#contentEtudiants').append(htmlParse);                  
                           alertM('#add-etd',' MAJ Effectuée');
                  }
              });
      }
  });
$('#contentEtudiants').on('click','.edit',function(){
    removeError();
    $('#etudiantId').val($(this).attr('id'));
    $('#numero').val($('.block[id="'+$('#etudiantId').val()+'"] .numeroTd').html().trim());
    $('#nom').val($('.block[id="'+$('#etudiantId').val()+'"] .nomTd').html().trim());
    $('#prenom').val($('.block[id="'+$('#etudiantId').val()+'"] .prenomTd').html().trim());
    $('#naissance').val($('.block[id="'+$('#etudiantId').val()+'"] .naissanceTd').html().trim());
  });
$('#contentEtudiants').on('click','.supp',function(){
  $('#etudiantId').val($(this).attr('id'));
});
 /* Suppression d'un etudiant*/
$("#formEtudiantSupp").on('submit',function(e) {
    e.preventDefault();
    initialiseHeader();
    var etudiantId = $('#etudiantId').val();
    $.ajax({
                  url : "/etudiants/supp",
                  type: "POST",
                  data: {
                    "etudiantId":etudiantId
                  },
                  dataType: 'json',
                  success:function(response) {
                    $('.block[id="'+etudiantId+'"]').remove();
                    $('#suppEtudiantModal').modal('hide');
                    alertM('#messSuccessBody',' Suppression Effectuée');
                  }
              });
});
/*fin suppression groupe */