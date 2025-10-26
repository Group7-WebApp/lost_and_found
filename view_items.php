<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Lost & Found Items</title>
  <style>
    /* Make the video fill the screen */
    #bg-video {
      position: fixed;
      top: 0;
      left: 0;
      min-width: 100%;
      min-height: 100%;
      object-fit: cover;
      z-index: -1;
    }

    /* Overlay content on top of the video */
    .overlay {
      position: relative;
      z-index: 1;
      padding: 30px;
      background-color: rgba(0, 0, 0, 0.6);
      color: white;
      max-width: 800px;
      margin: 50px auto;
      border-radius: 12px;
      backdrop-filter: blur(5px);
    }

    body, html {
      margin: 0;
      padding: 0;
      font-family: Arial, sans-serif;
    }

    select, input[type="text"], button {
      padding: 8px;
      margin: 5px 0;
      border-radius: 5px;
      border: none;
    }

    img {
      margin-top: 10px;
      border-radius: 5px;
    }

    hr {
      border: 1px solid #aaa;
    }

    a {
      color: #ffd700;
      text-decoration: underline;
    }
  </style>
</head>
<body>


<video autoplay muted loop id="bg-video">
  <source src="lost.mp4" type="video/mp4">
  Your browser does not support the video tag.
</video>


<div class="overlay">

<?php
$conn = new mysqli("localhost", "root", "Group7@php", "lost_and_found");

$filter = $_GET['status'] ?? '';
$search = $_GET['search'] ?? '';

$sql = "SELECT * FROM items WHERE 1";
if ($filter) {
    $sql .= " AND status = '" . $conn->real_escape_string($filter) . "'";
}
if ($search) {
    $safeSearch = $conn->real_escape_string($search);
    $sql .= " AND (title LIKE '%$safeSearch%' OR location LIKE '%$safeSearch%')";
}

$result = $conn->query($sql);
?>

<h2>Lost & Found Items</h2>

<form method="GET">
    <select name="status">
        <option value="">-- All --</option>
        <option value="lost" <?= $filter == 'lost' ? 'selected' : '' ?>>Lost</option>
        <option value="found" <?= $filter == 'found' ? 'selected' : '' ?>>Found</option>
    </select>
    <input type="text" name="search" placeholder="Search..." value="<?= htmlspecialchars($search) ?>">
    <button type="submit">Search</button>
</form>

<hr>

<?php while ($row = $result->fetch_assoc()): ?>
    <div>
        <h3><?= htmlspecialchars($row['title']) ?> (<?= htmlspecialchars($row['status']) ?>)</h3>
        <p><?= nl2br(htmlspecialchars($row['description'])) ?></p>
        <p>Location: <?= htmlspecialchars($row['location']) ?></p>
        <?php if ($row['image_path']): ?>
            <img src="<?= htmlspecialchars($row['image_path']) ?>" width="150" alt="Item image"><br>
        <?php endif; ?>
        <p><strong><?= $row['claimed'] ? 'Already claimed' : 'Available' ?></strong></p>
        <a href="claim_item.php?id=<?= $row['id'] ?>">Claim this item</a>
    </div>
    <hr>
<?php endwhile; ?>

<?php $conn->close(); ?>

</div> 

</body>
</html>
