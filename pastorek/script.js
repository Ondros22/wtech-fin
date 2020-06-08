var Airplane = (function () {
    var container, camera, renderer, scene;
    var source;
    var body, stabilizator;
    var animation, graph;
    var run, tilt1, tilt2, curTime, maxTime, speed;
    var trace1, trace2, layout, config;

    $(document).ready(function() {
        window.addEventListener("resize", Airplane.onWindowResize);
        document.getElementById("speed").oninput = function () {
            Airplane.speed = $(this).val()*10;
            document.getElementById("speedDisplay").innerHTML = this.value + "/10";
        };
        initAnimation();
        initGraph();
    });

    function setBodyRotation(angle) {
        body.rotation.z = angle;
        renderer.render(scene, camera);
    }

    function setStabilizatorRotation(angle) {
        stabilizator.rotation.z = angle;
        renderer.render(scene, camera);
    }

    function initAnimation() {
        container = document.getElementById("animation");
        scene = new THREE.Scene();

        const fov = 35;
        const aspect = container.clientWidth / container.clientHeight;
        const near = 0.1;
        const far = 1000;

        camera = new THREE.PerspectiveCamera(fov, aspect, near, far);
        camera.position.set(0, 0, 7);

        const light = new THREE.DirectionalLight(0xffffff, 2);
        light.position.set(50, 50, 100);
        scene.add(light);

        renderer = new THREE.WebGLRenderer({ antialias: true, alpha: true });
        renderer.setSize(container.clientWidth, container.clientHeight);
        renderer.setPixelRatio(window.devicePixelRatio);

        container.appendChild(renderer.domElement);

        let loader = new THREE.GLTFLoader();
        loader.load("./airplane/airplane.gltf", function (gltf) {
            scene.add(gltf.scene);
            body = gltf.scene.children[0];
            stabilizator = gltf.scene.children[0].children[0];
            renderer.render(scene, camera);
        });
    }

    function initGraph() {
        graph = document.getElementById("graph");

        trace1 = {
            type: 'scatter',
            mode: 'lines',
            name: 'Body'
        };

        trace2 = {
            type: 'scatter',
            mode: 'lines',
            name: 'Stabilizator'
        };

        layout = {
            showlegend: true,
            yaxis: {
                //range: [0, 1.5]
            },
            xaxis: {
                //range: [0, 41]
            }
        };

        config = {
            staticPlot: true
        }

        graphReset();
    }

    function animationReset() {
        if (body) setBodyRotation(0);
        if (stabilizator) setStabilizatorRotation(0);
    }

    function graphReset() {
        run = 1;
        tilt1 = "";
        tilt2 = "";
        curTime = 0;
        maxTime = 0;

        trace1.x = [];
        trace1.y = [];
        trace2.x = [];
        trace2.y = [];

        Plotly.newPlot(graph, [trace1, trace2], layout, config);
    }

    function connectionReset() {
        if (source != undefined) source.close();
    }

    function elementsReset() {
        document.getElementById("animationCheck").checked = true;
        document.getElementById("graphCheck").checked = true;
        $("#resetButton").prop("disabled", true);
        $("#calculateButton").prop("disabled", false);
    }

    function initConnection() {
        $("#resetButton").prop("disabled", false);
        $("#calculateButton").prop("disabled", true);

        var tilt = $('#tilt').val();
        if(run == 1) {
            tilt1 = tilt;
            tilt2 = tilt;
        }
        else {
            tilt1 = tilt2;
            tilt2 = tilt;
        }

        var data = {
            "action": "lietadlo",
            "naklon1": tilt1,
            "naklon2": tilt2,
            "key": key
        };        
        $.ajax({
            type: "POST",
            dataType: "json",
            data: data,
            url: "http://147.175.121.210:8223/finale/ajax.php?",
            complete: Airplane.setData
        });
    }

    function sleep(ms) {
        return new Promise(resolve => setTimeout(resolve, ms));
    }

    return {
        initAnimation: initAnimation,
        initConnection: initConnection,
        initGraph: initGraph,
        onWindowResize: function () {
            camera.aspect = container.clientWidth / container.clientHeight;
            camera.updateProjectionMatrix();
            renderer.setSize(container.clientWidth, container.clientHeight);
        },
        animationChange: function (element) {
            animation = element.checked;
            if (animation) document.getElementById("animation").style.display = "block";
            else document.getElementById("animation").style.display = "none";
        },
        graphChange: function (element) {
            graph = element.checked;
            if (graph) document.getElementById("graph").style.display = "block";
            else document.getElementById("graph").style.display = "none";
        },
        reset: function () {
            animationReset();
            graphReset();
            connectionReset();
            elementsReset();
        },
        setData: async function (data) {
            console.log(data);
            for (i = 0; i < data.responseJSON.length; i++) {
                var time, x, y;
                time = parseFloat(data.responseJSON[i][0]);
                if(isNaN(time)) break;
                if (run == 1) {
                    x = parseFloat(data.responseJSON[i][1]);
                    y = parseFloat(data.responseJSON[i][2]);
                }
                else {
                    x = parseFloat(data.responseJSON[i][3]);
                    y = parseFloat(data.responseJSON[i][4]);
                }

                curTime = maxTime + time;
                Plotly.extendTraces(graph, {
                    x: [[time + maxTime], [time + maxTime]],
                    y: [[x], [y]]
                }, [0, 1]);

                setBodyRotation(y);
                setStabilizatorRotation(-x);

                await sleep(Airplane.speed);
            }

            run++;
            maxTime = curTime;
            $("#calculateButton").prop("disabled", false);
        }
    }
})();