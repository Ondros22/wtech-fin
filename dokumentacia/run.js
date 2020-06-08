$(document).ready(function(){
    $('#ulohy').hide();
    $('input').on('click', function(){
        val = $('input:checked').val()
        if(val == "api"){
            $('#doku').show();
            $('#ulohy').hide();
        }else if(val == "ulohy"){
            $('#doku').hide();
            $('#ulohy').show();
        }
        
    })
});