<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>To-Do List</title>
  <style>
    body {
      margin: 0;
      font-family: Arial, sans-serif;
      background-color: #f0f2f5;
      display: flex;
      justify-content: center;
      align-items: center;
      min-height: 100vh;
    }

    .container {
      background: #fff;
      width: 350px;
      padding: 20px;
      border-radius: 10px;
      box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
    }

    .add-task-btn {
      background-color: #28a745;
      color: white;
      padding: 10px 16px;
      border: none;
      border-radius: 5px;
      font-size: 14px;
      cursor: pointer;
      display: block;
      margin: 0 auto 20px auto;
      transition: opacity 0.3s;
    }
    .add-task-btn a{
        color:white;
        text-decoration: none;
    }

    .add-task-btn:hover {
      opacity: 0.9;
    }

    .task {
      display: flex;
      align-items: center;
      justify-content: space-between;
      padding: 12px 0;
      border-bottom: 1px solid #ddd;
      color: #555;
      font-size: 16px;
      position: relative;
    }

    .task:last-child {
      border-bottom: none;
    }

    .task-content {
      flex: 1;
      margin-left: 10px;
      margin-right: 10px;
    }

    .task-checkbox {
      width: 18px;
      height: 18px;
      cursor: pointer;
      accent-color: #ffc107;
    }

    .menu {
      position: relative;
    }

    .ellipsis-btn {
      background: none;
      border: none;
      font-size: 20px;
      cursor: pointer;
      color: #555;
      padding: 4px 6px;
      transition: opacity 0.3s;
    }

    .ellipsis-btn:hover {
      opacity: 0.7;
    }

    .dropdown {
      display: none;
      position: absolute;
      top: 25px;
      right: 0;
      background: white;
      border-radius: 6px;
      box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
      overflow: hidden;
      z-index: 1;
      min-width: 80px;
    }

    .menu:hover .dropdown {
      display: block;
      width: 100px;
    }

    .dropdown button {
      width: 100%;
      padding: 8px 10px;
      border: none;
      background: none;
      text-align: left;
      font-size: 14px;
      cursor: pointer;
      display: flex;
      align-items: center;
      gap: 6px;
      transition: background-color 0.2s, opacity 0.3s;
    }

    .dropdown button:hover {
      opacity: 0.9;
    }
    .edit-btn {
      transition: .3s;
    }
    .edit-btn a{
      color:#007bff;
      text-decoration: none;
    }
    .edit-btn:hover a{
      color:white;
    }
    .edit-btn:hover{
      background-color: #007bff;
    }

    .delete-btn {
      transition: .3s;
    }
    .delete-btn a{
      color:#dc3545;
      text-decoration: none;
    }
    .delete-btn:hover a{
      color:white;
    }
    .delete-btn:hover{
      background-color: #dc3545;
    }

    @media (max-width: 400px) {
      .container {
        width: 90%;
      }
    }
  </style>
</head>
<body>
  <div class="container">
    <button class="add-task-btn"><a href="add_task.php">Add Task</a></button>
    <?php
  if (isset($_SESSION["Message"])){
    echo "<span style=\"color:green\">".$_SESSION["Message"]."</span>";
    session_unset();
    session_destroy();
  }
  ?>
    <?php
    $handle = fopen("data.csv", "r") or die("the data file is missing");
    $header = fgetcsv($handle);
    $data = fgetcsv($handle);
    $index = 0;
    if ($data == false){
      echo "<span style=\"color:#777\">No Tasks Yet, Try To Add A Task</span>";
    }
    while($data != false) {
      echo "<div class=\"task\">";
      echo "<input type=\"checkbox\" class=\"task-checkbox\" />";
      echo "<div class=\"task-content\">".$data[0]."</div>";
      echo "<div class=\"menu\">";
      echo "<button class=\"ellipsis-btn\">⋮</button>";
      echo "<div class=\"dropdown\">";
      echo "<button class=\"edit-btn\"><a href=\"edit.php?index=$index\">✏️ Edit</a></button>";
      echo "<button class=\"delete-btn\"><a href=\"delete.php?index=$index\">🗑️ Delete</a></button>";
      echo "</div>";
      echo "</div>";
      echo "</div>";
      $index++;
      $data = fgetcsv($handle);
    }
    ?>
  </div>
</body>
</html>
