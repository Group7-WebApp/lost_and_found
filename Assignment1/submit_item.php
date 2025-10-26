<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Lost and Found</title>
  <style>
    /* Make video fill the screen */
    #bg-video {
      position: fixed;
      top: 0;
      left: 0;
      min-width: 100%;
      min-height: 100%;
      object-fit: cover;
      z-index: -1;
    }

    .overlay {
      position: relative;
      z-index: 1;
      padding: 20px;
      color: white;
      background-color: rgba(0, 0, 0, 0.5);
      max-width: 500px;
      margin: 50px auto;
      border-radius: 10px;
    }

    body, html {
      margin: 0;
      padding: 0;
      height: 100%;
      font-family: Arial, sans-serif;
    }

    .link {
        color: red;
    }
  </style>
</head>
<body>

<!-- Background video -->
<video autoplay muted loop id="bg-video">
  <source src="lost.mp4" type="video/mp4">
  Your browser does not support the video tag.
</video>

<!-- Content overlay -->
<div class="overlay">
<?php
$conn = new mysqli("localhost", "root", "Group7@php", "lost_and_found");

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$title = $_POST['title'] ?? "";
$desc = $_POST['description'] ?? "";
$loc = $_POST['location'] ?? "";
$status = $_POST['status'] ?? "lost";
$user_id = 1; // Static user

$image_path = "";
if (isset($_FILES['image']) && $_FILES['image']['name']) {
    $target_dir = "uploads/";
    if (!is_dir($target_dir)) {
        mkdir($target_dir, 0777, true);
    }
    $image_path = $target_dir . basename($_FILES["image"]["name"]);
    move_uploaded_file($_FILES["image"]["tmp_name"], $image_path);
}

$stmt = $conn->prepare("INSERT INTO items (user_id, title, description, location, status, image_path) VALUES (?, ?, ?, ?, ?, ?)");
$stmt->bind_param("isssss", $user_id, $title, $desc, $loc, $status, $image_path);

if ($stmt->execute()) {
    echo "✅ Item submitted successfully. <a class='link' href='view_items.php'>View items</a>";
} else {
    echo "❌ Error: " . $stmt->error;
}

$stmt->close();
$conn->close();
?>
</div>

</body>
</html>
