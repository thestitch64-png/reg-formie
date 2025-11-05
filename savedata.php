<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $file = 'registrations.txt';

    // ✅ Ensure file exists and is writable
    if (!file_exists($file)) {
        $handle = fopen($file, 'w');
        fclose($handle);
    }
    chmod($file, 0666);

    // ✅ Collect form data safely
    $name = htmlspecialchars($_POST['name']);
    $email = htmlspecialchars($_POST['email']);
    $phone = htmlspecialchars($_POST['phone']);
    $course = htmlspecialchars($_POST['course']);
    $address = htmlspecialchars($_POST['address']);

    // ✅ Format data to store
    $data = "Name: $name | Email: $email | Phone: $phone | Course: $course | Address: $address\n";
    file_put_contents($file, $data, FILE_APPEND | LOCK_EX);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Submission Successful</title>
    <style>
        body {
            font-family: 'Poppins', sans-serif;
            background: linear-gradient(135deg, #74ABE2, #5563DE);
            color: #333;
            margin: 0;
            padding: 0;
        }
        .card {
            background: #fff;
            max-width: 600px;
            margin: 80px auto;
            padding: 40px;
            border-radius: 15px;
            box-shadow: 0 10px 25px rgba(0,0,0,0.2);
            text-align: center;
            animation: pop 0.8s ease;
        }
        @keyframes pop {
            from {transform: scale(0.8); opacity: 0;}
            to {transform: scale(1); opacity: 1;}
        }
        h2 {
            color: #5563DE;
            margin-bottom: 20px;
        }
        p {
            margin: 8px 0;
            color: #444;
        }
        a {
            display: inline-block;
            margin-top: 25px;
            padding: 12px 24px;
            background: #5563DE;
            color: white;
            text-decoration: none;
            border-radius: 8px;
            transition: 0.3s;
        }
        a:hover {
            background: #3945b6;
        }
        .tick {
            font-size: 70px;
            color: #4BB543;
            animation: bounce 1s infinite alternate;
        }
        @keyframes bounce {
            from {transform: translateY(0);}
            to {transform: translateY(-8px);}
        }
    </style>
</head>
<body>
    <div class="card">
        <div class="tick">✔</div>
        <h2>Application Submitted Successfully!</h2>
        <p><strong>Name:</strong> <?= $name ?></p>
        <p><strong>Email:</strong> <?= $email ?></p>
        <p><strong>Phone:</strong> <?= $phone ?></p>
        <p><strong>Course:</strong> <?= $course ?></p>
        <p><strong>Address:</strong> <?= $address ?></p>

        <a href="showdata.php">View All Applications</a>
        <a href="index.html" style="background:#888;margin-left:10px;">Back to Form</a>
    </div>
</body>
</html>

<?php
} else {
    echo "<h3 style='text-align:center;margin-top:50px;font-family:Poppins,sans-serif;'>Invalid Request ❌</h3>";
}
?>
