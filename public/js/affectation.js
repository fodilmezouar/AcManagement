
$("#formModuleAtt").on('submit',function(e) {
    e.preventDefault();
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    var nombreG = $('#nombreG').val();
    var listTd = new Array();
    var listTp = new Array();
    var listeG = new Array();
    for (var i=1;i<=nombreG;i++){
        listTd.push(isChecked($('#td'+i)));
        listTp.push(isChecked($('#tp'+i)));
        listeG.push(parseInt($('#tp'+i).attr('role')));
    }
    var moduleId = parseInt($('#moduleId').val());
    $.ajax({
        url : "valider",
        type: "POST",
        data: {
            listTd:listTd,
            listTp:listTp,
            listeG:listeG,
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

function isChecked(val) {
    if (val[0].checked)
        return 1;
    else return 0;
}