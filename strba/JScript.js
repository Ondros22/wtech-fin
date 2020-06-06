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
            title:{
                text: "Aktuálna pozícia guličky N*x(:,1)"
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
            theme: "dark2", // "light1", "light2", "dark1", "dark2"
            zoomEnabled: true,
            title:{
                text: "Aktuálny náklon tyče x(:,3)"
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
                    url:"http://147.175.121.210:8233/final_zadanie/ajax.php?",
                    complete: async function(datta) {
                        
                        
                    console.log(datta);
                    var mid = 50;
                    var test = counter;

                        
                         const results = JSON.parse(datta);
                
                        var mid = 50;
                        var test = counter;

                        

                i=0;
                $SumX = 0;
                $SumY = 0;
                Object.keys(results).forEach(element => {
                    $MojFloat = results[element];
                    $MojFloat2 = $MojFloat.substr(2,9);
                    $MojFloat3 = parseFloat($MojFloat2);
                    $YpsilonSur = 0;
                    $Xsur =  $MojFloat3;
                    if(i<500){
                    $SumX += $MojFloat3;
                    
                    }
                    if(i<1000 && i>501){
                    $SumY += $MojFloat3;
                    
                    }
                    
                        $mojeR = 0; //dorobit

                        //-------Ypsilon Suradnica Gulicka--------------
                        if($mojeR >= 0){
                            if($mojeR <= 20){
                                $YpsilonSur = $MojFloat3 / 3;
                            }
                            else
                            {
                                $YpsilonSur = $MojFloat3 /2;
                            }
                        }
                        else{
                            if($mojeR >= -20){
                                $YpsilonSur = -$MojFloat3 / 3;
                            }
                            else
                            {
                                $YpsilonSur = -$MojFloat3 /2;
                            }
                        //$YpsilonSur = -$MojFloat3 / 3;
                        }
                        //---------X-----------------
                        if($mojeR <= $MojFloat3){
                        //$Xsur  = $MojFloat3;
                        }
                        else{
                       // $Xsur  = -$MojFloat3;
                        }
                    
                    
                   
                    i++;
                    //sleep(5);
                    //naplnenie prveho Chartu
                    if(i == 0){
                                chart.options.data[0].dataPoints = [{ y:$MojFloat3, x:0.05*(i%500) }];
                                chart.options.data[1].dataPoints = [{ y:$MojFloat3, x:0.05*(i%500), color:"red" }];
                                chart.render();
                            }else if(i<500){
                                $('#gulicka').css('transform','translateX('+$Xsur+'%)'+'translateY('+$YpsilonSur+'%)');

                                //$('#gulicka').css('transform','translateX('+$MojFloat3+'%)'+'translateY('+$MojFloat3+'%)');
                                
                                chart.options.data[0].dataPoints.push({ y:$MojFloat3, x:0.05*(i%500) });
                                chart.options.data[1].dataPoints.push({ y:$MojFloat3, x:0.05*(i%500), color:"red" });
                                chart.render();
                            
                        }
                     if(i==501){
                                //chart2.options.data[0].dataPoints =[({ y:$MojFloat3, x:0.05*(i%500) })];
                               // chart2.options.data[1].dataPoints=[({ y:$MojFloat3, x:0.05*(i%500), color:"red" })];
                                chart2.render();
                                //var pi = Math.PI;
                                //$degrees = $MojFloat3 * (180/pi);
                                //var degrees = $MojFloat3 * (57);
                                //console.log(degrees);
                                StupneZ = radians_to_degrees($MojFloat3);

                                $('#BEAM').css('transform','rotateZ('+$MojFloat3+'deg)');
                        }else if(i<1000 && i>501){
                                chart2.options.data[0].dataPoints.push({ y:$MojFloat3, x:0.05*(i%500) });
                                chart2.options.data[1].dataPoints.push({ y:$MojFloat3, x:0.05*(i%500), color:"red" });
                                //StupneZ = radians_to_degrees($MojFloat3);
                                //$('#BEAM').css('transform','rotateZ('+StupneZ+'deg)');
                                //$('#BEAM').css('transform','rotateZ('+$MojFloat3+'deg)'); 
                                chart2.render();
                            }
                    

                     sleep(speed);

                        
                    //console.log($_POST['parameter']);
                    //console.log($MojFloat3);
                    
                    //$('#pecko').append(`<li>${element} : ${results[element]}</li>`);
                } 

                );
              }
            })
              
             
        });
        
    });