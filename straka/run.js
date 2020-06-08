$(document).ready(function(){
    var speed = 0;
    var counter = 0;
    $(document).on('input', '#myRange', function() {
        $('#string').css('transition', (parseInt($(this).val()+5))+"ms all linear");
        speed = $(this).val();
    });

    $(document).on('input', '#graf', function() {
        $('#grafy').toggle();
    });

    $(document).on('input', '#animacia', function() {
        $('#scene').toggle();
    });

    var chart = new CanvasJS.Chart("chart1", {
        animationEnabled: true,
        exportEnabled: true,
        theme: "light2", // "light1", "light2", "dark1", "dark2"
        zoomEnabled: true,
        
        axisX:{
            labelAngle: -50,
        },
        data: [{
            type: "line", //change type to bar, line, area, pie, etc
            //indexLabel: "{y}", //Shows y value on all Data Points
            indexLabelFontColor: "#5A5757",
            indexLabelPlacement: "outside",
            lineColor: "#5A5757",   
            dataPoints: [{x:0,y:0}]
        },{
            type: "line", //change type to bar, line, area, pie, etc
            //indexLabel: "{y}", //Shows y value on all Data Points
            indexLabelFontColor: "#DC143C",
            indexLabelPlacement: "outside",
            lineColor: "#DC143C",   
            dataPoints: [{x:0,y:0}]
        }]
    });


    chart.render(); 

    function sleep(ms) {
        return new Promise(resolve => setTimeout(resolve, ms));
    }
    
    $('#btn').click(function(event){
        event.preventDefault();
        counter++;
        var data = {
                "action": "kyvadlo",
                "uhol": $('#angle').val(),
                "position":(parseInt($('#position').val())),
                "r": (parseFloat($('#r').val())),
                "key":key
        };
            $.ajax({
                type: "POST",
                dataType: "json",
                data: data,
                url:"/final_zadanie/ajax.php?",
                complete: async function(datta) {
                    console.log(datta);
                    var mid = 50;
                    var test = counter;
                    for (i = 0; i < datta.responseJSON.length; i++) {
                        if(test != counter) return;
                        $('#string').css('transform','translateX('+parseFloat(datta.responseJSON[i][0])+'%)'+' rotateZ('+datta.responseJSON[i][1]+'deg)');
                        if(i == 0){
                            chart.options.data[0].dataPoints = [{ y:parseFloat(datta.responseJSON[i][0]), x:parseFloat(datta.responseJSON[i][2]) }];
                            chart.options.data[1].dataPoints = [{ y:parseFloat(datta.responseJSON[i][1]), x:parseFloat(datta.responseJSON[i][2]), color:"red" }];
                            chart.render();
                        }else{
                            chart.options.data[0].dataPoints.push({ y:parseFloat(datta.responseJSON[i][0]), x:parseFloat(datta.responseJSON[i][2]) });
                            chart.options.data[1].dataPoints.push({ y:parseFloat(datta.responseJSON[i][1]), x:parseFloat(datta.responseJSON[i][2]), color:"red" });
                            chart.render();
                        }
                        await sleep(speed);
                    }
                    $('#angle').val(parseFloat(datta.responseJSON[i-3][1]));
                    $('#position').val(parseFloat(datta.responseJSON[i-3][0]));
                    console.log(datta.responseJSON[i-3]);
                }
        });
    });
});