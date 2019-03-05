$("#formPromos").on('submit',function(e) {
    e.preventDefault();
    $.ajaxSetup({
  headers: {
    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
  } 
});
    var libelle = $("#libelleModal").val();
    var filiereId = $("#filiereModal").val();
    var niveau = $("#niveauModal").val();
    var form = $(this);
                $("#ajoutPromo").button('loading');
                $.ajax({
                  url : "promotions/ajoutPromo",
                  type: "POST",
                  data: {
                    "libelle":libelle,
                    "niveau":niveau,
                    "filiereId":filiereId
                  },
                  dataType: 'json',
                  success:function(response) {
                   $("#ajoutPromo").button('reset');
                     if(response.success == true) {
                          $('#contentPromos').append(response.messages);
                           $("#formPromos")[0].reset();
                    }  // if
                    else {
                      alert('error');
                    }
                  }
              });
          
  });