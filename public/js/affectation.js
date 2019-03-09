
$("#formModuleAtt").on('submit',function(e) {
    e.preventDefault();
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    var nombreG = parseInt($('#nombreG').val());
    var targetId = parseInt( $('#targetId').val());
    var nombreEns =parseInt($('#nombreEns').val());
    var listTd = new Array();
    var listTp = new Array();
    var listeG = new Array();
    var td = new Array();
    var tp =new Array();
    for (var i=1;i<=nombreG;i++){
        listeG.push(parseInt($('#tp'+i).attr('target')));
        td.push($("input[role='td"+i+"']"));
        tp.push($("input[role='tp"+i+"']"));
    }
    for(var i=0;i<nombreG;i++){
        listTd.push(isChecked(td[i][nombreEns-targetId]));
        listTp.push(isChecked(tp[i][nombreEns-targetId]));
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
    $('#targetId').val($(this).attr('target'));

});
//$("input[role='td"+1+"']")
function isChecked(val) {
    if (val.checked)
        return 1;
    else return 0;
}