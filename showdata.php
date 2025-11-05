<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Show Registrations</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/css/bootstrap.min.css">
  <style>
    body {
      background: #f9f9f9;
      font-family: "Poppins", sans-serif;
      padding: 20px;
    }
    .container {
      max-width: 800px;
      background: white;
      border-radius: 10px;
      padding: 25px;
      box-shadow: 0 4px 10px rgba(0,0,0,0.1);
    }
    pre {
      background: #eee;
      padding: 15px;
      border-radius: 8px;
    }
  </style>
</head>
<body>
  <div class="container">
    <h2>All Registrations</h2>
    <hr>
    <?php
      $file = "registrations.txt";
      if (file_exists($file)) {
        $contents = file_get_contents($file);
        if (trim($contents) === "") {
          echo "<p>No registrations found yet.</p>";
        } else {
          echo "<pre>$contents</pre>";
        }
      } else {
        echo "<p>No registrations found yet.</p>";
      }
    ?>
    <a href="index.html" class="btn btn-primary mt-3">Back to Form</a>
  </div>
</body>
</html>
