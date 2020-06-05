$(document).ready(function () {
    $(document).on('input','#graph',function () {
        $('#ch').toggle();
    });
    var ctx = document.getElementById('ch');
    var myChart = new Chart(ctx, {
        type: 'line',
        data:[],
        options: {
            responsive: false,
        }
    });
    $('#btn').click(function (event) {
        event.preventDefault();
        var data = {
            "action" : "tlmic",
            "x1":0,
            "x1d":0,
            "x2":0,
            "x2d":0,
            "r":0.1,
           // "key":key
        };
        $.ajax({
            type: "POST",
            dataType: "json",
            data: data,
            url:"http://147.175.121.210:8233/final_zadanie/ajax.php?",
            complete: async function(datas){
                console.log(datas);
            }
        })
    })
});
