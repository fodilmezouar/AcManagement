
$("#formGroupes").on('submit',function(e) {
    e.preventDefault();
    alert('zouba');
    $.ajaxSetup({
  headers: {
    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
  } 
});
    var libelle = $("#libelleModal").val();
    var promoId = $("#promoId").val();
    var form = $(this);
                $("#ajoutPromo").button('loading');
                $.ajax({
                  url : "promotions/groupes/ajoutGroupe",
                  type: "POST",
                  data: {
                    "libelle":libelle,
                    "promoId":promoId
                  },
                  dataType: 'json',
                  success:function(response) {
                   $("#ajoutGroupe").button('reset');
                     if(response.success == true) {
                          $('#contentGroupes').append(response.messages);
                           $("#formGroupes")[0].reset();
                    }  // if
                    else {
                      alert('error');
                    }
                  }
              });
          
  });