<?php
//error_reporting(E_ALL);
//ini_set('display_errors', 'on');
if (is_ajax()) {
  if (isset($_POST["action"]) && !empty($_POST["action"])) { 
    $action = $_POST["action"];
    switch($action) { 
      case "kyvadlo": kyvadlo($_POST['uhol'],$_POST['position'],$_POST['r']); break;
      case "gulicka": gulicka($_POST['rychlost'],$_POST['zrychlenie'],$_POST['r']); break;
      case "tlmic": tlmic($_POST['x1'],$_POST['x1d'],$_POST['x2'],$_POST['x2d'],$_POST['r']); break;
      case "lietadlo": lietadlo($_POST['alpha'],$_POST['q'],$_POST['theta'],$_POST['r']); break;
      case "calcul": calcul($_POST['txt']); break;
      case 'select': array_to_csv_download($_POST['name']); break;
    }
  }
}

function is_ajax() {
  return isset($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest';
}


  function kyvadlo($uhol,$position,$r){
    $command = 'octave -q ./scripts/kyvadlo.txt '.$position.' '.$uhol.' '.$r.' 2>&1|  tr -s " " ';
    exec($command , $output , $return_var);
    $outputt = array();
    $count = 0;
    $tmp = -1;
    for ($i = 0; $i <= count($output)-1; $i++) {
      if($output[$i] == "") continue;
      if($output[$i] == "ans =" ) {
        $count = 0;
        $tmp += 1;
        continue;
      }
      $outputt[$count][$tmp] = $output[$i];
      $count += 1;
    }
    $result = "OK";
    if(substr( $output[0], 0, 6 ) === "error:"){
      $result = "ERROR: ".$return_var." ";
      foreach($output as $out){
        $result = $result.$out;
      }
    }
    logData("kyvadlo", array($uhol, $position, $r), $result);
    echo json_encode($outputt);
  }

  function gulicka($rychlost,$zrychlenie, $r){
    $command = 'octave -q ./scripts/gulicka.txt '.$rychlost.' '.$zrychlenie.' '.$r.' 2>&1|  tr -s " " ';
    exec($command , $output , $return_var);
    $outputt = array();
    $count = 0;
    $tmp = -1;
    for ($i = 0; $i <= count($output)-1; $i++) {
      if($output[$i] == "") continue;
      if($output[$i] == "ans =" ) {
        $count = 0;
        $tmp += 1;
        continue;
      }
      $outputt[$count][$tmp] = $output[$i];
      $count += 1;
    }
    $result = "OK";
    if(substr( $output[0], 0, 6 ) === "error:"){
      $result = "ERROR: ".$return_var." ";
      foreach($output as $out){
        $result = $result.$out;
      }
    }
    logData("gulicka", array($rychlost, $zrychlenie, $r), $result);
    echo json_encode($outputt);
  }

  function tlmic($x1,$x1d, $x2, $x2d, $r){
    $command = 'octave -q ./scripts/tlmenie.txt '.$x1.' '.$x1d.' '.$x2.' '.$x2d.' '.$r.' 2>&1|  tr -s " " ';
    exec($command , $output , $return_var);
    $outputt = array();
    $count = 0;
    $tmp = -1;
    for ($i = 0; $i <= count($output)-1; $i++) {
      if($output[$i] == "") continue;
      if($output[$i] == "ans =" ) {
        $count = 0;
        $tmp += 1;
        continue;
      }
       $outputt[$count][$tmp] = $output[$i];
      $count += 1;
    }
    $result = "OK";
    if(substr( $output[0], 0, 6 ) === "error:"){
      $result = "ERROR: ".$return_var." ";
      foreach($output as $out){
        $result = $result.$out;
      }
    }
    logData("tlmic", array($x1, $x1d, $x2, $x2d, $r), $result);
    echo json_encode($outputt);
  }

  function lietadlo($alpha,$q, $theta, $r){
    $command = 'octave -q ./scripts/lietadlo.txt '.$alpha.' '.$q.' '.$theta.' '.$r.' 2>&1|  tr -s " " ';
    exec($command , $output , $return_var);
    $outputt = array();
    $count = 0;
    $tmp = -1;
    for ($i = 0; $i <= count($output)-1; $i++) {
      if($output[$i] == "") continue;
      if($output[$i] == "ans =" ) {
        $count = 0;
        $tmp += 1;
        continue;
      }
       $outputt[$count][$tmp] = $output[$i];
      $count += 1;
    }
    $result = "OK";
    if(substr( $output[0], 0, 6 ) === "error:"){
      $result = "ERROR: ".$return_var." ";
      foreach($output as $out){
        $result = $result.$out;
      }
    }
    logData("lietadlo", array($alpha, $q, $theta, $r), $result);
    echo json_encode($outputt);
  }

  function calcul($eval){
    $myfile = fopen("./scripts/test.txt", "w") or die("Unable to open file!");
    $txt = $eval;
    fwrite($myfile, $txt);
    fclose($myfile);
    
    $command = 'octave -q ./scripts/test.txt ';
    exec($command , $output , $return_var);
    $result = "OK";
    if(substr( $output[0], 0, 6 ) === "error:"){
      $result = "ERROR: ".$return_var." ";
      foreach($output as $out){
        $result = $result.$out;
      }
    }
    logData("calcul", array($eval), $result);
    echo json_encode($output);
  }

  function logData($name, $vars, $status){

    $logData = array ();
    array_push($logData, date("F j, Y, g:i a"));
    array_push($logData, $name);
    foreach($vars as $var){
      array_push($logData, $var);
    } 
    array_push($logData, $status);
    $fp = fopen('./logs/'.date("Ymd").'.csv', 'a');
  
    fputcsv($fp, $logData, ",", '"');
    
    fclose($fp);
  }

  
function array_to_csv_download($name) {
  header('Content-Type: application/csv');
  header('Content-Disposition: attachment; filename="'.$name.'";');
  header('Expires: 0');
  header('FileName: '.$name);
  header('Cache-Control: must-revalidate');
  header('Pragma: public');
  header('Content-Length: ' . filesize('file.txt'));
  readfile('./logs/'.$name);
}  

?>