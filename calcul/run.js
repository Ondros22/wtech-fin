
$(document).ready(function(){
    $('#calcul').submit(function(e){
        e.preventDefault();
        var data = {
            "action": "calcul",
            "txt": $('#inp').val(),
            "key":key
        };
        $.ajax({
            type: "POST",
            dataType: "json",
            data: data,
            url:"http://147.175.121.210:8233/final_zadanie/ajax.php?",
            complete: async function(datta) {
                console.log(datta);
                $('#oup').val(datta.responseJSON);
                $('#oup').val($('#oup').val().split(',').join('\n'));
            }
        });
    });
});