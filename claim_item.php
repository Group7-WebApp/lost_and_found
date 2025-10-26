<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Item Claimed</title>
  <link rel="stylesheet" href="styles.css">
  <style>
    #bg-video {
      position: fixed;
      right: 0;
      bottom: 0;
      min-width: 100%;
      min-height: 100%;
      z-index: -1;
    }
    body {
      margin: 0;
      padding: 0;
      font-family: Arial, sans-serif;
      overflow: hidden;
      color: white;
    }
    .content {
      display: flex;
      flex-direction: column;
      position: relative;
      z-index: 1;
      text-align: center;
      padding: 100px 20px;
      max-width: 600px;
      margin: 0 auto;
      margin-top: 200px;
      background-color: rgba(0, 0, 0, 0.6);
      border-radius: 10px;
    }
    a {
      color: #00f;
      text-decoration: underline;
      padding-left: 200px;
    }
  </style>
</head>
<body>

<video autoplay muted loop id="bg-video">
  <source src="lost.mp4" type="video/mp4">
  Your browser does not support the video tag.
</video>

<div class="content">
  <?php
  $conn = new mysqli("localhost", "root", "Group7@php", "lost_and_found");

  if ($conn->connect_error) {
      die("Connection failed: " . $conn->connect_error);
  }

  if (isset($_GET['id'])) {
      $id = $_GET['id'];

      $stmt = $conn->prepare("UPDATE items SET claimed = 1 WHERE id = ?");
      $stmt->bind_param("i", $id);

      if ($stmt->execute()) {
          echo "<h2>✅ Item claimed successfully!</h2>";
      } else {
          echo "<h2>❌ Error claiming item.</h2>";
      }

      $stmt->close();
  } else {
      echo "<h2>❌ No ID provided.</h2>";
  }

  $conn->close();
  ?>

  <br>
  <a class="" href="report_item.html">Report another item?</a>
</div>

</body>
</html>

