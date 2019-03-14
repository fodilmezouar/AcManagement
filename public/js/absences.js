$('#liste').on('submit',function(e){
	e.preventDefault();
	$.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    var absences = $('input:checked');
    var tab = [];
    for (var i = 0; i < absences.length; i++) {
    	tab[i] = absences[i].id;
    }
    var seanceId = $('#seanceId').val();
    $.ajax({
                  url : "absences/valider",
                  type: "POST",
                  data: {
                    "seanceId":seanceId,
                    "students":tab
                  },
                  dataType: 'json',
                  success:function(response) {
                    $('#validerListe').modal('hide');
                  }
              });
});