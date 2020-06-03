<html>
    <head>
        <title>Swinging Pendulum Simulation</title>
        <style>
            #string{
                transition: 1050ms all linear;
                transform-origin: bottom center;
 
            }
            
            #grafy{
                width:100%;
                height:200px;
            }
            
            #chart1, #chart2 {
                width:50%;
                height:100%;
                float:left;
            }
            input,label{
                float:left;
                margin-right:15px;
            }

        </style>
        <script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>
        <script
        src="https://code.jquery.com/jquery-3.4.1.min.js"
        integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo="
        crossorigin="anonymous">
    </script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/skeleton/2.0.4/skeleton.css">
    </head>
    <body>
    <svg id="scene" viewBox="0 0 100 100" width="100%" height="200px">
        <line id="string" x1="50" y1="0" x2="50" y2="100" stroke="brown" stroke-width="4"/>
    </svg>
    <div id="grafy">
            <div id="chart1"></div>
            <div id="chart2"></div>
    </div>
    <form action="">
    <label for="angle">Uhol</label>
        <input type="number" name="angle" id="angle" min="-180" max="180" value="0">
        <label for="angle">Pozicia</label>
        <input type="number" name="position" id="position" min="-250" max="250" value="0">
        <label for="angle">Rychlost</label>
        <input type="range" min="0" max="1000" value="0" class="slider" id="myRange">
        <input type="submit" value="Start" id="btn">
        <label for="animacia">Animacia</label>
        <input type="checkbox" name="animacia" id="animacia" checked>
        <label for="graf">Graf</label>
        <input type="checkbox" name="graf" id="graf"checked>
    </form>
        <script>
            
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
            title:{
                text: "Graph r=0.2"
            },
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

        var chart2 = new CanvasJS.Chart("chart2", {
            animationEnabled: true,
            exportEnabled: true,
            theme: "light2", // "light1", "light2", "dark1", "dark2"
            zoomEnabled: true,
            title:{
                text: "Graph r=0.5"
            },
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
        chart2.render(); 

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
                    "r": 0.2
            };
              $.ajax({
                    type: "POST",
                    dataType: "json",
                    data: data,
                    url:"http://147.175.121.210:8233/final_zadanie/ajax.php?",
                    complete: async function(datta) {
                       console.log(datta);
                        var mid = 50;
                        var test = counter;
                        for (i = 0; i < datta.responseJSON.length; i++) {
                            if(test != counter) return;
                            console.log(parseFloat(datta.responseJSON[i][0]));
                            $('#string').css('transform','translateX('+parseFloat(datta.responseJSON[i][0])+'%)'+' rotateZ('+datta.responseJSON[i][1]+'deg)');
                            if(i == 0){
                                chart.options.data[0].dataPoints = [{ y:parseFloat(datta.responseJSON[i][0]), x:parseFloat(datta.responseJSON[i][2]) }];
                                chart.options.data[1].dataPoints = [{ y:parseFloat(datta.responseJSON[i][1]), x:parseFloat(datta.responseJSON[i][2]), color:"red" }];
                                chart.render();
                            }else if(i<201){
                                chart.options.data[0].dataPoints.push({ y:parseFloat(datta.responseJSON[i][0]), x:parseFloat(datta.responseJSON[i][2]) });
                                chart.options.data[1].dataPoints.push({ y:parseFloat(datta.responseJSON[i][1]), x:parseFloat(datta.responseJSON[i][2]), color:"red" });
                                chart.render();
                            }else if(i == 201){
                                chart2.options.data[0].dataPoints = [{ y:parseFloat(datta.responseJSON[i][0]), x:parseFloat(datta.responseJSON[i][2]) }];
                                chart2.options.data[1].dataPoints = [{ y:parseFloat(datta.responseJSON[i][1]), x:parseFloat(datta.responseJSON[i][2]), color:"red" }];
                                chart2.render();
                            }else{
                                chart2.options.data[0].dataPoints.push({ y:parseFloat(datta.responseJSON[i][0]), x:parseFloat(datta.responseJSON[i][2]) });
                                chart2.options.data[1].dataPoints.push({ y:parseFloat(datta.responseJSON[i][1]), x:parseFloat(datta.responseJSON[i][2]), color:"red" });
                                chart2.render();
                            }
                            await sleep(speed);
                        }
                    }
            });
        });
              
        </script>
    </body>
</html>