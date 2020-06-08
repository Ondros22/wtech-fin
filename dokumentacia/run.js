$(document).ready(function(){
    $('#ulohy').hide();
    $('#kniznice').hide();
    $('input').on('click', function(){
        val = $('input:checked').val()
        if(val == "api"){
            $('#doku').show();
            $('#ulohy').hide();
            $('#kniznice').hide();
        }else if(val == "ulohy"){
            $('#doku').hide();
            $('#kniznice').hide();
            $('#ulohy').show();
        }else{
            $('#doku').hide();
            $('#ulohy').hide();
            $('#kniznice').show();
        }
        
    })
    $('#btn').on('click', function(e){
        e.preventDefault();
        if($('input:checked').val() == "api"){
            name = "dokumentacia";
            txt = $('#doku').html();
        }else if($('input:checked').val() == "ulohy"){
            name = "ulohy";
            txt = $('#ulohy').html();
        }else{
            name = "kniznice";
            txt = $('#kniznice').html();
        }
        var data = {
            "action": "docexp",
            "txt":convertString(txt),
            "name":name,
            "key":key
    };
    $.ajax({
        url: 'http://147.175.121.210:8233/final_zadanie/ajax.php?',
        type: 'POST',
        data: data,
    }).done(function (data, textStatus, request) {
        var blob = new Blob([data]);

        console.log(request.getAllResponseHeaders())
        var fileName = request.getResponseHeader('filename');

        if (window.navigator && window.navigator.msSaveOrOpenBlob) { // for IE
        window.navigator.msSaveOrOpenBlob(blob, fileName);
        } else {
        var url = window.URL.createObjectURL(blob);
        const a = document.createElement('a');
        a.style.display = 'none';
        a.href = url;
        a.download = fileName;
        document.body.appendChild(a);
        a.click();
        window.URL.revokeObjectURL(url);
        }
    });
    })
});

function convertString(phrase){

    var returnString = phrase
    returnString = returnString.replace(/ó/g, 'o');
    returnString = returnString.replace(/ž/g, 'z');
    returnString = returnString.replace(/ľ/g, 'l'); 
    returnString = returnString.replace(/á/g, 'a');
    returnString = returnString.replace(/č/g, 'c');
    returnString = returnString.replace(/ô/g, 'o');
    returnString = returnString.replace(/š/g, 's');
    returnString = returnString.replace(/Š/g, 'S');
    returnString = returnString.replace(/é/g, 'e');
    returnString = returnString.replace(/ú/g, 'u');
    returnString = returnString.replace(/Ú/g, 'U');
    returnString = returnString.replace(/ť/g, 't');  

    console.log(returnString);
    return(returnString);
}