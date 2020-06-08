
<?php
    if($_GET['lang'] == 'SK') require_once "./lang/lang_sk.php";
    else require_once "./lang/lang_en.php";

    //$apiKey = "brutalny_api_kluc_123";
    require_once "../conf.php";
?>

<html><head>
        <title>Strba - Gulička na tyči</title> 
        <style>
            #string{
                transition: 1050ms all linear; 
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
        <script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous">
    </script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/skeleton/2.0.4/skeleton.css">

    <script>
            var key ="<?php echo $apiKey?>";
    </script>
    <script src="JScript.js"></script>


    </head>
    <body>

    <div id="nav" class="u-full-width">
        <div id = "left">
            <a href="http://147.175.121.210:8233/final_zadanie/?lang=<?php echo $_GET['lang']?>"><button><?php echo DOMOV?></button></a>
        </div>
        <div id="right">
            <a href="http://147.175.121.210:8233/final_zadanie/strba/?lang=SK"><button>SK</button></a>
            <a href="http://147.175.121.210:8233/final_zadanie/strba/?lang=EN"><button>EN</button></a>
        </div>
    </div>


    <svg id="scene" viewBox="0 0 100 100" width="100%" height="200px">
        
        <line id="string" x1="0" y1="100" x2="0" y2="70" stroke="black" stroke-width="4" ></line>
        <line id="BEAM" x1="-40" y1="70" x2="40" y2="70" stroke="grey" stroke-width="4" style="transform-origin : 0px 70px"></line>
        <circle id="gulicka" cx="0" cy="64" r="3" stroke="black" stroke-width="1" fill="red" style="transform-origin :  0px 64px" />
            
       
    </svg>
    <div id="grafy">
            <div id="chart1"></div>
            <div id="chart2"></div>
    </div>

    
    


    <form action="">
        
        <label for="r">Zadajte r(nová poloha Guličky [-25,25])</label>
        <input type="number" min="-25" max="25" name="r" id="r" value = 0>

        <label for="rychlost">Rychlost</label>
        <input type="number" min="0" max="1" name="rychlost" id="rychlost" value = 0>

        <label for="zrychlenie">Zrychlenie</label>
        <input type="number" min="0" max="1" name="zrychlenie" id="zrychlenie" value = 0>
        

        <label for="angle">Spomalenie animácie</label>
        <input type="range" min="0" max="1000" value="0" class="slider" id="myRange">
        

        <label for="animacia">Animacia</label>
        <input type="checkbox" name="animacia" id="animacia" checked="">
        <label for="graf">Graf</label>
        <input type="checkbox" name="graf" id="graf" checked="">

        <input type="submit" value="Start" id="btn" name="btn">
    </form>
    
        <span style="position: absolute; left: 0px; top: -20000px; padding: 0px; margin: 0px; border: none; white-space: pre; line-height: normal; font-family:  Helvetica, sans-serif; font-size: 10px; font-weight: normal; display: none;">Mpgyi</span>
    
</body></html>

