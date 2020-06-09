var chart;
$(document).ready(function(){
    
        chart = new CanvasJS.Chart("chart1", {
        animationEnabled: true,
        exportEnabled: true,
        theme: "light2", // "light1", "light2", "dark1", "dark2"
        zoomEnabled: true,
        
        axisX:{
            labelAngle: -50,
        },
        data: [{
            type: "pie", //change type to bar, line, area, pie, etc
            startAngle: 240,
        yValueFormatString: "##0",
        indexLabel: "{label} {y}",
        dataPoints: [],
        }]
    });
    
    var data = {
        "action": "statistika",
        "lang":lang,
        "key":key
};
    $.ajax({
        type: "POST",
        dataType: "json",
        data: data,
        url:"http://147.175.121.210:8233/final_zadanie/ajax.php?",
        complete: async function(datta) {
            chart.options.data[0].dataPoints = datta.responseJSON;
            chart.render(); 
        }
    });

    $('#mailForm').on('submit',function(e){
        e.preventDefault();
        var data = {
            "action": "mail",
            "to":$('#mail').val(),
            "data":JSON.stringify(chart.options.data[0].dataPoints),
            "key":key
    };
        $.ajax({
            type: "POST",
            dataType: "json",
            data: data,
            url:"http://147.175.121.210:8233/final_zadanie/ajax.php?",
            complete: async function(datta) {
                console.log(datta);
            }
        });
    });
});