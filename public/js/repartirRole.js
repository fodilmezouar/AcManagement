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
                    $('#success-mess').html('<div class="alert alert-success">' +
                            '<button type="button" class="close" data-dismiss="alert">&times;</button>' +
                            '<strong><i class="fa fa-check"></i></strong> Répartition Effectuée</div>');
                        $(".alert-success").delay(500).show(10, function () {
                            $(this).delay(3000).hide(10, function () {
                                $(this).remove();
                            });
                        }); // /.alert
                  }
              });
});