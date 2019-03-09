$('.repartir').on('click',function(){
    $('#ensCourant').val($(this).attr('role'));
});
$('#formRepartir').on('submit',function(e){
	e.preventDefault();
	var idEns = $('#ensCourant').val();
	var aRet="";
    var isCharge = $('.block[id='+idEns+'] input[role="1"]').prop('checked');
    if(isCharge)
    	aRet+="2";
    var isAssistant = $('.block[id='+idEns+'] input[role="2"]').prop('checked');
    if(isAssistant)
    	aRet+=" 3";
    $.ajaxSetup({
      headers: {
       'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      } 
    });
    $.ajax({
                  url : "validerRepartition",
                  type: "POST",
                  data: {
                    "ensId":idEns,
                    "aRet":aRet.trim()
                  },
                  dataType: 'json',
                  success:function(response) {
                    $('#attModal').modal('hide');
                  }
              });
});