
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