$(document).ready(function () {
    $(document).on('input','#graph',function () {
        $('#chart1').toggle();
        $('#chart2').toggle();
    });

    var ctx = document.getElementById('chart1');
    var ctx2 = document.getElementById('chart2');

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
                label: 'Dolne teleso',
                data:[0],
                id: 'jedna',
                borderColor: "blue"
            },{
                label: 'Horne teleso',
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
                label: 'Tlmenie',
                data:[]
            }]},
        options: {
            maintainAspectRatio: false,

        }
    });

    function sleep(ms) {
        return new Promise(resolve => setTimeout(resolve, ms));
    }

    $('#btn').click(function (event) {
        var myChart2 = new Chart(ctx2,{
            type: 'line',
            data:{
                labels: [],
                datasets: [{
                    label: 'Dolne teleso',
                    borderWidth:1,
                    pointBorderWidth: 0,
                    pointRadius:0.5,
                    data:[0],
                    id: 'jedna',
                    backgroundColor: "rgba(0,0,255,0.4)",
                    fill: false,
                    borderColor: "blue"
                },{
                    label: 'Horne teleso',
                    data:[],
                    backgroundColor: "rgba(225,0,0,0.4)",
                    fill:false,
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
                    label: 'Tlmenie',
                    data:[]
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

        $.ajax({
            type: "POST",
            dataType: "json",
            data: data,
            url:"https://147.175.121.210:4497/skuska_spolu/moricz/ajax.php?",
            //url:"https://147.175.121.210:8233/final_zadanie/ajax.php?",
            complete: async function(dattas){
                console.log(dattas);
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

                    await sleep(100);
                }
            }
        })
    })
});
