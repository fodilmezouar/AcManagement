/* Suppression d'un groupe */
$("#formModuleAtt").on('submit',function(e) {
    e.preventDefault();
    $.ajaxSetup({
      headers: {
       'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      } 
    });
    var moduleId = $('#moduleId').val();
    $.ajax({
                  url : "valide/yes",
                  type: "POST",
                  data: {
                    "moduleId":moduleId,
                    "enseignantId":$('#ensIdInput').val()
                  },
                  dataType: 'json',
                  success:function(response) {
                    $('#attModal').modal('hide');
                  }
              });
});
$('.attaAction').on('click',function(){
    $('#ensIdInput').val($(this).attr('role'));
});