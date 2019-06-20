$('#changeFiliere').on('click',function (e) {
	 var t = $('#filiereContent').text().trim();
     $('#filiereContent').html($('<input />',{'value' : t,
     	'class':'form-control',id:'libelleFiliere'}).val(t));
     $('#libelleFiliere').focus();
});
$('#libelleFiliere').on('keyup',function(e){
	alert('c');
    if(e.keyCode == 13)
    {
        alert("koko");
    }
});
$('#filiereContent').on('keyup','#libelleFiliere',function(e){
	var filiereName =  $('#libelleFiliere').val();
    if(e.keyCode == 13)
    {
        
     $.ajaxSetup({
      headers: {
       'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      } 
    });
    $.ajax({
                  url : "config/setFiliere",
                  type: "POST",
                  data: {
                    "filiere":filiereName
                  },
                  dataType: 'json',
                  success:function(response) {
                      
                  }
              });
    $('#filiereContent').html($(this).val());
    }
});