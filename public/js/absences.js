$('#liste').on('submit',function(e){
	e.preventDefault();
	$.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    var absences = $("input:checkbox:not(:checked)");
    var tab = [];
    for (var i = 0; i < absences.length; i++) {
    	tab[i] = absences[i].id;
    }
    var seanceId = $('#seanceId').val();
    var dateSc = $('#date').val();
    $.ajax({
                  url : "/calendrier/getListe/absences/valider",
                  type: "POST",
                  data: {
                    "seanceId":seanceId,
                    "students":tab,
                    "dateSc":dateSc
                  },
                  dataType: 'json',
                  success:function(response) {
                    $('#validerListe').modal('hide');
                    $('#mess').html('<div class="alert alert-success">' +
                            '<button type="button" class="close" data-dismiss="alert">&times;</button>' +
                            '<strong><i class="fa fa-check"></i></strong> Absences validées</div>');
                        $(".alert-success").delay(500).show(10, function () {
                            $(this).delay(3000).hide(10, function () {
                                $(this).remove();
                            });
                        }); // /.alert
                  }
              });
});
$(".justifier").on('click',function(){
      $.ajax({
                  url : "/absences/getAbsEtudiant",
                  type: "GET",
                  data: {
                    "etudId":$(this).attr('id'),
                    "seanceId":$("#seanceId").val()
                  },
                  dataType: 'json',
                  success:function(response) {
                    var tab = response.messages ;
                    for (var i = 0; i < tab.length; i++) {
                      var element = tab[i];
                      var aAjouter = "<tr><td>"+element["date_ins"]+"</td><td><input type='checkbox' id='"+element['absId']+"'></td></tr>";
                      $('#absContent').append(aAjouter);
                    }
                  }
        });
});
$('#formJustification').on('submit',function(e){
   e.preventDefault();
   $.ajaxSetup({
  headers: {
    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
  } 
});
   var tab = $('input:checked');
    var absencesId = [];
    for (var i = 0; i < tab.length; i++) {
      absencesId[i] = tab[i].id;
    }
     var formData = new FormData(this);
     formData.append("absencesId",absencesId);
                $.ajax({
                  url : "/validJustificatif",
                  processData: false,
                  contentType: false ,
                  type: "POST",
                  data:formData,
                  dataType: 'json',
                  success:function(response) {
                     location.href = location.href;
                  }
              });
});