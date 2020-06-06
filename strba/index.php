
<?php
    if($_GET['lang'] == 'SK') require_once "./lang/lang_sk.php";
    else require_once "./lang/lang_en.php";

    $apiKey = "brutalny_api_kluc_123";
    
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
        <circle id="gulicka" cx="0" cy="64" r="3" stroke="black" stroke-width="1" fill="red" style="transform-origin :  0px 64px" /><!-- style="transform: translateX(0.49994%) rotateZ(1.5106e-05deg); transition: all 5ms linear 0s;" -->
            
        <!-- <circle id="gulicka" cx="<?php if(isset($_POST['name'])){echo $_POST['name'];}else{echo '0';}?> " cy="64" r="3" stroke="black" stroke-width="1" fill="red" style="transform-origin : <?php //if(isset($_POST['name'])){echo $_POST['name'];}else{echo '0';}?> 64px" /> -->
    </svg>
    <div id="grafy">
            <div id="chart1"><div class="canvasjs-chart-container" style="position: relative; text-align: left; cursor: auto;"><canvas class="canvasjs-chart-canvas" width="539" height="200" style="position: absolute; user-select: none;"></canvas><canvas class="canvasjs-chart-canvas" width="539" height="200" style="position: absolute; -webkit-tap-highlight-color: transparent; user-select: none; cursor: default;"></canvas><div class="canvasjs-chart-toolbar" style="position: absolute; right: 1px; top: 1px; border: 1px solid transparent;"><button state="pan" type="button" title="Pan" style="display: none; background-color: white; color: black; border-top: none; border-right: 1px solid rgb(33, 150, 243); border-bottom: none; border-left: none; border-image: initial; user-select: none; padding: 5px 12px; cursor: pointer; float: left; width: 40px; height: 25px; outline: 0px; vertical-align: baseline; line-height: 0;"><img style="height:95%; pointer-events: none;" src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAB4AAAAeCAYAAAA7MK6iAAAAIGNIUk0AAHolAACAgwAA+f8AAIDpAAB1MAAA6mAAADqYAAAXb5JfxUYAAAAJcEhZcwAADsMAAA7DAcdvqGQAAAICSURBVEhLxZbPahNRGMUn/5MpuAiBEAIufQGfzr5E40YptBXajYzudCEuGqS+gGlrFwquDGRTutBdYfydzJ3LzeQmJGZue+Dw/Z17Mnfmu5Pof9Hr9Z61Wq0bWZMKj263O6xWq99wU9lOpzPMKgEhEcRucNOcioOK+0RzBhNvt9tPV4nmVF19+OWhVqt9xXgFXZq+8lCv119UKpUJ7iX2FmvFTKz8RH34YdBsNk8wVtjE4fGYwm8wrrDi3WBG5oKXZGRSS9hGuNFojLTe2lFz5xThWZIktayyiE2FdT3rzXBXz7krKiL8c17wAKFDjCus2AvW+YGZ9y2JF0VFRuMPfI//rsCE/C+s26s4gQu9ul7r4NteKx7H8XOC724xNNGbaNu++IrBqbOV7Tj3FgMRvc/YKOr3+3sE47wgEt/Bl/gaK5cHbNU11vYSXylfpK7XOvjuumPp4Wcoipu30Qsez2uMXYz4lfI+mOmwothY+SLiXJy7mKVpWs3Si0CoOMfeI9Od43Wic+jO+ZVv+crsm9QSNhUW9LXSeoPBYLXopthGuFQgdIxxhY+UDwlt1x5CZ1hX+NTUdt/OIvjKaDSmuOJfaIVNPKX+W18j/PLA2/kR44p5Sd8HbHngT/yTfNRWUXX14ZcL3wmX0+TLf8YO7CGT8yFE5zB3/gney25/OETRP9CtPDFe5jShAAAAAElFTkSuQmCC" alt="Pan"></button><button state="reset" type="button" title="Reset" style="display: none; background-color: white; color: black; border-top: none; border-right: 1px solid rgb(33, 150, 243); border-bottom: none; border-left: none; border-image: initial; user-select: none; padding: 5px 12px; cursor: pointer; float: left; width: 40px; height: 25px; outline: 0px; vertical-align: baseline; line-height: 0;"><img style="height:95%; pointer-events: none;" src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAACIAAAAeCAYAAABJ/8wUAAAAIGNIUk0AAHolAACAgwAA+f8AAIDpAAB1MAAA6mAAADqYAAAXb5JfxUYAAAAJcEhZcwAADsMAAA7DAcdvqGQAAAPjSURBVFhHxVdJaFNRFP1J/jwkP5MxsbaC1WJEglSxOFAXIsFpVRE3ggi1K90obioRRBA33XXnQnciirhQcMCdorgQxBkXWlREkFKsWkv5npvckp/XnzRpKh64kLw733fffe9L/wrL0+mVUdO8uTSZ3MBL/we2qg4rkuSpodCELstXE46ziVkLQ6FQcGOmeSSq6wd4aV50d3drWjj8kQKZJTUc9kxFGenv79dZrDksTSTWWJp2QYtEPiErysyzdX0LsxsCQR8keX8gs6RHIk8ysdgKFg2G53mhuOPsshTlBjKaFo1g7SqLNoShKLdFXT8huQ/paLSbxatYnc2mHMM4hr18Vi8TIvCmXF3vYrW6cF23gGTOk0M1wA4RKvOmq6vLZRVJipvmSWT6tZ6CSEYkco5V50VPT4+D7RwOqi6RiSZm0fJ+vggSqkeoypdsNmuyelNwbXsbgvkWYMtzDWNvWaijoyOBqE+hVK8abcssUeXQ/YfKyi0gFYv1Ipgfoj34fYGTJLOYJA0ODirok32GLN8XhUWCwSes1hIwBg6LydJ/tEeRRapAdUp+wSAiZchtZZWWgAZ+JNpD8peYXQVK9UwUxNpzOK8pq97kURZhYTCKBwPD7h2zK+js7Myi7D8Fod+0TkMI8+EMAngLGc/WtBFWawkFHFnoj/t9KLgGmF0B3QfkxC+EarxkdhnFYlFLY06USqUwL7UMjICHfh/wOc2sCqhpxGbCkLvL7EUDbF73+6DkmVWB6zi7xUDQSLeYvWjAILvm9zEnkJhlbRcDQZcv6Kg2AipyT/Axw6wKlqVSqxDdjF8Izfod13qURdrG/nxehY+xGh+h0CSzKygGvSNQIcc097BI24jb9hax6kj2E7OrMFX1il+ICEf2NrPbhiXLl+fYl+U7zK4iYdsDcyLGf+ofFlkwcN+s10KhmpuYhhtm0hCLVIFL0MDsqNlDIqy9x2CLs1jL6OvrI7vPRbtohXG6eFmsFnHDGAp6n9AgyuVySRZrGvROxRgIfLXhzjrNYnNBUxNX/dMgRWT1mt4XLDovaApD53E9W3ilNX5M55LJHpRtIsgAvciR4WWcgK2Dvb1YqgXevmF8z2zEBTcKG39EfSKsT9EbhVUaI2FZO+oZIqImxol6j66/hcAu4sSN4vc1ZPoKeoE6RGhYL2YYA+ymOSSi0Z0wWntbtkGUWCvfSDXIxONraZ/FY90KUfNTpfC5spnNLgxoYNnR9RO4F8ofXEHOgogCQE99w+fF2Xw+b7O59rEOsyRqGEfpVoaDMQQ1CZrG46bcM6AZ0C/wPqNfHliqejyTySxh9TqQpL+xmbIlkB9SlAAAAABJRU5ErkJggg==" alt="Reset"></button><button state="menu" type="button" title="More Options" style="background-color: white; color: black; border: none; user-select: none; padding: 5px 12px; cursor: pointer; float: left; width: 40px; height: 25px; outline: 0px; vertical-align: baseline; line-height: 0; display: inline;"><img style="height: 95%; pointer-events: none; filter: invert(0%);" src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAACQAAAAeCAYAAABE4bxTAAAAIGNIUk0AAHolAACAgwAA+f8AAIDpAAB1MAAA6mAAADqYAAAXb5JfxUYAAAAJcEhZcwAADsMAAA7DAcdvqGQAAADoSURBVFhH7dc9CsJAFATgRxIIBCwCqZKATX5sbawsY2MvWOtF9AB6AU8gguAJbD2AnZ2VXQT/Ko2TYGCL2OYtYQc+BuYA+1hCtnCVwMm27SGaXpDJIAiCvCkVR05hGOZNN3HkFMdx3nQRR06+76/R1IcFLJlNQEWlmWlBTwJtKLKHynehZqnjOGM0PYWRVXk61C37p7xlZ3Hk5HneCk1dmMH811xGoKLSzDiQwIBZB4ocoPJdqNkDt2yKlueWRVGUtzy3rPwo3sWRU3nLjuLI6OO67oZM00wMw3hrmpZx0XU9syxrR0T0BeMpb9dneSR2AAAAAElFTkSuQmCC" alt="More Options"></button><div tabindex="-1" style="position: absolute; user-select: none; cursor: pointer; right: 0px; top: 25px; min-width: 120px; outline: 0px; font-size: 14px; font-family: Arial, Helvetica, sans-serif; padding: 5px 0px; text-align: left; line-height: 10px; background-color: white; box-shadow: rgb(136, 136, 136) 2px 2px 10px; display: none;"><div style="padding: 12px 8px; background-color: white; color: black;">Print</div><div style="padding: 12px 8px; background-color: white; color: black;">Save as JPEG</div><div style="padding: 12px 8px; background-color: white; color: black;">Save as PNG</div></div></div><div class="canvasjs-chart-tooltip" style="position: absolute; height: auto; box-shadow: rgba(0, 0, 0, 0.1) 1px 1px 2px 2px; z-index: 1000; pointer-events: none; display: none; border-radius: 5px;"><div style=" width: auto;height: auto;min-width: 50px;line-height: auto;margin: 0px 0px 0px 0px;padding: 5px;font-family: Calibri, Arial, Georgia, serif;font-weight: normal;font-style: italic;font-size: 14px;color: #000000;text-shadow: 1px 1px 1px rgba(0, 0, 0, 0.1);text-align: left;border: 2px solid gray;background: rgba(255,255,255,.9);text-indent: 0px;white-space: nowrap;border-radius: 5px;-moz-user-select:none;-khtml-user-select: none;-webkit-user-select: none;-ms-user-select: none;user-select: none;} "> Sample Tooltip</div></div><a class="canvasjs-chart-credit" title="JavaScript Charts" style="outline:none;margin:0px;position:absolute;right:2px;top:186px;color:dimgrey;text-decoration:none;font-size:11px;font-family: Calibri, Lucida Grande, Lucida Sans Unicode, Arial, sans-serif" tabindex="-1" target="_blank" href="https://canvasjs.com/">CanvasJS.com</a></div></div>
            <div id="chart2"><div class="canvasjs-chart-container" style="position: relative; text-align: left; cursor: auto;"><canvas class="canvasjs-chart-canvas" width="539" height="200" style="position: absolute; user-select: none;"></canvas><canvas class="canvasjs-chart-canvas" width="539" height="200" style="position: absolute; -webkit-tap-highlight-color: transparent; user-select: none; cursor: default;"></canvas><div class="canvasjs-chart-toolbar" style="position: absolute; right: 1px; top: 1px; border: 1px solid transparent;"><button state="pan" type="button" title="Pan" style="display: none; background-color: white; color: black; border-top: none; border-right: 1px solid rgb(33, 150, 243); border-bottom: none; border-left: none; border-image: initial; user-select: none; padding: 5px 12px; cursor: pointer; float: left; width: 40px; height: 25px; outline: 0px; vertical-align: baseline; line-height: 0;"><img style="height:95%; pointer-events: none;" src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAB4AAAAeCAYAAAA7MK6iAAAAIGNIUk0AAHolAACAgwAA+f8AAIDpAAB1MAAA6mAAADqYAAAXb5JfxUYAAAAJcEhZcwAADsMAAA7DAcdvqGQAAAICSURBVEhLxZbPahNRGMUn/5MpuAiBEAIufQGfzr5E40YptBXajYzudCEuGqS+gGlrFwquDGRTutBdYfydzJ3LzeQmJGZue+Dw/Z17Mnfmu5Pof9Hr9Z61Wq0bWZMKj263O6xWq99wU9lOpzPMKgEhEcRucNOcioOK+0RzBhNvt9tPV4nmVF19+OWhVqt9xXgFXZq+8lCv119UKpUJ7iX2FmvFTKz8RH34YdBsNk8wVtjE4fGYwm8wrrDi3WBG5oKXZGRSS9hGuNFojLTe2lFz5xThWZIktayyiE2FdT3rzXBXz7krKiL8c17wAKFDjCus2AvW+YGZ9y2JF0VFRuMPfI//rsCE/C+s26s4gQu9ul7r4NteKx7H8XOC724xNNGbaNu++IrBqbOV7Tj3FgMRvc/YKOr3+3sE47wgEt/Bl/gaK5cHbNU11vYSXylfpK7XOvjuumPp4Wcoipu30Qsez2uMXYz4lfI+mOmwothY+SLiXJy7mKVpWs3Si0CoOMfeI9Od43Wic+jO+ZVv+crsm9QSNhUW9LXSeoPBYLXopthGuFQgdIxxhY+UDwlt1x5CZ1hX+NTUdt/OIvjKaDSmuOJfaIVNPKX+W18j/PLA2/kR44p5Sd8HbHngT/yTfNRWUXX14ZcL3wmX0+TLf8YO7CGT8yFE5zB3/gney25/OETRP9CtPDFe5jShAAAAAElFTkSuQmCC" alt="Pan"></button><button state="reset" type="button" title="Reset" style="display: none; background-color: white; color: black; border-top: none; border-right: 1px solid rgb(33, 150, 243); border-bottom: none; border-left: none; border-image: initial; user-select: none; padding: 5px 12px; cursor: pointer; float: left; width: 40px; height: 25px; outline: 0px; vertical-align: baseline; line-height: 0;"><img style="height:95%; pointer-events: none;" src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAACIAAAAeCAYAAABJ/8wUAAAAIGNIUk0AAHolAACAgwAA+f8AAIDpAAB1MAAA6mAAADqYAAAXb5JfxUYAAAAJcEhZcwAADsMAAA7DAcdvqGQAAAPjSURBVFhHxVdJaFNRFP1J/jwkP5MxsbaC1WJEglSxOFAXIsFpVRE3ggi1K90obioRRBA33XXnQnciirhQcMCdorgQxBkXWlREkFKsWkv5npvckp/XnzRpKh64kLw733fffe9L/wrL0+mVUdO8uTSZ3MBL/we2qg4rkuSpodCELstXE46ziVkLQ6FQcGOmeSSq6wd4aV50d3drWjj8kQKZJTUc9kxFGenv79dZrDksTSTWWJp2QYtEPiErysyzdX0LsxsCQR8keX8gs6RHIk8ysdgKFg2G53mhuOPsshTlBjKaFo1g7SqLNoShKLdFXT8huQ/paLSbxatYnc2mHMM4hr18Vi8TIvCmXF3vYrW6cF23gGTOk0M1wA4RKvOmq6vLZRVJipvmSWT6tZ6CSEYkco5V50VPT4+D7RwOqi6RiSZm0fJ+vggSqkeoypdsNmuyelNwbXsbgvkWYMtzDWNvWaijoyOBqE+hVK8abcssUeXQ/YfKyi0gFYv1Ipgfoj34fYGTJLOYJA0ODirok32GLN8XhUWCwSes1hIwBg6LydJ/tEeRRapAdUp+wSAiZchtZZWWgAZ+JNpD8peYXQVK9UwUxNpzOK8pq97kURZhYTCKBwPD7h2zK+js7Myi7D8Fod+0TkMI8+EMAngLGc/WtBFWawkFHFnoj/t9KLgGmF0B3QfkxC+EarxkdhnFYlFLY06USqUwL7UMjICHfh/wOc2sCqhpxGbCkLvL7EUDbF73+6DkmVWB6zi7xUDQSLeYvWjAILvm9zEnkJhlbRcDQZcv6Kg2AipyT/Axw6wKlqVSqxDdjF8Izfod13qURdrG/nxehY+xGh+h0CSzKygGvSNQIcc097BI24jb9hax6kj2E7OrMFX1il+ICEf2NrPbhiXLl+fYl+U7zK4iYdsDcyLGf+ofFlkwcN+s10KhmpuYhhtm0hCLVIFL0MDsqNlDIqy9x2CLs1jL6OvrI7vPRbtohXG6eFmsFnHDGAp6n9AgyuVySRZrGvROxRgIfLXhzjrNYnNBUxNX/dMgRWT1mt4XLDovaApD53E9W3ilNX5M55LJHpRtIsgAvciR4WWcgK2Dvb1YqgXevmF8z2zEBTcKG39EfSKsT9EbhVUaI2FZO+oZIqImxol6j66/hcAu4sSN4vc1ZPoKeoE6RGhYL2YYA+ymOSSi0Z0wWntbtkGUWCvfSDXIxONraZ/FY90KUfNTpfC5spnNLgxoYNnR9RO4F8ofXEHOgogCQE99w+fF2Xw+b7O59rEOsyRqGEfpVoaDMQQ1CZrG46bcM6AZ0C/wPqNfHliqejyTySxh9TqQpL+xmbIlkB9SlAAAAABJRU5ErkJggg==" alt="Reset"></button><button state="menu" type="button" title="More Options" style="background-color: white; color: black; border: none; user-select: none; padding: 5px 12px; cursor: pointer; float: left; width: 40px; height: 25px; outline: 0px; vertical-align: baseline; line-height: 0; display: inline;"><img style="height:95%; pointer-events: none;" src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAACQAAAAeCAYAAABE4bxTAAAAIGNIUk0AAHolAACAgwAA+f8AAIDpAAB1MAAA6mAAADqYAAAXb5JfxUYAAAAJcEhZcwAADsMAAA7DAcdvqGQAAADoSURBVFhH7dc9CsJAFATgRxIIBCwCqZKATX5sbawsY2MvWOtF9AB6AU8gguAJbD2AnZ2VXQT/Ko2TYGCL2OYtYQc+BuYA+1hCtnCVwMm27SGaXpDJIAiCvCkVR05hGOZNN3HkFMdx3nQRR06+76/R1IcFLJlNQEWlmWlBTwJtKLKHynehZqnjOGM0PYWRVXk61C37p7xlZ3Hk5HneCk1dmMH811xGoKLSzDiQwIBZB4ocoPJdqNkDt2yKlueWRVGUtzy3rPwo3sWRU3nLjuLI6OO67oZM00wMw3hrmpZx0XU9syxrR0T0BeMpb9dneSR2AAAAAElFTkSuQmCC" alt="More Options"></button><div tabindex="-1" style="position: absolute; user-select: none; cursor: pointer; right: 0px; top: 25px; min-width: 120px; outline: 0px; font-size: 14px; font-family: Arial, Helvetica, sans-serif; padding: 5px 0px; text-align: left; line-height: 10px; background-color: white; box-shadow: rgb(136, 136, 136) 2px 2px 10px; display: none;"><div style="padding: 12px 8px; background-color: white; color: black;">Print</div><div style="padding: 12px 8px; background-color: white; color: black;">Save as JPEG</div><div style="padding: 12px 8px; background-color: white; color: black;">Save as PNG</div></div></div><div class="canvasjs-chart-tooltip" style="position: absolute; height: auto; box-shadow: rgba(0, 0, 0, 0.1) 1px 1px 2px 2px; z-index: 1000; pointer-events: none; display: none; border-radius: 5px;"><div style=" width: auto;height: auto;min-width: 50px;line-height: auto;margin: 0px 0px 0px 0px;padding: 5px;font-family: Calibri, Arial, Georgia, serif;font-weight: normal;font-style: italic;font-size: 14px;color: #000000;text-shadow: 1px 1px 1px rgba(0, 0, 0, 0.1);text-align: left;border: 2px solid gray;background: rgba(255,255,255,.9);text-indent: 0px;white-space: nowrap;border-radius: 5px;-moz-user-select:none;-khtml-user-select: none;-webkit-user-select: none;-ms-user-select: none;user-select: none;} "> Sample Tooltip</div></div><a class="canvasjs-chart-credit" title="JavaScript Charts" style="outline:none;margin:0px;position:absolute;right:2px;top:186px;color:dimgrey;text-decoration:none;font-size:11px;font-family: Calibri, Lucida Grande, Lucida Sans Unicode, Arial, sans-serif" tabindex="-1" target="_blank" href="https://canvasjs.com/">CanvasJS.com</a></div></div>
    </div>
    <form action="index.php" method="post">
    <label for="angle">Zadajte r(nová poloha Guličky [-25,25])</label>
    <input type="number" min="-25" max="25" name="name" value = 0>
    <input type="submit" value="Potvrdte poziciu" >
    </form>
    


    <form >
        
        <label for="angle">Zadajte r(nová poloha Guličky [-25,25])</label>
        <input type="number" min="-25" max="25" name="name" value = 0>

        <label for="angle">Spomalenie animácie</label>
        <input type="range" min="0" max="1000" value="0" class="slider" id="myRange">
        

        <label for="animacia">Animacia</label>
        <input type="checkbox" name="animacia" id="animacia" checked="">
        <label for="graf">Graf</label>
        <input type="checkbox" name="graf" id="graf" checked="">

        <input type="submit" value="Start" id="btn" name="btn">
    </form>
    
    
             


    
    <iframe name="hiddenFrame" width="0" height="0"  style="display: none;"></iframe>
        <script>
         
         //-----------------------------------------------------   
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
                    "action": "test",
                    "uhol": $('#angle').val(),
                    "position":(parseInt($('#position').val())),
            };
              $.get('http://147.175.121.210:8233/final_zadanie/strba/ScriptOCT.php/<?php if(isset($_POST['name'])){echo $_POST['name'];}else{echo '0';}?> ' )
              .done((dataa)  =>  
              {
                const results = JSON.parse(dataa);
                
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
                    
                        $mojeR = <?php if(isset($_POST['name'])){echo $_POST['name'];}else{echo '0';} ?>;

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
                    
                    $('#pecko').append(`<li>${element} : ${results[element]}</li>`);
                });
              })
              .fail((error) => console.log(error))
              .always(() => console.log('done'));
             
        });
              
        </script><span style="position: absolute; left: 0px; top: -20000px; padding: 0px; margin: 0px; border: none; white-space: pre; line-height: normal; font-family:  Helvetica, sans-serif; font-size: 10px; font-weight: normal; display: none;">Mpgyi</span>
    
</body></html>

