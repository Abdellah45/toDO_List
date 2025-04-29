<?php
session_start();
    $handle = fopen("data.csv", "r");
    $header = fgetcsv($handle);
    $data = fgetcsv($handle);
    $index = 0;
    $line = "";
    while($data != false) {
      if ($index == $_GET["index"]){
        $line = $data[0];
        break;
      }
      $index++;
      $data = fgetcsv($handle);
    }
    $_SESSION["task_conf"] = [$line,true,$_GET["index"]];
    header("Location: add_task.php");
    exit();
    ?>