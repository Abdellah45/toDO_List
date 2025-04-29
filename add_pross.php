<?php
session_start();
if ($_SERVER["REQUEST_METHOD"] === "POST"){
    $task = trim($_POST["task"]);
    if (preg_match("/^[a-zA-Z0-9 ,.\-']+$/", $task)){
        if (isset($_SESSION["task_conf"])){
            $_SESSION["task_conf"][0] = $_POST["task"];
        }else{
            $_SESSION["task_conf"] = [$_POST["task"],FALSE];
        }
    }else{
        $_SESSION["Message"] = "Only letters, numbers, spaces, commas, periods, hyphens, or apostrophes allowed";
        header("location:add_task.php");
        exit();
    }
    
}
if ($_SESSION["task_conf"][1] === false){
    file_put_contents("data.csv", "\n".$_SESSION["task_conf"][0], FILE_APPEND);
    unset($_SESSION["task_conf"]);
    $_SESSION["Message"] = "The task has been added successfully";
    header("Location: index.php");
    exit();
}else{
    $handle = fopen("data.csv", "r");
    $header = fgetcsv($handle);
    $data = fgetcsv($handle);
    $index = 0;
    $content = $header[0];
    while ($data != false) {
        if ($index == $_SESSION["task_conf"][2]) {
            $content = $content."\n".$_SESSION["task_conf"][0];
        }else{
            $content = $content."\n".$data[0];
        }
        $data = fgetcsv($handle);
        $index++;
    }
    $handle = fopen("data.csv","w");
    fwrite($handle, $content);
    fclose($handle);
    unset($_SESSION["task_conf"]);
    $_SESSION["Message"] = "The task has been edited successfully";
    header("Location: index.php");
    exit();
}


?>