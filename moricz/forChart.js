$(document).ready(function (keyframes, options) {
    $(document).on('input','#graph',function () {
        $('#chart1').toggle();
        $('#chart2').toggle();
    });

    $(document).on('input','#suspensionAnime',function () {
        $('#anime').toggle();
    });

    var ctx = document.getElementById('chart1');
    var ctx2 = document.getElementById('chart2');

    var wheel = new fabric.Circle({
        left: 114,
        top: 100,
        radius:25,
        fill:'silver'
    });

    var suspension = new fabric.Rect({
        left: 135,
        top: 50,
        width: 10,
        height: 70,
        fill:'black'
    });
    suspension.set('selectable',false);
    wheel.set('selectable',false);
    var canvasAnimation = new fabric.Canvas('animation');
    canvasAnimation.add(suspension,wheel);


    function addData(chart, data,label) {
        chart.data.labels.push(label);
        chart.data.datasets.forEach((dataset) => {
            dataset.data.push(data);
        });
        chart.update();
    }

    function addData2(chart, data1,data2,label) {
        chart.data.labels.push(label);
        chart.data.datasets[1].data.push(data1);
        chart.data.datasets[0].data.push(data2);
        chart.update();
    }

    var myChart2 = new Chart(ctx2,{
        type: 'line',
        data:{
            labels: [],
            datasets: [{
                label: $('#lowerko').val(),
                data:[0],
                id: 'jedna',
                borderColor: "blue"
            },{
                label: $('#upperko').val(),
                data:[],
                backgroundColor: "rgba(225,0,0,0.4)",
                fill:false,
                borderColor: "red",
                id: 'dva'
            }]},
        options: {
            maintainAspectRatio: false,
        }
    });

    var myChart = new Chart(ctx, {
        type: 'line',
        data:{
            datasets: [{
                label: $('#suspi').val(),
                data:[],
                borderColor: "black",
                backgroundColor:"rgba(0,0,0,0.4)",
                fill:false
            }]},
        options: {
            maintainAspectRatio: false,

        }
    });

    function sleep(ms) {
        return new Promise(resolve => setTimeout(resolve, ms));
    }

    function validateR(){
        var x = document.forms["myForm"]["r"].value;
        if (x < -0.5 || x > 0.5){
            document.getElementById('error').style.visibility="visible";
            return false;
        }else {
            document.getElementById('error').style.visibility="hidden";
            return true;
        }
    }

//////////////////////////////////////////////////////////////ajax
    $('#btn').click(function (event) {
        var myChart2 = new Chart(ctx2,{
            type: 'line',
            data:{
                labels: [],
                datasets: [{
                    label: $('#lowerko').val(),
                    borderWidth:1,
                    pointBorderWidth: 0,
                    pointRadius:1,
                    data:[0],
                    id: 'jedna',
                    backgroundColor: "rgba(0,0,255,0.4)",
                    fill: false,
                    borderColor: "blue"
                },{
                    label: $('#upperko').val(),
                    data:[],
                    backgroundColor: "rgba(225,0,0,0.4)",
                    fill:false,
                    pointRadius:1,
                    borderColor: "red",
                    id: 'dva'
                }]},
            options: {
                maintainAspectRatio: false,
            },
        });

        var myChart = new Chart(ctx, {
            type: 'line',
            data:{
                datasets: [{
                    label: $('#suspi').val(),
                    data:[],
                    borderColor: "black",
                    backgroundColor:"rgba(0,0,0,0.4)",
                    pointRadius:1,
                    fill:false
                }]},
            options: {
                maintainAspectRatio: false,
            }
        });
        event.preventDefault();

        var data = {
            "action" : "tlmic",
            "x1":parseInt($('#x1').val()),
            "x1d":parseInt($('#x1d').val()),
            "x2":parseInt($('#x2').val()),
            "x2d":parseInt($('#x2d').val()),
            "r":parseFloat($('#rSize').val()),
            "key": "brutalny_api_kluc_123"
        };
        if (validateR()){
        $.ajax({
            type: "POST",
            dataType: "json",
            data: data,
            //url:"https://147.175.121.210:4497/skuska_spolu/moricz/ajax.php?",
            url:"/final_zadanie/ajax.php?",
            complete: async function(dattas){
                console.log(dattas);
                var jj=0;
                for (i=0;i<dattas.responseJSON.length;i++){
                    console.log("1 udaj: "+dattas.responseJSON[i][0]);
                    console.log("2 udaj: "+dattas.responseJSON[i][1]);
                    console.log("3 udaj: "+dattas.responseJSON[i][2]);
                    console.log(" ");

                    if (dattas.responseJSON[i][0] === undefined){
                        break;
                    }

                    addData(myChart,parseFloat(dattas.responseJSON[i][1]),dattas.responseJSON[i][2]);
                    addData2(myChart2,parseFloat(dattas.responseJSON[i][1]),parseFloat(dattas.responseJSON[i][0]),dattas.responseJSON[i][2]);

                    var posi =parseFloat(dattas.responseJSON[i][1]);

                    suspension.set('top',50+(-1*posi*4000));
                    wheel.set('top',100+(-1*posi*3000));
                    canvasAnimation.renderAll();
                    await sleep(100);
                }
            }
        })
        }
    })
});