<?php
session_start();
    $handle = fopen("data.csv", "r");
    $header = fgetcsv($handle);
    $data = fgetcsv($handle);
    $index = 0;
    $content = $header[0];
    while ($data != false) {
        if ($index == $_GET["index"]) {
            $data = fgetcsv($handle);
            $index++;
            continue;
        }
        $content = $content."\n".$data[0];
        $data = fgetcsv($handle);
        $index++;
    }
    $handle = fopen("data.csv","w");
    fwrite($handle, $content);
    fclose($handle);
    $_SESSION["Message"] = "The task has been Deleted successfully";
    header("Location: index.php");
    exit;

?>