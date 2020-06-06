<?php
//http://ctms.engin.umich.edu/CTMS/index.php?example=InvertedPendulum&section=ControlStateSpace

$selected_value= $_POST['name'];
 
$actual_link = $_SERVER['PHP_SELF'];




//echo $actual_link . "<br>";
 $myParameter = trim($actual_link,"/final_zadanie/strba/ScriptOCT.php/");
//var_dump($myParameter);
//var_dump($selected_value);
$cmd = "octave --eval 'gulicka($myParameter)' ";
$op = null;

$output = exec ($cmd,$op, $rv);

//echo "result : ";
//var_dump($cmd);
//var_dump($op);
echo json_encode($op);
//var_dump($rv);
//header( "refresh:5;url=index.php" );

        /*$selected_value= $_POST['parameter'];
        
        $cmd="octave --eval 'airplane($selected_value)'";
        $op=null;
        $vysledok=exec($cmd,$op,$var);
        $f=$op;
        include_once "functions.php";
        echo "<p id='yike'>".sortuj_array($f)."</p>";*/
?>

