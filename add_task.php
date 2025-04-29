<?php
session_start();
$value = "";
if (isset($_SESSION["task_conf"])){
  $value = $_SESSION["task_conf"][0];
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Add New Task</title>
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

    .form-container {
      background: #fff;
      width: 350px;
      padding: 25px 20px;
      border-radius: 10px;
      box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
      text-align: center;
    }

    .form-container h2 {
      margin-bottom: 20px;
      color: #333;
    }

    form {
      display: flex;
      flex-direction: column;
    }

    label {
      font-size: 14px;
      color: #555;
      margin-bottom: 6px;
      text-align: left;
    }

    input[type="text"] {
      padding: 10px;
      font-size: 14px;
      border: 1px solid #ccc;
      border-radius: 6px;
      margin-bottom: 20px;
      outline: none;
      transition: border-color 0.3s;
    }

    input[type="text"]:focus {
      border-color: #28a745;
    }

    .submit-btn {
      background-color: #28a745;
      color: white;
      padding: 10px;
      border: none;
      border-radius: 6px;
      font-size: 14px;
      cursor: pointer;
      transition: opacity 0.3s;
    }

    .submit-btn:hover {
      opacity: 0.9;
    }

    .return-btn {
      display: inline-block;
      margin-top: 15px;
      padding: 8px 14px;
      background-color: #6c757d;
      color: white;
      text-decoration: none;
      border-radius: 6px;
      font-size: 13px;
      transition: opacity 0.3s;
    }

    .return-btn:hover {
      opacity: 0.9;
    }

    @media (max-width: 400px) {
      .form-container {
        width: 90%;
      }
    }
  </style>
</head>
<body>
  <div class="form-container">
    <h2>Add New Task</h2>
    <?php
    if (isset($_SESSION["Message"])){
      echo "<span style=\"color:red\">".$_SESSION["Message"]."</span>";
    }
    ?>
    <form action="add_pross.php" method="POST">
      <label for="task">Task Name</label>
      <input type="text" id="task" name="task" placeholder="e.g. Read about Flexbox" <?php echo "value=\"$value\""?> required />
      <button type="submit" class="submit-btn">Submit Task</button>
    </form>
    <a href="index.php" class="return-btn">← Return to Home</a>
  </div>
</body>
</html>
