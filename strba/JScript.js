$(document).ready(function(){
    var speed = 0;
    var counter = 0;
    
            $(document).on('input', '#myRange', function() {
                $('#gulicka').css('transition', (parseInt($(this).val()+5))+"ms all linear");
                $('#BEAM').css('transition', (parseInt($(this).val()+5))+"ms all linear");
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
                theme: "dark2", // "light1", "light2", "dark1", "dark2"
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
    
            var chart2 = new CanvasJS.Chart("chart2", {
                animationEnabled: true,
                exportEnabled: true,
                theme: "dark2", // "light1", "light2", "dark1", "dark2"
                zoomEnabled: true,
            
                axisX:{
                    labelAngle: -50,
                },
                data: [{
                    type: "line", //change type to bar, line, area, pie, etc
                    //indexLabel: "{y}", //Shows y value on all Data Points
                indexLabelFontColor: "#ADFF2F",
                    indexLabelPlacement: "outside",
                lineColor: "#ADFF2F",   
                    dataPoints: [{x:0,y:0}]
                },{
                    type: "line", //change type to bar, line, area, pie, etc
                    //indexLabel: "{y}", //Shows y value on all Data Points
                indexLabelFontColor: "#ADFF2F",
                    indexLabelPlacement: "outside",
                lineColor: "#ADFF2F",   
                    dataPoints: [{x:0,y:0}]
                }]
            });
        
        
            
            
    
            chart.render();
            chart2.render(); 
                //--------------------------------------funckie----------------------------------------------
            function sleep(ms) {
                return new Promise(resolve => setTimeout(resolve, ms));
            }
            
            function radians_to_degrees(radians)
            {
            var pi = Math.PI;
            return radians * (180/pi);
            }
    
            
            
            //--------------------------kliknutie na button--------------------------------------
            $('#btn').click(function(event){
                event.preventDefault();
                counter++;
                var data = {
                        "action": "gulicka",
                        "rychlost": (parseInt($('#rychlost').val())),
                        "zrychlenie":(parseInt($('#zrychlenie').val())),
                        "r":(parseFloat($('#r').val())),
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
                               // $('#BEAM').css('transform',' rotateZ('+datta.responseJSON[i][1]+'deg)');
                               // $('#gulicka').css('transform','translateX('+parseFloat(datta.responseJSON[i][0])+'%)'+'translateY('+parseFloat(datta.responseJSON[i][0])+'%)');
                                if(i == 0){
                                    chart.options.data[0].dataPoints = [{ y:parseFloat(datta.responseJSON[i][0]), x:parseFloat(datta.responseJSON[i][2]), color:"blue" }];
                                    chart.options.data[1].dataPoints = [{ y:parseFloat(datta.responseJSON[i][0]), x:parseFloat(datta.responseJSON[i][2]), color:"red" }];
    
                                    chart2.options.data[0].dataPoints = [{ y:parseFloat(datta.responseJSON[i][1]), x:parseFloat(datta.responseJSON[i][2]), color:"blue" }];
                                    chart2.options.data[1].dataPoints = [{ y:parseFloat(datta.responseJSON[i][1]), x:parseFloat(datta.responseJSON[i][2]), color:"red" }];
                                    //$('#BEAM').css('transform','rotateZ('+datta.responseJSON[i][0]+'deg)');
                                    chart.render();
                                    chart2.render();
                                }else if(i<500){
                                    chart.options.data[0].dataPoints.push({ y:parseFloat(datta.responseJSON[i][0]), x:parseFloat(datta.responseJSON[i][2]), color:"blue" });
                                    chart.options.data[1].dataPoints.push({ y:parseFloat(datta.responseJSON[i][0]), x:parseFloat(datta.responseJSON[i][2]), color:"red" });
                                    $('#BEAM').css('transform','rotateZ('+datta.responseJSON[i][0]+'deg)');
                                    
                                    chart2.options.data[0].dataPoints.push({ y:parseFloat(datta.responseJSON[i][1]), x:parseFloat(datta.responseJSON[i][2]), color:"blue" });
                                    chart2.options.data[1].dataPoints.push({ y:parseFloat(datta.responseJSON[i][1]), x:parseFloat(datta.responseJSON[i][2]), color:"red" });
    
                                    if(data.r<11 && data.r>=0){
                                    $Y = parseFloat(datta.responseJSON[i][0]) / 3;
                                    }
                                    else if(data.r>=11)
                                    {
                                        $Y = parseFloat(datta.responseJSON[i][0]) / 2;  
                                    }
                                    else if(data.r<0 && data.r>= -11)
                                    {
                                        $Y = parseFloat(datta.responseJSON[i][0]) / 3;
                                        $Y = -$Y;
                                    }
                                    else if(data.r<= -12)
                                    {
                                        $Y = parseFloat(datta.responseJSON[i][0]) / 2;
                                        $Y = -$Y;
                                    }
                                    $('#gulicka').css('transform','translateX('+parseFloat(datta.responseJSON[i][0])+'%)'+'translateY('+$Y+'%)');
                                    chart.render();
                                    chart2.render();
                                }
                                await sleep(speed);
                            }
                            
                            
                        //console.log($_POST['parameter']);
                        //console.log($MojFloat3);
                        
                        //$('#pecko').append(`<li>${element} : ${results[element]}</li>`);
                    
    
                    
                  }
                })
                  
                 
            });
            
        });